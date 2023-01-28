<?php

// get all function list
require_once "function.php" ; 

//　デタベースのコンフィグ
include("const.php");

session_start();

// session_destroy();

$connectDb = connectDb(HOST,USER_ID,PASSWORD,DB_NAME);

// session_destroy();

if (!empty($_SESSION["check"]) ) {
    session_destroy();
}


//　パスワードの再入力のメッセージ
if (!empty($_SESSION["inputPassword"])){
    $_SESSION["inputPassword"]="パスワードを再入力をしてください";
}else{
    $_SESSION["inputPassword"]="";
}

///////////////サブミットボタンはここからになります//////////////////////
if(isset($_POST["submitregister"])){  
    

    //変数の値はここからです
    $name=$_POST["entryName"];
    $loginid=$_POST["loginId"];
    $email=$_POST["email"];//メールをゲット
    $pass=$_POST["password"];//パスワードをゲット

    //セッションに値を入力
    $_SESSION["entryName"]=$_POST["entryName"];
    $_SESSION["loginId"]=$_POST["loginId"];
    $_SESSION["password"]=$_POST["password"];
    $_SESSION["email"]=$_POST["email"];

    //エラーを格納する配列
    $errorArray = [];
   
    ///////////////ここまでパスワードのハッシュ化///////////////////

    // ログインIDが空っぽの場合
    if (empty($loginid)) {
        $emptyLogin="必項目です";
        $errorArray [] = $emptyLogin ;
    }
    // 名前が空っぽの場合
    if (empty($name)) {
        $emptyName="必項目です";
        $errorArray [] = $emptyName ;
    }
    // パスワードが空っぽの場合
    if (empty($pass)) {        
        if (!empty($_SESSION["Password"])) {
            $emptyPass=$_SESSION["Password"];    
        }else{
            $emptyPass="必項目です";   
            $_SESSION["inputPassword"]="";     
        }        
        $errorArray [] = $emptyPass ;
    }

    // メールの妥当性チェック
    if(!preg_match
    ("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)){
        $errorMail="＠マークが必須です";
        $errorArray [] = $errorMail ;
   }
 
    // メールが空っぽ場合
    if (empty($email)) {
        $errorMail="";
        $emptyMail="必項目です";
        $errorArray [] = $emptyMail ;
    }
  

    // 同じログインIDを予防
    foreach ($connectDb as $value) {
        if ($loginid == $value["login_id"]) {
         
            $errorId="登録されたログインIDは存在します";
            $errorArray [] = $errorId ;
            
        }
        if ($email == $value["mail"]) {
          
            $errorMail="登録されたメールは存在します";
            $errorArray [] = $errorMail ;
            
        }
    }

    
    // エラーが無い限りチェックへ
    if (empty($errorArray)) {
        $_SESSION['join'] = $_POST;   

      header("location:check.php");

      exit;
      
    }
    
}

///////////////サブミットボタンはここからになります//////////////////////
if(isset($_POST["submitlogin"])){  

     //　IDとパスワードをゲットする  
     $getid=$_POST["nameLogin"]??"";
     $getpass=$_POST["passLogin"]??"";
     
  //ログインの処理
  foreach($connectDb as $value){

      //ログインIDが間違っている場合
      if ($getid != $value["login_id"]) {
        $error="入力されたパスワード又はログインIDが間違っています";
         
      }

      if ($getid == $value["login_id"]) {
        
        //フォ分岐でハッシュ化されたパスワードを取得します
        for ($i=0; $i < $value["stretch"] ; $i++) { 
        $getpass = md5($value["salt"].$getpass);
        }

      //パスワードがオッケーであれば
      if ($getpass == $value["password"]) {
          $_SESSION["userId"]=$value["id"];

          $id = $_SESSION["userId"] ;

          header("location:home.php?id=$id");
      }
      elseif ($getpass != $value["password"] ) {
        $error="入力されたパスワード又はログインIDが間違っています";
    }
  
      }      
    }


}



// get all function list
require_once "tpl/index.php" ; 

?>