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
    
    //连接数据库查询对操作数据
    $sql = new mysql_handles();
    $result = $sql->get_all_ip();
    unset($sql);
    //连接数据库查询对操作数据
    
    echo "
             <table border='1' class='middle_center' > 
             <tr >
                <th>IP </th>
                <th>Message </th>
                <th>RecordTime </th>
                <th>UpdateTime </th>
             </tr>";
    
    while ($row = mysql_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['ip'] . "</td>";
        echo "<td>" . $row['message'] . "</td>";
        echo "<td>" . $row['recordtime'] . "</td>";
        echo "<td>" . $row['updatetime'] . "</td>";
        echo "</tr>";
    }
    
    echo "</table>";
    mysql_close($con);
    ?>
    
<div class="right">
    <br><br>
    <a href="index.php">返回主页
    <br><br>
    </a>
</div>
 
<div class="right">
    <?php
    echo "现在是 " . date("Y.m.d") . " " . date("l") . ' ';
    $localtime_assoc = localtime(time(), true);
    echo $localtime_assoc[tm_hour] . ":" . $localtime_assoc[tm_min] . ":" . $localtime_assoc[tm_sec];
    ?>
</div>
	</div>
</body>
</html>