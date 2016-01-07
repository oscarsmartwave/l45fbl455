$(function(){
	var API = "http://52.24.133.167/api.leafblast/api/v1/";
	console.log("Ready!");

	Parse.initialize("mVOnxcUCEBLer0c0z7yiXOtyRXcMFrgabGyKEYvY", "M4TXuuTzPT4uMCEGR4txOeuQIA4TekIxBhbXhKGg");
	var _User = Parse.Object.extend("_User");
	var _Car = Parse.Object.extend("Car");

	var users = new Parse.Query(_User);
	var cars = new Parse.Query(_Car);

	$('#years').change(function() {
		console.log($('#years').val());
	});
	
	$('#months').change(function(){
		console.log($('#months').val());

		var numOfDays = new Date($('#years').val(), $('#months').val(), 0).getDate();
		$("#days").empty();
		for(var i = 1; i <= numOfDays; i++)
		{
			$("#days").append(new Option(i, i));
		}
		$("#days").trigger("chosen:updated");
	});

	$('#btnGo').click(function(){

		var month = $('#months option:selected').val();
		var year = $('#years option:selected').val();
		var day = $('#days option:selected').val();

		if(month == 0 || year == 0 || day == 0)
		{
			console.log("No selected month, day, or year");
			return;
		}
		var getDate = year+"/"+month+"/"+day;
		console.log(getDate);

		$.post("http://52.24.133.167/api.leafblast/api/v1/history/date", { date : getDate })
		.done(function(data) { 
			console.log(data);

			var timeTable = $("<table class='table table-bordered table-hover table-striped' id='apptTable'>");
			$("#table-container").empty();
			var thead = $("<thead>"+
				"<td>Location</td>"+
				"<td>Package</td>"+
				"<td>Operator</td>"+
				"<td>Car</td>"+
				"<td>Model</td>"+
				"<td>Owner</td>"+
				"<td>Time Start</td>"+
				"<td>Time End</td>"+
				"</thead>");
			var tbody = $("<tbody></tbody>");
			$.each(data.Data, function(key, value){
				// var timeStart = dateFormat(value.startedAt, "d mmm yyyy h:MM:ss TT");
				// var timeEnd = dateFormat(value.endedAt, "d mmmm yyyy h:MM:ss TT");

				var row = $("<tr><td>"+value.locationString+
					"</td><td id='"+value.packageObjectId+"'>"+
					"</td><td id='"+value.optrObjectId+"'>"+
					"</td><td id='"+value.carObjectId+"'>"+
					"</td><td id='"+value.carObjectId+"'>"+
					"</td><td id='"+value.userObjectId+"'>"+
					"</td><td>"+value.startedAt+"</td>"+
					"<td>"+value.endedAt+"</td></tr>");
				tbody.append(row);
			});
			var table = timeTable.append(thead, tbody);
			$('#table-container').append(table);
			$("#table-container").trigger("chosen:updated");

			var _User = Parse.Object.extend("_User");
			var _Car = Parse.Object.extend("Car");
			var _Pkg = Parse.Object.extend("CarWashPackages");

			var users = new Parse.Query(_User);
			var cars = new Parse.Query(_Car);
			var pkg = new Parse.Query(_Pkg);

			$("#apptTable > tbody > tr").each(function(){

				var carObjectId = this.cells[3].id;
				var td_car = this.cells[3];
				var td_model = this.cells[4];

				var userObjectId = this.cells[5].id;
				var td_owner = this.cells[5];

				var packageObjectId = this.cells[1].id;
				var td_package = this.cells[1];

				var optrObjectId = this.cells[2].id;
				var td_optr = this.cells[2];

				cars.get(carObjectId, {
					success: function(car)
					{
						var model = car.get("model");
						var make = car.get("make");
						td_model.innerText = model;
						td_car.innerText = make;
					},
					error: function(object, error) 
					{
						alert(error);
					}
		}); // end cars.get

				users.get(userObjectId, {
					success: function(user)
					{
						var firstName = user.get("firstName");
						var lastName = user.get("lastName");

						td_owner.innerText = firstName + ' ' + lastName;
					},
					error: function(object, error) 
					{
						alert(error);
					}

		});//end users.get

				pkg.get(packageObjectId, {
					success: function(pkg)
					{
						var title = pkg.get("title");

						td_package.innerText = title;
					},
					error: function(object, error) 
					{
						alert(error);
					}

		});//end pkg.get

				users.get(optrObjectId, {
					success: function(optr)
					{
						var firstName = optr.get("firstName");
						var lastName = optr.get("lastName");

						td_optr.innerText = firstName + ' ' + lastName;
					},
					error: function(object, error) 
					{
						alert(error);
					}

		});//end opt.get

			});

$('#earningsTable').DataTable({
	responsive: true
});
});
});

//date format

var dateFormat = function () {
    var token = /d{1,4}|m{1,4}|yy(?:yy)?|([HhMsTt])\1?|[LloSZ]|"[^"]*"|'[^']*'/g,
        timezone = /\b(?:[PMCEA][SDP]T|(?:Pacific|Mountain|Central|Eastern|Atlantic) (?:Standard|Daylight|Prevailing) Time|(?:GMT|UTC)(?:[-+]\d{4})?)\b/g,
        timezoneClip = /[^-+\dA-Z]/g,
        pad = function (val, len) {
            val = String(val);
            len = len || 2;
            while (val.length < len) val = "0" + val;
            return val;
        };

    // Regexes and supporting functions are cached through closure
    return function (date, mask, utc) {
        var dF = dateFormat;

        // You can't provide utc if you skip other args (use the "UTC:" mask prefix)
        if (arguments.length == 1 && Object.prototype.toString.call(date) == "[object String]" && !/\d/.test(date)) {
            mask = date;
            date = undefined;
        }

        // Passing date through Date applies Date.parse, if necessary
        date = date ? new Date(date) : new Date;
        if (isNaN(date)) throw SyntaxError("invalid date");

        mask = String(dF.masks[mask] || mask || dF.masks["default"]);

        // Allow setting the utc argument via the mask
        if (mask.slice(0, 4) == "UTC:") {
            mask = mask.slice(4);
            utc = true;
        }

        var _ = utc ? "getUTC" : "get",
            d = date[_ + "Date"](),
            D = date[_ + "Day"](),
            m = date[_ + "Month"](),
            y = date[_ + "FullYear"](),
            H = date[_ + "Hours"](),
            M = date[_ + "Minutes"](),
            s = date[_ + "Seconds"](),
            L = date[_ + "Milliseconds"](),
            o = utc ? 0 : date.getTimezoneOffset(),
            flags = {
                d:    d,
                dd:   pad(d),
                ddd:  dF.i18n.dayNames[D],
                dddd: dF.i18n.dayNames[D + 7],
                m:    m + 1,
                mm:   pad(m + 1),
                mmm:  dF.i18n.monthNames[m],
                mmmm: dF.i18n.monthNames[m + 12],
                yy:   String(y).slice(2),
                yyyy: y,
                h:    H % 12 || 12,
                hh:   pad(H % 12 || 12),
                H:    H,
                HH:   pad(H),
                M:    M,
                MM:   pad(M),
                s:    s,
                ss:   pad(s),
                l:    pad(L, 3),
                L:    pad(L > 99 ? Math.round(L / 10) : L),
                t:    H < 12 ? "a"  : "p",
                tt:   H < 12 ? "am" : "pm",
                T:    H < 12 ? "A"  : "P",
                TT:   H < 12 ? "AM" : "PM",
                Z:    utc ? "UTC" : (String(date).match(timezone) || [""]).pop().replace(timezoneClip, ""),
                o:    (o > 0 ? "-" : "+") + pad(Math.floor(Math.abs(o) / 60) * 100 + Math.abs(o) % 60, 4),
                S:    ["th", "st", "nd", "rd"][d % 10 > 3 ? 0 : (d % 100 - d % 10 != 10) * d % 10]
            };

        return mask.replace(token, function ($0) {
            return $0 in flags ? flags[$0] : $0.slice(1, $0.length - 1);
        });
    };
}();

// Some common format strings
dateFormat.masks = {
    "default":      "ddd mmm dd yyyy HH:MM:ss",
    shortDate:      "m/d/yy",
    mediumDate:     "mmm d, yyyy",
    longDate:       "mmmm d, yyyy",
    fullDate:       "dddd, mmmm d, yyyy",
    shortTime:      "h:MM TT",
    mediumTime:     "h:MM:ss TT",
    longTime:       "h:MM:ss TT Z",
    isoDate:        "yyyy-mm-dd",
    isoTime:        "HH:MM:ss",
    isoDateTime:    "yyyy-mm-dd'T'HH:MM:ss",
    isoUtcDateTime: "UTC:yyyy-mm-dd'T'HH:MM:ss'Z'"
};

// Internationalization strings
dateFormat.i18n = {
    dayNames: [
        "Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat",
        "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"
    ],
    monthNames: [
        "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec",
        "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"
    ]
};

// For convenience...
Date.prototype.format = function (mask, utc) {
    return dateFormat(this, mask, utc);
};

//end date format

});