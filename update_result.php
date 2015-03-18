<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<link href="css/common.css" type="text/css" rel="stylesheet">
</head>

<body>
	<div class="middle">
    <?php
    require ('mysql_handle.php');
    
    $ip_address = $_POST["upipAddress"];
    $ip_message = $_POST["upipMessage"];
    
    //连接数据库查询对操作数据
    $sql = new mysql_handles();
    $result = $sql->update_ip_message($ip_address,$ip_message);
    unset($sql);
    //连接数据库查询对操作数据
    
    $url = "show.php";
    if (isset($url)) {
        Header("Location: $url?ipAddress=$ip_address");
    }
    
    mysql_close($con);
    ?>
 
	</div>
</body>
</html>