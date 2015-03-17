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
    
    $ip_address = $_REQUEST['ipAddress'];
    
    $result = get_ip_message($ip_address);
    
    if ($row = mysql_fetch_array($result)) {
        echo "
             <table border='1' class='middle_center' > 
             <tr >
                <th>IP </th>
                <th>Message </th>
                <th>RecordTime </th>
                <th>UpdateTime </th>
             </tr>";
        
        echo "<tr>";
        echo "<td>" . $row['ip'] . "</td>";
        echo "<td>" . $row['message'] . "</td>";
        echo "<td>" . $row['recordtime'] . "</td>";
        echo "<td>" . $row['updatetime'] . "</td>";
        echo "</tr>";
        echo "</table>";
        
        echo "<div class='middle_center'>
            更新IP信息
            </div>";
        echo "
        <div class='middle_center'>
        <form action='update_result.php' method='post'>
            IP: <input type='text' name='upipAddress' vlaue='$ip_address'>
            IP信息: <input type='text' name='upipMessage'>
            <input type='submit' value='更新'>
        </form>
        </div>";
    } else {
        echo "<div class='middle_center'>
            不存在关于IP:" . $ip_address . "的信息。<br>
            插入新IP
            </div>";
        echo "
            <div class='middle_center'>
			<form action='insert_result.php' method='post'>
				IP: <input type='text' name='inipAddress' vlaue='$ip_address'> 
				IP信息: <input type='text' name='inipMessage'> 
				<input type='submit' value='插入'>
			</form>
	        </div>";
    }
    mysql_close($con);
    ?>
 
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