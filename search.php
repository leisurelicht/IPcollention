<!DOCTYPE html>
<html>
	<head>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
	</head>

<body>


<h1 align="center">IPCollection</h1>

<?php
	echo  "Database connecting..."."<br><br>";
	$con = mysql_connect("127.0.0.1","root","root");
	if (!$con)
	{
		die('Could not connect: ' . mysql_error())."<br>";
	}
	else
	{
		echo "DataBase connect success..."."<br><br><br>";
		
	}
	$ip_address = $_POST["ipAddress"];
	mysql_query("set names 'utf8'");
	mysql_select_db("ipsearch_db", $con);
    $select = "SELECT * FROM ipaddress WHERE ip='".$ip_address."'";
    
    
	$result = mysql_query($select);
	echo var_dump($result);
	
	echo "<table border='1'>
	<tr>
	<th>IP </th>
	<th>Message </th>
	<th>RecordTime </th>
	<th>UpdateTime </th>
	</tr>";
	
	while($row = mysql_fetch_array($result))
	  {
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

<?php
echo "今天是 " . date("Y.m.d") . " " . date("l")."<br>";
?>
</body>
</html>