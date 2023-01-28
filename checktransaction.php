<?php
// get all function list
require_once "function.php" ; 

//　デタベースのコンフィグ
include("const.php");

session_start();

$update="update";
$updatename="update";

$getcombineid= $_GET["id"];

$action = $_GET["action"];

$idarray = explode(",",$getcombineid);

$id =$idarray[0];
$postid = $idarray[1];

$title=$_POST["title"]??NULL;
$type =$_POST["type"]??NULL;
$category=$_POST["category"]??NULL;
$description=$_POST["description"]??NULL;

$updatearray=[$title,$type,$description,$category];

$functionId = idDb("localhost","root","","legit" , $id);

$functionPost =postDb("localhost","root","","legit" , $postid);

if ($type == "CHOOSE A TYPE") {
    echo"a";
    $type = $functionPost[0]["type"];
    echo$type;
}

if($category == "CHOOSE A CATEGORY"){
    $category = $functionPost[0]["category"];
}

if(strlen($description) < 1){
    $description = $functionPost[0]["description"]??"";
}


// go back
if(isset($_POST["delete"])){

    deleteDb("localhost","root","","legit" , $postid);

        
    header("location:tpl/doneupdate.php?id=$id");
}

// go back
if(isset($_POST["update"])){

    
    if(strlen($title) > 0  ){            
      
        
    $updateform = updateformDb("localhost","root","","legit" ,$updatearray, $postid);
    $update ="confirm";
    $updatename="confirm";
}

}

if(isset($_POST["confirm"])){
            
    header("location:tpl/doneupdate.php?id=$id");
}


if(isset($_POST["submitback"])){        

    header("location:transaction.php?id=$id");
}

// get all function list
require_once "tpl/checktransaction.php" ; 
?>