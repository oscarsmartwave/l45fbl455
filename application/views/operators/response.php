<?php
ob_start("ob_gzhandler");
echo json_encode((object)$response);
ob_end_flush();
ob_flush();
flush();
?>