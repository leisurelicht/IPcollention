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
    
    $ip_address = $_REQUEST['ipAddress'];
    $ip_address=urldecode($ip_address);
        // 连接数据库查询对操作数据
        $sql = new mysql_handles();
        $result = $sql->get_ip_message($ip_address);
        unset($sql);
        // 连接数据库查询对操作数据
        $num=mysql_num_rows($result);  //获取行数
        if ($num != 0) {
        echo "
             <table border='1' class='middle_center' >
             <tr >
                <th>IP </th>
                <th>Message </th>
                <th>RecordTime </th>
                <th>UpdateTime </th>
             </tr>
            ";
        while ($row = mysql_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['ip'] . "</td>";
            echo "<td>" . $row['message'] . "</td>";
            echo "<td>" . $row['recordtime'] . "</td>";
            echo "<td>" . $row['updatetime'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        
        
        echo "<br><br>";
        echo "<div class='middle_center'>
                    插入IP信息
                    </div>";
        echo "
                <div class='middle_center'>
                <form action='insert_result.php' method='post'>
                    IP: <input type='text' name='inipAddress' >
                    IP信息: <input type='text' name='inipMessage'>
                    <input type='submit' value='插入'>
                </form>
                </div>";
        
        
        echo "<br><br>";
        echo "<div class='middle_center'>
                    更新IP信息
                    </div>";
        echo "
                <div class='middle_center'>
                <form action='update_result.php' method='post'>
                    IP: <input type='text' name='upipAddress' >
                    IP信息: <input type='text' name='upipMessage'>
                    <input type='submit' value='更新'>
                </form>
                </div>";
        
        echo "<br><br>";
        echo "<div class='middle_center'>
                    删除IP信息
                    </div>";
        echo "<div class='middle_center'>
    			<form action='delect_result.php' method='post'>
    				IP: <input type='text' name='delipAddress'> 
                        <input type='submit' value='删除'>
    			</form>
		      </div>";
    } else {
        
        echo "<div class='middle_center'>
            不存在关于IP:" . $ip_address . "的信息。<br><br>
    			    
            插入新IP
            </div>";
        
        echo "
            <div class='middle_center'>
			<form action='insert_result.php' method='post'>
				IP: <input type='text' name='inipAddress'> 
				IP信息: <input type='text' name='inipMessage'> 
				<input type='submit' value='插入'>
			</form>
	        </div>";
    }
    
    echo "
            <div class='right'>
			<br> <br> <a href='index.php'>返回主页 <br> <br>
			</a>
		    </div>";
    
    ?>

        

		<div class="right">
            <?php
            echo "现在是 " . date("Y.m.d") . " " . date("l").' '.date("h:i:sa");
            #$localtime_assoc = localtime(time(), true);
            #echo $localtime_assoc[tm_hour] . ":" . $localtime_assoc[tm_min] . ":" . $localtime_assoc[tm_sec];
            ?>
        </div>
	</div>
</body>
</html>