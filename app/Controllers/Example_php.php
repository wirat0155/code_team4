<?php
namespace App\Controllers;
use CodeIgniter\Controller;

class Example_php extends Controller
{
    public function Show_Str(){
        $this->Count_Str();
        echo "<hr>";
        $this->Count_Word_Str();
        echo "<hr>";
        $this->Position_Str();
        echo "<hr>";
        $this->Reverse_Str();
        echo "<hr>";
        $this->Uppercase_Str();
        echo "<hr>";
        $this->Lowercase_Str();
        echo "<hr>";
        $this->Replace_Str();
        echo "<hr>";
        $this->Sub_Str();
        echo "<hr>";
        $this->SubName_Str();
        echo "<hr>";
    }

    // นับจำนวน String
    public function Count_Str(){
        echo "<h3> 1. Count String นับจำนวน String <br> </h3>";
        echo "&nbsp; &nbsp"; 
        echo "strlen('Hello') = ";
        //นับจำนวน String
        echo strlen("Hello");
        
    }

    // นับคำใน String
    public function Count_Word_Str(){
        echo "<h3> 2. Count Word in String นับคำใน String <br> </h3>";
        echo "&nbsp; &nbsp"; 
        echo "str_word_count('Hello') = ";
        // นับคำใน String
        echo str_word_count("Hello");
        echo "<br>";
        echo "&nbsp; &nbsp"; 
        echo "str_word_count('Hello World') = ";
        // นับคำใน String
        echo str_word_count("Hello World");
        
    }

    // หาตำแหน่งของคำใน String
    public function Position_Str(){
        echo "<h3> 3. Position String หาตำแหน่งของคำ เช่น world อยู่ Index เท่าไร ใน Hello world <br> </h3>";
        echo "&nbsp; &nbsp"; 
        echo "strpos('Hello world!', 'world') = ";
        // หาตำแหน่งของคำใน String
        echo strpos("Hello world!", "world");
        
    }

    // กลับ String
    public function Reverse_Str(){
        echo "<h3> 4. Reverse String กลับ String <br> </h3>";
        echo "&nbsp; &nbsp"; 
        echo "strrev('Hello') = ";
        // กลับ String
        echo strrev("Hello");
        
    }

    // พิมพ์ใหญ่ทั้งหมด
    public function Uppercase_Str(){
        echo "<h3> 5. Upper String พิมพ์ใหญ่ทั้งหมด <br> </h3>";
        echo "&nbsp; &nbsp"; 
        echo "strtoupper('Hello') = ";
        // พิมพ์ใหญ่ทั้งหมด
        echo strtoupper("Hello");
        
    }

    // พิมพ์เล็กทั้งหมด
    public function Lowercase_Str(){
        echo "<h3> 6. Lower String พิมพ์เล็กทั้งหมด <br> </h3>";
        echo "&nbsp; &nbsp"; 
        echo "strtolower('Hello') = ";
        // พิมพ์เล็กทั้งหมด
        echo strtolower("Hello");
        
    }

    // เปลี่ยนคำ หรือ ตัวอักษร
    public function Replace_Str(){
        echo "<h3> 7. Lower String เปลี่ยนคำ หรือ ตัวอักษร เช่น เปลี่ยน l เป็น m ใน Hello <br> </h3>";
        echo "&nbsp; &nbsp"; 
        echo "str_replace('l','m','Hello') = ";
        // เปลี่ยนคำ หรือ ตัวอักษร
        echo str_replace("l","m","Hello");
    }

    // ตัด String
    public function Sub_Str(){
        echo "<h3> 9. Sub String ตัด String <br> </h3>";
        echo "&nbsp; &nbsp"; 
        echo "เอาตั้งแต่ตำแหน่งที่ 10 substr('Hello world',10) : ";
        echo substr("Hello world",10)."<br>";

        echo "&nbsp; &nbsp"; 
        echo "เอาตั้งแต่ตำแหน่งที่ 1 substr('Hello world',1): ";
        echo substr("Hello world",1)."<br>";

        echo "&nbsp; &nbsp"; 
        echo "เอา 1 ตัวท้าย substr('Hello world',-1): ";
        echo substr("Hello world",-1)."<br>";

        echo "&nbsp; &nbsp"; 
        echo "เอา 9 ตัวท้าย substr('Hello world',-9): ";
        echo substr("Hello world",-9)."<br><br>";

        echo "&nbsp; &nbsp"; 
        echo "เอาตั้งแต่ตำแหน่งที่ 0 จำนวน 10 ตัว substr('Hello world',0,10): ";
        echo substr("Hello world",0,10)."<br>";

        echo "&nbsp; &nbsp"; 
        echo "เอาตั้งแต่ตำแหน่งที่ 6 จำนวน 6 ตัว substr('Hello world',6,6): ";
        echo substr("Hello world",6,6)."<br>";

        echo "&nbsp; &nbsp"; 
        echo "เอาตั้งแต่ตำแหน่งที่ 0 และไม่เอา 6 ตัวท้าย substr('Hello world',0,-6): ";
        echo substr("Hello world",0,-6)."<br>";
    }

    // ตัดชื่อ String
    public function SubName_Str(){
        echo "<h3> 10. Sub Name String ตัดชื่อ String ดูใน Code <br> </h3>";
        $name = "John Kung Smith";

        //แยกคำเก็บ Array เป็น $parts = array('John', 'Kung', 'Smith')
        $parts = explode(' ', $name);

        $firstname = $parts[0];

        $midname = $parts[1];

        $lastname = $parts[2];

        echo "&nbsp; &nbsp"; 
        echo "แยก String <br>";

        echo "&nbsp; &nbsp"; 
        echo "Full Name : John Kung Smith <br>";

        echo "&nbsp; &nbsp"; 
        echo "First Name : " . $firstname . "<br>";

        echo "&nbsp; &nbsp"; 
        echo "Mid Name : " . $midname . "<br>";

        echo "&nbsp; &nbsp"; 
        echo "Last Name : " . $lastname . "<br><br>";

        echo "&nbsp; &nbsp"; 
        echo "ชื่อจริงตัวแรกตามด้วย . เว้นวรรคตามด้วย นามสกุล <br>";
        echo "&nbsp; &nbsp"; 
        echo $firstname[0]. ". " . $lastname . "<br><br>";


        echo "&nbsp; &nbsp"; 
        echo "ชื่อจริงตามด้วย เว้นวรรคตามด้วย ชื่อกลาง ตามด้วย . เว้นวรรคตามด้วยนามสกุล <br>";
        echo "&nbsp; &nbsp"; 
        echo $firstname . " " . $midname[0]. ". " . $lastname . "<br><br>";
        
    }

}
?>