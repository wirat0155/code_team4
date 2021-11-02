<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class Example_array extends Controller
{
    public function Show_Arr(){
        $this->Count_arr();
        echo "<hr>";
        $this->Sum_arr();
        echo "<hr>";
        $this->Search_arr();
        echo "<hr>";
        $this->Max_arr();
        echo "<hr>";
        $this->Min_arr();
        echo "<hr>";
        $this->Print_arr();
        echo "<hr>";
        $this->Sort_arr();
        echo "<hr>";
        $this->DesSort_arr();
        echo "<hr>";
        $this->ValueSort_arr();
        echo "<hr>";
        $this->KeySort_arr();
        echo "<hr>";
        
    }

    // นับจำนวน Array
    public function Count_arr(){
        echo "<h3> 1. Count Array นับจำนวน Array <br> </h3>";
        echo "&nbsp; &nbsp"; 

        $numbers = array(0,1,2,3,4,5,6,7);

        echo "$ numbers = array(0,1,2,3,4,5,6,7) <br>";
        echo "&nbsp; &nbsp"; 
        echo "count($ numbers) = ";
        echo count($numbers);
        
    }

    // ผลรวมใน Array
    public function Sum_arr(){
        echo "<h3> 2. Sum Array ผลรวมใน Array <br> </h3>";
        echo "&nbsp; &nbsp"; 

        $numbers = array(0,1,2,3,4,5,6,7);

        echo "$ numbers = array(0,1,2,3,4,5,6,7) <br>";
        echo "&nbsp; &nbsp"; 
        echo "array_sum($ numbers) = ";
        echo array_sum($numbers);
        
    }

    // หาค่ามากสุดใน Array
    public function Max_arr(){
        echo "<h3> 3. Max Array หาค่ามากสุดใน Array <br> </h3>";
        echo "&nbsp; &nbsp"; 

        $numbers = array(51,42,62,47,35,54,56,50);

        echo "$ numbers = array(51,42,62,47,35,54,56,50) <br>";
        echo "&nbsp; &nbsp"; 
        echo "max($ numbers) = ";
        echo max($numbers);
        
    }

    // หาค่าน้อยสุดใน Array
    public function Min_arr(){
        echo "<h3> 4. Min Array หาค่าน้อยสุดใน Array <br> </h3>";
        echo "&nbsp; &nbsp"; 

        $numbers = array(51,42,62,47,35,54,56,50);

        echo "$ numbers = array(51,42,62,47,35,54,56,50) <br>";
        echo "&nbsp; &nbsp"; 
        echo "min($ numbers) = ";
        echo min($numbers);
        
    }

    // ค้นหาตำแหน่งใน Array
    public function Search_arr(){
        echo "<h3> 5. Search Array ค้นหาตำแหน่งใน Array เช่น ค้นหา 5 <br> </h3>";
        echo "&nbsp; &nbsp"; 

        $numbers = array(7,2,1,4,5,8,3);

        echo "$ numbers = array(7,2,1,4,5,8,3) <br>";
        echo "&nbsp; &nbsp"; 
        echo "array_search(5, $ numbers) = 5 อยู่ใน Index ที่ ";
        echo array_search(5, $numbers);
        
    }

    // แสดงข้อมูล Array
    public function Print_arr(){
        echo "<h3> 6. Show Array แสดงข้อมูล Array ดูใน Code <br> </h3>";
        echo "&nbsp; &nbsp"; 

        $numbers = array(0,1,2,3,4,5,6,7);

        echo "$ numbers = array(0,1,2,3,4,5,6,7) <br>";
        echo "&nbsp; &nbsp";
        echo "For Loop : "; 

        for($i = 0; $i < count($numbers); $i++){
            echo $numbers[$i] . ' ';
        }



        echo "<br> &nbsp; &nbsp;หรือ <br>"; 
        echo "&nbsp; &nbsp"; 
        echo "Foreach : ";

        //แสดงข้อมูล Array
        foreach ($numbers as $value)
        {
            echo $value . ' ';
        }
        
    }

    // เรียง Array จากน้อยไปมาก
    public function Sort_arr(){
        echo "<h3> 7. Sorting Array เรียง Array จากน้อยไปมาก <br> </h3>";
        echo "&nbsp; &nbsp"; 

        $numbers = array(7,2,1,4,5,8,3);

        echo "$ numbers = array(7,2,1,4,5,8,3) <br>";
        echo "&nbsp; &nbsp"; 
        echo "sort($ numbers) = ";

        //เรียงข้อมูล
        sort($numbers);

        //แสดงข้อมูล Array
        foreach ($numbers as $value)
        {
            echo $value . ' ';
        }
        
    }

    // เรียง Array จากมากไปน้อย
    public function DesSort_arr(){
        echo "<h3> 8. Des Sorting Array เรียง Array จากมากไปน้อย <br> </h3>";
        echo "&nbsp; &nbsp"; 

        $numbers = array(7,2,1,4,5,8,3);

        echo "$ numbers = array(7,2,1,4,5,8,3) <br>";
        echo "&nbsp; &nbsp"; 
        echo "rsort($ numbers) = ";

        //เรียงข้อมูล
        rsort($numbers);

        //แสดงข้อมูล Array
        foreach ($numbers as $value)
        {
            echo $value . ' ';
        }
        
    }

    // เรียง Array จากน้อยไปมากจาก Value
    public function ValueSort_arr(){
        echo "<h3> 9. Sorting Value Array เรียง Array จากน้อยไปมากจาก Value <br> </h3>";
        echo "&nbsp; &nbsp"; 
        echo "Key = Pee, Value = 20 <br>";

        $People = array("Pee"=>"20","Kui"=>"15","Oat"=>"36");
        
        echo "&nbsp; &nbsp"; 
        echo "$ People = array('Pee'=>'20', 'Kui'=>'15', 'Oat'=>36') <br>";
        echo "&nbsp; &nbsp"; 
        echo "asort($ People) = ";

        //เรียงข้อมูล
        asort($People);

        //แสดงข้อมูล Array
        foreach ($People as $key => $value)
        {
            echo $key . " " .$value . ', ';
        }
        
        echo "<br>";
        echo "&nbsp; &nbsp"; 
        echo "หากเรียงจากมากไปน้อยใช้ arsort";
    }

    // เรียง Array จากมากไปน้อยจาก Key
    public function KeySort_arr(){
        echo "<h3> 10. Sorting Key Array เรียง Array จากมากไปน้อยจาก Key <br> </h3>";
        echo "&nbsp; &nbsp"; 
        echo "Key = Aum, Value = 36 <br>";

        $People = array("Aum"=>"36","Cebra"=>"20","QM"=>"15");
        
        echo "&nbsp; &nbsp"; 
        echo "$ People = array('Aum'=>36', 'Cebra'=>'20', 'QM'=>'15') <br>";
        echo "&nbsp; &nbsp"; 
        echo "krsort($ People) = ";

        //เรียงข้อมูล
        krsort($People);

        //แสดงข้อมูล Array
        foreach ($People as $key => $value)
        {
            echo $key . " " .$value . ', ';
        }

        echo "<br>";
        echo "&nbsp; &nbsp"; 
        echo "หากเรียงจากน้อยไปมากใช้ ksort";
        
    }
    

}
?>