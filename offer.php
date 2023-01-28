<?php

// get all function list
require_once "function.php" ; 

//　デタベースのコンフィグ
include("const.php");

session_start();

$getid= $_GET["id"];

$functionId = idDb("localhost","root","","legit" , $getid);

$name=$_POST["name"]??"";
$brand=$_POST["brand"]??"";
$url=$_POST["url"]??"";
$desc=$_POST["description"]??"";

$array=[];



//MYSQLからのデータを取得
foreach ($functionId as  $value)
{
       $newarray=[];
       
       $newarray= $value ; 
}

if(isset($_POST["post"])){  


    $id=$_GET['id'];



    if(!empty($_FILES["fileOne"]["name"]) && !empty($_FILES["fileTwo"]["name"])&& !empty($_FILES["fileThree"]["name"])&& !empty($_FILES["fileFour"]["name"]) ) {    

        $array=array($_FILES["fileOne"] , $_FILES["fileTwo"] , $_FILES["fileThree"] , $_FILES["fileFour"] );
    
        imageUpload($array,$id,$name,$url, $brand , $desc  ); 
           
    
    }
    
    
      else if(!empty($_FILES["fileOne"]["name"]) && !empty($_FILES["fileTwo"]["name"])&& !empty($_FILES["fileThree"]["name"]) ) {    
    
          $array=array($_FILES["fileOne"] , $_FILES["fileTwo"] , $_FILES["fileThree"] );
    
          imageUpload($array,$id,$name,$url, $brand , $desc  ); 
    
    
      }    
      else if(!empty($_FILES["fileOne"]["name"]) && !empty($_FILES["fileTwo"]["name"] ) ) {    
    
          $array=array($_FILES["fileOne"] , $_FILES["fileTwo"]);
    
          imageUpload($array,$id,$name,$url, $brand , $desc  ); 
    
      
      }
      else if(!empty($_FILES["fileOne"]["name"])){
    
        imageUpload($_FILES["fileOne"],$id,$name,$url, $brand , $desc  ); 
        
    
    
      }
    
   
    
    //   echo '<script>alert("問い合わせありがとうございました！！")</script>';



    header("location:home.php?id=$id");

    
}


// go back
if(isset($_POST["back"])){
    $id=$_GET['id'];

    echo$id;

    header("location:home.php?id=$id");
}

// get all function list
require_once "tpl/offer.php" ; 
?>