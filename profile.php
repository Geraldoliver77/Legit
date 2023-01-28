<?php

session_start();



// view transactions
if(isset($_POST["transactions"])){

    $id=$_GET['id'];

    header("location:transaction.php?id=$id");
}

// change password
if(isset($_POST["name"])){

    $id=$_GET['id'];

    header("location:cPass.php?id=$id&&change=name");
}

// change password
if(isset($_POST["email"])){

    $id=$_GET['id'];

    header("location:cPass.php?id=$id&&change=email");
}

// change password
if(isset($_POST["address"])){

    $id=$_GET['id'];

    header("location:cPass.php?id=$id&&change=region");
}

// change username
if(isset($_POST["username"])){

    $id=$_GET['id'];

    header("location:cPass.php?id=$id&&change=username");
}

// change password
if(isset($_POST["cPassword"])){

    $id=$_GET['id'];


    header("location:cPass.php?id=$id&&change=pass");
}


// go back
if(isset($_POST["back"])){
    $id=$_GET['id'];

    echo$id;

    header("location:home.php?id=$id");
}


// sign out

if(isset($_POST["signout"])){
    
    header("location:index.php");
}

// get all function list
require_once "tpl/profile.php" ; 
?>