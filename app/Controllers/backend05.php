<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class backend05 extends Controller{
    public function index()
    {
        // $rows = 8;  
        $rows = 5;  

        // Coding back-end 05 here!!!! 

        //62160323 นายกิตติพศ รุ่งเรือง
        for($i=0;$i < $rows;$i++){

            $number = $rows; 
            for($j=0;$j < $i;$j++){
                echo '&nbsp;&nbsp;';
                $number--;
            }

            for($k=$j;$k < $rows;$k++){
                if($number % 2 == 0){
                    echo '*';
                }else{
                    echo $number;
                }
                $number--;
            }
            echo '<br>';
        }


        for($i=$rows-2;$i >= 0;$i--){

            $number = $rows; 
            for($j=0;$j < $i;$j++){
                echo '&nbsp;&nbsp;';
                $number--;
            }

            for($k=$j;$k < $rows;$k++){
                if($number % 2 == 0){
                    echo '*';
                }else{
                    echo $number;
                }
                $number--;
            }
            echo '<br>';
        }

        // Coding back-end 05 here!!!! 
    }
}
?>
