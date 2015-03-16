<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<link href="css/common.css" type="text/css" rel="stylesheet">
</head>
<body>
<div class="middle">
		<h1 align="center">IPCollection</h1>
		
		<div class="middle_center">
			<form action="show.php" method="post">
				 <input type="submit" value="查询所有IP">
			</form>
		</div>
		
		<div class="middle_center">
			<form action="show.php" method="post">
				IP: <input type="text" name="ipAddress">
				 <input type="submit" value="查询">
			</form>
		</div>
		
		<div class="middle_center">
			<form action="insert_result.php" method="post">
				IP: <input type="text" name="inipAddress"> 
				IP信息: <input type="text" name="inipMessage"> 
				<input type="submit" value="插入">
			</form>
	    </div>
	    
		<div class="middle_center">
			<form action="update_result.php" method="post">
				IP: <input type="text" name="upipAddress" vlaue="$ip_address"> 
				IP信息: <input type="text" name="upipMessage"> 
				<input type="submit" value="更新">
			</form>
        </div>
        
		<div class="middle_center">
			<form action="delect_result.php" method="post">
				IP: <input type="text" name="delipAddress"> 
				<input type="submit" value="删除">
			</form>
		</div>
		
		
		<div class="right">
            <?php
            require ('get_util.php');
            $count = get_ip_count();
            $row = mysql_fetch_row($count);
            foreach($row as $data){
                echo "已存IP数据数目为".$data."个";
            }
            
            ?>
        </div>
        
		<div class="right">
            <?php
            echo "现在是 " . date("Y.m.d") . " " . date("l").' ';
            $localtime_assoc = localtime(time(), true);
            echo $localtime_assoc[tm_hour].":".$localtime_assoc[tm_min].":".$localtime_assoc[tm_sec];
            ?>
        </div>
	</div>
	
</body>
</html>
