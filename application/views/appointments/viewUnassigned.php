<body>
  <div id="wrapper">
    <!-- Page Content -->
    <div id="page-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <h1 class="page-header">Unassigned Appointments</h1>
          </div>
          <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row appointed">
          <div class="col-lg-12">
            <div class="panel-body">

              <div class="dataTable_wrapper">

                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                  <thead>
                    <th>Location</th>
                    <th>Package</th>
                    <th>Operator</th>
                    <th>Car</th>
                    <th>Model</th>
                    <th>Owner</th>
                    <th>Time Start</th>
                    <th>Time End</th>
                  </thead>
                  <tbody>
                    <?php
                    foreach($Data as $val)
                    {
                     $timeStart = date("j F Y H:i A", strtotime($val->startedAt)); 
                     $timeEnd = date("j F Y H:i A", strtotime($val->endedAt)); 

                     echo "<tr>
                     <td>".$val->locationString."
                     </td>
                     <td id=".$val->packageObjectId.">
                     </td>
                     <td id=".$val->optrObjectId.">
                     </td>
                     <td id=".$val->carObjectId.">
                     </td>
                     <td id=".$val->carObjectId.">
                     </td>
                     <td id=".$val->userObjectId.">
                     </td>";

                     if($val->startedAt == "")
                     {
                      if($val->endedAt == "")
                      {
                        echo "<td>".$val->startedAt."
                        </td>
                        <td>".$val->endedAt."
                        </td>
                        </tr>
                        ";
                      }
                      else
                      {
                       echo "<td>".$val->startedAt."
                       </td>
                       <td>".$timeEnd."
                       </td>
                       </tr>
                       ";
                     }

                   }
                   elseif($val->endedAt = "")
                   {
                    if($val->startedAt = "")
                    {
                     echo "<td>".$val->startedAt."
                     </td>
                     <td>".$val->endedAt."
                     </td>
                     </tr>
                     ";
                   }
                   else
                   {
                     echo "<td>".$timeStart."
                     </td>
                     <td>".$val->endedAt."
                     </td>
                     </tr>
                     ";
                   }
                 }
                 elseif($val->startedAt && $val->endedAt = "")
                 {
                   echo "<td>".$val->startedAt."
                   </td>
                   <td>".$val->endedAt."
                   </td>
                   </tr>
                   ";
                 }
                 else
                 {
                  echo "<td>".$timeStart."
                  </td>
                  <td>".$timeEnd."
                  </td>
                  </tr>
                  ";
                }
              }

              ?>
            </tbody>
          </table>
        </div>
        <!-- /.table-responsive -->

      </div>
      <!-- /.panel-body -->

    </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
</div>
</body>