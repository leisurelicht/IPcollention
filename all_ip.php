<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<link href="css/common.css" type="text/css" rel="stylesheet">
</head>

<body>
<div class="middle">

<?php
require ('get_util.php');

$result = get_all_ip();


$url = "show.php";
if (isset($url)) {
    Header("Location: $url?ipAddress=$ip_address");
}
?>
</div>
</body>
</html>