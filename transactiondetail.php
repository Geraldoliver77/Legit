<?php

// get all function list
require_once "function.php" ; 

//　デタベースのコンフィグ
include("const.php");

session_start();

$getid= $_GET["id"];
$getpostid=$_GET["postid"];

$idcombine=$getid.",".$getpostid;

$functionId = idDb("localhost","root","","legit" , $getid);

$value =postDb("localhost","root","","legit" , $getpostid);

$functionComment = getComment("localhost","root","","legit" , $getpostid);


$commentArray =[$getpostid ,$_GET["id"]??"", $functionId[0]["name"] , $_POST["comments"]??""];


if(isset($_POST["back"])){
    $id=$_GET['id'];

    echo$id;

    header("location:transaction.php?id=$id");
}

if(isset($_POST["sendcomments"])){

    if(strlen($_POST["comments"]) > 0 ){
        $insertcomment = insertComment("localhost","root","","legit" , $commentArray);        
         header("location:transactiondetail.php?id=$getid&&postid=$getpostid");
      
    }

}

// go back
if(isset($_POST["delete"])){


    header("location:checktransaction.php?id=$idcombine&&action=delete");
}

// go back
if(isset($_POST["update"])){


    header("location:checktransaction.php?id=$idcombine&&action=update");
}


// get all function list
require_once "tpl/transactiondetail.php" ; 
?>