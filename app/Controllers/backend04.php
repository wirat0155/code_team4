<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class backend04 extends Controller {
    public function index()
    {
        // $str = "TTTtaasdvcbbbcdddd";
        $str = "AAaisiTTTs";
        
        // Coding back-end 04 here!!!! 
        // 62160109 วิรัตน์ สากร
        // Wirat Sakorn
        
        $pattern = '/(.)\1+/';
        preg_match_all($pattern, $str, $m);
        usort($m[0], function($a, $b) {
            return (strlen($a) < strlen($b)) ? 1 : -1;
        });

        
        echo "Expected value<br>";
        echo "String: " . $str . "<br>";
        echo "Longest Character: " . strlen($m[0][0]) . "<br/>";
        echo "For the charater : " . substr($m[0][0],0,1);
        // Coding back-end 04 here!!!! 
    }
}
?>