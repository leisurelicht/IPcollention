<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<link href="css/common.css" type="text/css" rel="stylesheet">
</head>

<body>
	<div class="middle">
	
    <?php
    #require ('mysql_handle.php');
    require ('string_handle.php');
    $ip_address = $_POST["ipAddress"];
    $str = new string_handles();
    $ip_address=$str->string_blurred($ip_address);
    
    $url = "show.php";
    if (isset($url)) {
        Header("Location: $url?ipAddress=$ip_address");
    }
    ?>
</div>
</body>
</html>