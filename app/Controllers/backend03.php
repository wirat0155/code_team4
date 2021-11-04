<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class backend03 extends Controller{
    public function index()
    {
        //$myArray = array(10,1,6,8,5);
        $myArray = array(3,8,5,2);

        // Coding back-end 03 here!!!! 

        //62160323 นายกิตติพศ รุ่งเรือง
        echo "MyArray Value  : ";
        foreach($myArray as $value){
            echo $value . ' ';
        }

        echo '<br>';

        $ExArray = array(2,3,4,5,6,7,8); 

        for($i=0;$i<count($myArray);$i++){
            $index = array_search($myArray[$i], $ExArray);
            unset($ExArray[$index]);
        }
        
        echo "Expected Value : ";
        foreach($ExArray as $value){
            echo $value . ' ';
        }

        // Coding back-end 03 here!!!! 
    }
}
?>
