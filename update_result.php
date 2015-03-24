<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<link href="css/common.css" type="text/css" rel="stylesheet">
<script>
function changetext(id)
{
	window.location.href="index.php"; 
}
</script>
</head>

<body>
	<div class="middle">
    <?php
    require ('mysql_handle.php');
    
    $ip_address = $_POST["upipAddress"];
    $ip_message = $_POST["upipMessage"];
    if ($ip_address == '') {
        echo "<div class='middle_center'><h2 onclick='changetext(this)' >无法更新一个空IP<br>请点击我返回主页</h2></div>";
    } else {
        // 连接数据库查询对操作数据
        $sql = new mysql_handles();
        $result = $sql->update_ip_message($ip_address, $ip_message);
        unset($sql);
        // 连接数据库查询对操作数据
        
        $url = "show.php";
        if (isset($url)) {
            Header("Location: $url?ipAddress=$ip_address");
        }
    }
    ?>
 
	</div>
</body>
</html>