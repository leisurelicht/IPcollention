<?php

class mysql_handles
{
    private $con;
    

    function __construct()
    {
        $this->con = mysql_connect('127.0.0.1', 'root', 'root');
        if (! $this->con) {
            die('Could not connect: ' . mysql_error()) . "<br>";
        } else {
            if (PHP_OS == Darwin) {
                mysql_query("set names 'utf8'", $this->con);
            }
            mysql_select_db("ipsearch_db",$this->con);
        }
    }
 
    function __destruct(){
        mysql_close($this->con);
    }
    
    public function get_all_ip()
    {   
        $select = "SELECT * FROM ipaddress";
        $result = mysql_query($select,$this->con);
        return $result;
        
    }

    public function get_ip_message($ip_address)
    {
        $data_select = "SELECT ip,message,recordtime,updatetime FROM ipaddress WHERE ip like '{$ip_address}';";
        $result = mysql_query($data_select,$this->con);
        return $result;
    }

    public function insert_ip_message($ip_address, $ip_message)
    {
        $data_insert = "INSERT INTO ipaddress (ip,message,recordtime) VALUES ('$ip_address','$ip_message',now())";
        $result = mysql_query($data_insert,$this->con);
        return $result;
    }
    
    public function insert_ip_segment_message($ip_address, $ip_message)
    {
        foreach(range(1, 254) as $i)
        {
            $ipaddress = $ip_address;
            $ipaddress=$ipaddress.'.'.$i;
            $result = mysql_query("INSERT INTO ipaddress (ip,message,recordtime) VALUES ('$ipaddress','$ip_message',now())",$this->con);
        }
        return $result;
    }

    public function update_ip_message($ip_address, $ip_message)
    {
        #$localtime_assoc = localtime(time(), true);
        $data_update = "UPDATE ipaddress  SET message='$ip_message',updatetime = now() where ip='$ip_address'";
        $result = mysql_query($data_update,$this->con);
        return $result;
    }

    public function del_ip_message($ip_address)
    {
        $delect = "DELETE FROM ipaddress WHERE ip='$ip_address'";
        $result = mysql_query($delect,$this->con);
        return $result;
    }

    public function get_ip_count()
    {
        $count = "SELECT COUNT(*) FROM ipaddress";
        $result = mysql_query($count,$this->con);
        return $result;
    }

}   
?>