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
    
    $ip_address = $_POST["delipAddress"];
    
    //连接数据库查询对操作数据
    $sql = new mysql_handles();
    $result = $sql->del_ip_message($ip_address);
    $result = $sql->get_ip_message($ip_address);
    unset($sql);
    //连接数据库查询对操作数据
    
    $url = "show.php";
    if (isset($url)) {
        Header("Location: $url?ipAddress=$ip_address");
    }
    
    ?>
 

	</div>
</body>
</html>