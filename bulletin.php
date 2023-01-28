<?php

// get all function list 
require_once "function.php" ; 

//　デタベースのコンフィグ
include("const.php");


$getid= $_GET["id"];

$getUser = idDb("localhost","root","","legit" , $getid);

$value = getAllForm("localhost","root","","legit" );

$reqflag=0;

$offflag=0;

session_start();

$_SESSION['userid'] = $_GET["id"];


$image= [];










$color_list = [
    'red' => 'table-danger' , 
    'white' => '' ,
    'blue' => 'table-info' ,
  ];
  
  $reqpage = new Pager($value , 5, $_GET['reqpage_num'] ?? 1);
  $class = [
    'ul' => 'pagination',
    'li' => ['main' => 'page-item','active' => 'active' , 'disabled' => 'disabled'],
    'a' => 'page-link',
  ];
  

  if(isset($_POST["reqsubmitsearch"])){
 
    if (strlen($_POST["reqsearch"]) > 0 ) {
      
     $arraysearch= searchBarReqBulletin("localhost","root","","legit" 
     ,$_POST["reqsearch"] );
    
     $reqflag+=1;
    

    
    }
    
    }
    












// go back
if(isset($_POST["back"])){
    $id=$_GET['id'];

    echo$id;

    header("location:home.php?id=$id");
}

// get all function list
require_once "tpl/bulletin.php" ; 

?>