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
    require ('string_handle.php');
    $ip_address = $_POST["inipAddress"];
    $ip_message = $_POST["inipMessage"];
    if ($ip_address == '') {
        echo "<div class='middle_center'><h2 onclick='changetext(this)' >无法插入一个空IP<br>请点击我输入要查询的IP</h2></div>";
    } else {
        $str = new string_handles();
        $flag=$str->string_judge($ip_address);
        print_r($flag);
        // 连接数据库查询对操作数据
        $sql = new mysql_handles();
        if($flag[0]==true){
            $result = $sql->insert_ip_segment_message($flag[1], $ip_message);
            $ip_address=$str->string_blurred($flag[1]);
        }elseif($flag[0]==false){
            $result = $sql->insert_ip_message($ip_address, $ip_message);
        }
        
        unset($str);
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