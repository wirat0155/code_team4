<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class backend01 extends Controller{
    public function index()
    {
        //$str = "abcdefghijklmnopAEIOo";
        $str = "Squid GAme (MugUnghwa flOwer has blOssomed)";

        // Coding back-end 01 here!!!! 

        //62160323 นายกิตติพศ รุ่งเรือง
        echo 'Expected value <br>';
        echo 'String: ' . $str . '<br>';

        $A = 0;
        $E = 0;
        $I = 0;
        $O = 0;
        $U = 0;

        for($i=0; $i < strlen($str); $i++){

            if($str[$i] == 'a' || $str[$i] == 'A'){
                $A++;
            }
            else if($str[$i] == 'e' || $str[$i] == 'E'){
                $E++;
            }
            if($str[$i] == 'i' || $str[$i] == 'I'){
                $I++;
            }
            else if($str[$i] == 'o' || $str[$i] == 'O'){
                $O++;
            }
            else if($str[$i] == 'u' || $str[$i] == 'U'){
                $U++;
            }

        }

        echo 'a : ' . $A . '<br>';
        echo 'e : ' . $E . '<br>';
        echo 'i : ' . $I . '<br>';
        echo 'o : ' . $O . '<br>';
        echo 'u : ' . $U . '<br>';

        // Coding back-end 01 here!!!! 
    }
}
?>
