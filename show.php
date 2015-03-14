<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<link href="css/common.css" type="text/css" rel="stylesheet">
</head>

<body>
    <?php
    require ('get_util.php');
    $ip_address = $_POST["ipAddress"];
    mysql_query("set names 'utf8'");
    mysql_select_db("ipsearch_db", $con);
    $select = "SELECT * FROM ipaddress WHERE ip='" . $ip_address . "'";
    $result = mysql_query($select);
    
    echo "
             <table border='1' class='middle_center' >
             <tr>
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
            <?php
            echo "今天是 " . date("Y.m.d") . " " . date("l") . "<br>";
            ?>
</div>

</body>
</html>