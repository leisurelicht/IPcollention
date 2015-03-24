<?php

class string_handles
{
    public function string_judge($str)
    {
        $res = array();
        $result = explode('.', $str);
        if($result[3] == '*'){
            array_splice($result,3,1);
            $res[0]=true;
            $res[1]=implode('.',$result);
            return $res;
        }else{
            $res[0]=false;
            return $res;
        }
    }
    public function string_blurred($str)
    {
        $result = explode('.', $str);
        $count = count($result);
        if ($count == 4) {
            foreach ($result as $key => $element) {
                if ($element == '*') {
                    $result[$key] = '%';
                }
            }
            $ip_address = implode('.',$result);
            #$ip_address = $result[0] . '.' . $result[1] . '.' . $result[2] . '.' . $result[3];
        } elseif ($count > 0 and $count < 4) {
            foreach ($result as $key => $element) {
                if ($element == '*') {
                    $result[$key] = '%';
                }
            }
            if ($result[0] != '') {
                switch ($count) {
                    case 1:
                        $ip_address = $result[0] . '.%.%.%';
                        break;
                    case 2:
                        $ip_address = $result[0] . '.' . $result[1] . '.%.%';
                        break;
                    case 3:
                        $ip_address = $result[0] . '.' . $result[1] . '.' . $result[2] . '.%';
                        break;
                }
            }elseif($result[0] == '') {
                $ip_address = 'NULL';
            } 
        }
        return $ip_address;
    }
}



?>