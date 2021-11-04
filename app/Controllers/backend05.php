<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class backend05 extends Controller {
    public function index()
    {
        // $rows = 8;  
        $rows = 5;  

        // Coding back-end 05 here!!!! 

        // 62160109 วิรัตน์ สากร
        // Wirat Sakorn
        for ($i = $rows; $i > 0; $i--) {
            for ($j = $rows; $j > 0; $j--) {
                if ($j > $i) {
                    echo "<span style='visibility: hidden;'>x</span>";
                }
                else {
                    if ($j % 2 == 1) echo $j;
                    else echo "*";
                }
            }
            echo "<br />";
        }

        for ($i = 2; $i <= $rows; $i++) {
            for ($j = $rows; $j > 0; $j--) {
                if ($j > $i) {
                    echo "<span style='visibility: hidden;'>x</span>";
                }
                else {
                    if ($j % 2 == 1) echo $j;
                    else echo "*";
                }
            }
            echo "<br />";
        }



        // Coding back-end 05 here!!!! 
    }
}
?>