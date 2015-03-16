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
    
    $ip_address = $_POST["delipAddress"];
   

    $result = del_ip_message($ip_address);
    
    $result = get_ip_message($ip_address);
    
    $url = "show.php";
    if (isset($url)) {
        Header("Location: $url?ipAddress=$ip_address");
    }
    
    mysql_close($con);
    ?>
 

	</div>
</body>
</html>