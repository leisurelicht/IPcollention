<?php

    function connet_mysql()
    {
        $con = mysql_connect("127.0.0.1", "root", "root");
        if (! $con) {
            die('Could not connect: ' . mysql_error()) . "<br>";
        } 

        else {
            return $con;
        }
        
    }
    
    function get_all_ip()
    {
    
        $con = connet_mysql();
        if(PHP_OS == Darwin)
        {
        mysql_query("set names 'utf8'");
        }
        mysql_select_db("ipsearch_db", $con);
        $select = "SELECT * FROM ipaddress";
        $result = mysql_query($select);
        return $result;
        mysql_close($con);
    }

    function get_ip_message($ip_address)
    {
        
        $con = connet_mysql();
        if(PHP_OS == Darwin)
        {
        mysql_query("set names 'utf8'");
        }
        mysql_select_db("ipsearch_db", $con);
        $select = "SELECT * FROM ipaddress WHERE ip='" . $ip_address . "'";
        $result = mysql_query($select);
        return $result;
        mysql_close($con);
    }
    
    function insert_ip_message($ip_address,$ip_message)
    {
        
        $localtime_assoc = localtime(time(), true); 
        $con = connet_mysql();
        if(PHP_OS == Darwin)
        {
        mysql_query("set names 'utf8'");
        }
        mysql_select_db("ipsearch_db", $con);
        $insert = "INSERT INTO ipaddress (ip,message,recordtime) VALUES ('$ip_address','$ip_message',now())";
        $result = mysql_query($insert);
        return $result;
        mysql_close($con);
    }
    
    function update_ip_message($ip_address,$ip_message)
    {
        $localtime_assoc = localtime(time(), true);
        $con = connet_mysql();
        if(PHP_OS == Darwin)
        {
        mysql_query("set names 'utf8'");
        }
        mysql_select_db("ipsearch_db", $con);
        $insert = "UPDATE ipaddress  SET message='$ip_message',updatetime = now() where ip='$ip_address'";
        $result = mysql_query($insert);
        return $result;
        mysql_close($con);
    }
    
    function del_ip_message($ip_address)
    {
        $con = connet_mysql();
    if(PHP_OS == Darwin)
        {
        mysql_query("set names 'utf8'");
        }
        mysql_select_db("ipsearch_db", $con);
        $delect = "DELETE FROM ipaddress WHERE ip='$ip_address'";
        $result = mysql_query($delect);
        return $result;
        mysql_close($con);
    }
    
    function get_ip_count()
    {
        $con = connet_mysql();
        if(PHP_OS == Darwin)
        {
        mysql_query("set names 'utf8'");
        }
        mysql_select_db("ipsearch_db", $con);
        $count = "SELECT COUNT(*) FROM ipaddress";
        $result = mysql_query($count);
        return $result;
        mysql_close($con);
    }
    
    
?>