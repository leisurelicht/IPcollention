<html>
<head>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
		<link href="css/common.css"  type="text/css" rel="stylesheet">
</head>
<body>

<div class="middle">
    <h1 align="center">IPCollection</h1>
    <div class="middle_center">
        <form action="search.php" method="post">
            IP: <input type="text" name="ipAddress">
            <input type="submit" value="查询">
        </form>
    </div>
    <div class="right">
            <?php
                echo "今天是 " . date("Y.m.d") . " " . date("l")."<br>";
            ?>
    </div>
</div>

</body>
</html>
