<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class backend04 extends Controller{
    public function index()
    {
        //$str = "TTTtAAAAaasdvcbbbcdddd";
        $str = "AAaisiTTTs";

        // Coding back-end 04 here!!!! 

        //62160323 นายกิตติพศ รุ่งเรือง
        $repeat = array();
        $keep = array();
        $index = 0;

        for($i=0;$i<strlen($str);$i++){
        
            if($str[$i] == $str[$i-1]){
                $repeat[$index]++; 
            }else{
                array_push($repeat, 1);
                array_push($keep, $str[$i]);
                if($i != 0)
                    $index++;
            }

        }

        echo 'Expected value <br>';
        echo 'String: ' . $str . '<br>';

        $max_repeat = array_search(max($repeat), $repeat);

        echo 'Longest Character: ' . $repeat[$max_repeat] . '<br>';
        echo 'For the character : ' . $keep[$max_repeat] . '<br>';

        // Coding back-end 04 here!!!! 
    }
}
?>
