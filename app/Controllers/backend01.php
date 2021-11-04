<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class backend01 extends Controller {
    public function index()
    {
        // $str = "abcdefghijklmnopAEIOo";
        $str = "Squid GAme (MugUnghwa flOwer has blOssomed)";

        // Coding back-end 01 here!!!! 

        // 62160109 วิรัตน์ สากร
        // Wirat Sakorn
        $uppercase_str = strtoupper($str);

        echo 'Expected value<br>';
        echo 'String: ' . $str . '<br>';
        echo 'a : ' . substr_count($uppercase_str, 'A') . '<br>';
        echo 'e : ' . substr_count($uppercase_str, 'E') . '<br>';
        echo 'i : ' . substr_count($uppercase_str, 'I') . '<br>';
        echo 'o : ' . substr_count($uppercase_str, 'O') . '<br>';
        echo 'u : ' . substr_count($uppercase_str, 'U') . '<br>';

        // Coding back-end 01 here!!!! 
    }
}
?>