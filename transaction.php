<?php
// get all function list
require_once "function.php" ; 

//　デタベースのコンフィグ
include("const.php");

$_GET["action"]=NULL;

$getid= $_GET["id"];

$getUser = idDb("localhost","root","","legit" , $getid);

$getForm = getForm("localhost","root","","legit" , $getid);

$reqflag=0;

$offflag=0;

$offerList= [];

$requestList=[];


$value =profileDb("localhost","root","","legit" , $getid);


if($reqflag < 1){

}


$color_list = [
    'red' => 'table-danger' , 
    'white' => '' ,
    'blue' => 'table-info' ,
  ];
  
  $reqpage = new Pager($requestList , 5, $_GET['reqpage_num'] ?? 1);



 


  $class = [
    'ul' => 'pagination',
    'li' => ['main' => 'page-item','active' => 'active' , 'disabled' => 'disabled'],
    'a' => 'page-link',
  ];
  
  $offpage = new Pager($offerList , 5, $_GET['offpage_num'] ?? 1);



if(isset($_POST["reqsubmitsearch"])){
 
if (strlen($_POST["reqsearch"]) > 0 ) {
  
 $arraysearch= searchBarReq("localhost","root","","legit" 
 ,$_POST["reqsearch"],$_GET["id"] );

 $reqflag+=1;

 $reqpage = new Pager( $arraysearch , 5, $_GET['reqpage_num'] ?? 1);

}

}


if(isset($_POST["offsubmitsearch"])){
 

  if (strlen($_POST["offsearch"]) > 0 ) {
    
   $arraysearch= searchBarOff("localhost","root","","bridge" 
   ,$_POST["offsearch"] , $_GET["id"] );
  
   $offflag+=1;
  
   $offpage = new Pager( $arraysearch , 5, $_GET['reqpage_num'] ?? 1);
  
  }
  
  }




// go back
if(isset($_POST["back"])){
    $id=$_GET['id'];

    echo$id;

    header("location:profile.php?id=$id");
}




// get all function list
require_once "tpl/transaction.php" ; 
?>