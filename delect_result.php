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
    
    $ip_address = $_POST["delipAddress"];
    
    if ($ip_address == '') {
        echo "<div class='middle_center'><h2 onclick='changetext(this)' >无法删除一个空IP<br>请点击我返回主页</h2></div>";
    } else {
        // 连接数据库删除操作数据
        $sql = new mysql_handles();
        
        $is_result = $sql->get_ip_message($ip_address);
        $num = mysql_num_rows($is_result); // 获取行数
        if ($num != 0) {
            $result = $sql->del_ip_message($ip_address);
            $result = $sql->get_ip_message($ip_address);
            
            // 连接数据库删除操作数据
            
            $del_result = $sql->get_ip_message($ip_address);
            $num_del = mysql_num_rows($del_result); // 获取行数
            if ($num_del == 0) {
                echo "<div class='middle_center'><h2 onclick='changetext(this)' >删除成功<br>请点击我返回主页</h2></div>";
            } else {
                echo "<div class='middle_center'><h2 onclick='changetext(this)' >删除失败<br>请点击我返回主页</h2></div>";
            }
        } else {
            echo "<div class='middle_center'><h2 onclick='changetext(this)' >无法删除不存在的IP<br>请点击我返回主页</h2></div>";
        }
        unset($sql);
        }
    ?>
 

	</div>
</body>
</html>