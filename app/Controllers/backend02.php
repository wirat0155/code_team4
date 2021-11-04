<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class backend02 extends Controller{
    public function index()
    {
        // $myArray = array(8,2,8,1,6,7);
        $myArray = array(1,2,3,4,5,6,7);

        // Coding back-end 02 here!!!! 

        //62160323 นายกิตติพศ รุ่งเรือง
        echo "MyArray Value  : ";
        foreach($myArray as $value){
            echo $value . ' ';
        }

        echo '<br>';

        $myArray2 = $myArray;
        $end = count($myArray);
        for($i=0;$i<(count($myArray)/2);$i++){
            $myArray[$i] = $myArray2[$end];
            $myArray[$end] = $myArray2[$i];
            $end--;
        }


        echo "Expected Value : ";
        foreach($myArray as $value){
            echo $value . ' ';
        }

        // Coding back-end 02 here!!!! 
    }
}
?>
