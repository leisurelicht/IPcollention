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
<<<<<<< HEAD
		<h1 align="center">修正中……</h1>
=======
>>>>>>> origin/master

		<div class="middle_center">
			<form action="show_all.php">
				<input type="submit" value="显示所有IP">
			</form>
		</div>

		<div class="middle_center">
<<<<<<< HEAD
			<form action="select_result.php" method="post">
				IP: <input type="text" name="ipAddress"> 
				    <input type="submit"value="查询">
=======
			<form action="show.php" method="post">
				IP: <input type="text" name="ipAddress"> <input type="submit"
					value="查询">
>>>>>>> origin/master
			</form>
		</div>

		<div class="middle_center">
			<form action="insert_result.php" method="post">
<<<<<<< HEAD
				IP: <input type="text" name="inipAddress"> 
				IP信息: <input type="text" name="inipMessage"> 
					<input type="submit" value="插入">
=======
				IP: <input type="text" name="inipAddress"> IP信息: <input type="text"
					name="inipMessage"> <input type="submit" value="插入">
>>>>>>> origin/master
			</form>
		</div>

		<div class="middle_center">
			<form action="update_result.php" method="post">
<<<<<<< HEAD
				IP: <input type="text" name="upipAddress"> 
				IP信息:<input type="text" name="upipMessage"> 
				<input type="submit" value="更新">
=======
				IP: <input type="text" name="upipAddress" vlaue="$ip_address"> IP信息:
				<input type="text" name="upipMessage"> <input type="submit"
					value="更新">
>>>>>>> origin/master
			</form>
		</div>

		<div class="middle_center">
			<form action="delect_result.php" method="post">
				IP: <input type="text" name="delipAddress"> <input type="submit"
					value="删除">
			</form>
		</div>
<<<<<<< HEAD
			
		
             
		<div class="right">
            <?php
            require ('mysql_handle.php');
            $sql = new mysql_handles();
            $count = $sql -> get_ip_count();
=======


		<div class="right">
            <?php
            require ('get_util.php');
            
            $count = get_ip_count();
>>>>>>> origin/master
            $row = mysql_fetch_row($count);
            foreach($row as $data){
                echo "已存IP数据数目为".$data."个";
            }
            unset($sql);
            ?>
        </div>

		<div class="right">
            <?php
            echo "现在是 " . date("Y.m.d") . " " . date("l").' ';
            $localtime_assoc = localtime(time(), true);
            echo $localtime_assoc[tm_hour].":".$localtime_assoc[tm_min].":".$localtime_assoc[tm_sec];
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
<<<<<<< HEAD
        
        <div class="middle_center">
            <h5>3.18 更新：</h5>  
            <p>增加模糊搜索</p>
        </div>
		
		
		<div class="middle_center">
            <p>模糊搜索的方法：</p>
            <p>例1：192.168</p>
            <p>例2：192.168.*.1</p>
        </div>
        
    </div>
=======
	</div>

>>>>>>> origin/master
</body>
</html>
