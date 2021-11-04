<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class backend02 extends Controller {
    public function index()
    {
        // $myArray = array(8,2,8,1,6,7);
        $myArray = array(1,2,3,4,5,6,7);

        // Coding back-end 02 here!!!! 

        // 62160109 วิรัตน์ สากร
        // Wirat Sakorn
        
        $myArray_reversed = array_reverse($myArray);

        echo "MyArray Value :";
        foreach ($myArray AS $value) {
            echo " ". $value;
        }
        echo "<br />";

        echo "Expected Value :";
        foreach ($myArray_reversed AS $value) {
            echo " ". $value;
        }
        echo "<br />";


        // Coding back-end 02 here!!!! 
    }
}
?>