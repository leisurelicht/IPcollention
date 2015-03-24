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
    #require ('mysql_handle.php');
    require ('string_handle.php');
    $ip_address = $_POST["ipAddress"];
    $str = new string_handles();
    $ip_address=$str->string_blurred($ip_address);
    unset($str);
    $ip_address=urlencode($ip_address);
    if($ip_address=='NULL')
    {
        echo"<div class='middle_center'><h2 onclick='changetext(this)' >无法查询一个空IP<br>请点击我输入要查询的IP</h2></div>";
    }else {
    $url = "show.php";
    if (isset($url)) {
        Header("Location: $url?ipAddress=$ip_address");
    }
    }
    ?>
</div>
</body>
</html>