<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<link href="css/common.css" type="text/css" rel="stylesheet">
<?php
            if (!isset($_COOKIE['visits'])) $_COOKIE['visits'] = 0;
            $visits = $_COOKIE['visits'] + 1;
            setcookie('visits', $visits, time() + 3600 * 24 * 365);
?>
</head>

<body>
	<div class="middle">
		<h1 align="center">IPCollection</h1>
		<h1 align="center">祈祷结束</h1>

		<div class="middle_center">
			<form action="show_all.php">
				<input type="submit" value="显示所有IP">
			</form>
		</div>

		<div class="middle_center">
			<form action="select_result.php" method="post">
				IP: <input type="text" name="ipAddress"> 
				    <input type="submit"value="查询">
			</form>
		</div>

		<div class="middle_center">
			<form action="insert_result.php" method="post">
				IP: <input type="text" name="inipAddress" > 
				IP信息: <input type="text" name="inipMessage" > 
					<input type="submit" value="插入">
			</form>
		</div>

		<!--<div class="middle_center">
			<form action="update_result.php" method="post">
				IP: <input type="text" name="upipAddress"> 
				IP信息:<input type="text" name="upipMessage"> 
				<input type="submit" value="更新">
			</form>
		</div>s

		<div class="middle_center">
			<form action="delect_result.php" method="post">
				IP: <input type="text" name="delipAddress"> <input type="submit"
					value="删除">
			</form>
		</div>-->
			
		
             
		<div class="right">
            <?php
            require ('mysql_handle.php');
            $sql = new mysql_handles();
            $count = $sql -> get_ip_count();
            $row = mysql_fetch_row($count);
            foreach($row as $data){
                echo "已存IP数据数目为".$data."个";
            }
            unset($sql);
            ?>
        </div>

		<div class="right">
            <?php
            echo "现在是 " . date("Y.m.d") . " " . date("l").' '.date("h:i:sa");
            #$localtime_assoc = localtime(time(), true);
            #echo $localtime_assoc[tm_hour].":".$localtime_assoc[tm_min].":".$localtime_assoc[tm_sec];
            ?>
        </div>
        
        
        <div class="right">
        <?php

            if ($visits > 1) {
                echo ("This is visit number $visits.");
            } else { // First visit
                echo ('Welcome to oschina.net! Click here for a tour!');
            }
        ?>
        </div>
        
        <div class="middle_center">
            <h4>3.18 更新：</h4>  
            <p>增加模糊搜索</p>
            <p>模糊搜索的方法：</p>
            <p>例1：192.168//后面可以省略</p>
            <p>例2：192.168.*.1//模糊部分可用*号代替</p>
            <br>
            <h4>3.24 更新：</h4>
            <p>增加IP段插入</p>
            <p>使用示例：</p>
            <p>例1：192.168.1.*//将最后一位用*代替即可</p>
            <p>插入过程中遇到已存在的IP不会更新原IP信息</p>
            <p>谨慎使用</p>
        </div>
        
    </div>
</body>
</html>
