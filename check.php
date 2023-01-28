<?php

// get all function list
require_once "function.php" ; 

//　デタベースのコンフィグ

include("const.php");

session_start();

    //変数の値はここからです
    $name=$_SESSION["entryName"];
    $login=$_SESSION["loginId"];
    $email=$_SESSION["email"];//メールをゲット
    $pass=$_SESSION["password"];//パスワードをゲット


$connectDb = connectDb("localhost","root","","legit");


//　ログインIDをハッシュ化
$hashId=md5($_SESSION['loginId']);



//　パスワードを再入力メッセージ
$_SESSION["inputPassword"]="PRINT";

//　ジャンプの予防へ

// if (empty($_SESSION['join'])) {
//     header("location:index.php");
//     $_SESSION["inputPassword"]="";
// }

//　セッションの値を変数に格納

$userstate="0";
$filename="";
$address="";

/////////////////////////////////////MYSQLのSANITIZATION/////////////////////////////////////

//パスワードのSTRの長さ

$passwordLength=strlen($pass);

//パスワードを代入する

$passwordDot = str_repeat("🔵", $passwordLength);





///////////////サブミットボタンはここからになります//////////////////////
if(isset($_POST["submit"])){  


    ///////////////ソルトはここからになります//////////////////////
    $number=10;
    function getName($number){
        $characters= '0123456789abcdefghijklmnoprstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i=0; $i < $number ; $i++) { 
            $index = rand(0,strlen($characters) - 1);
            $randomString.= $characters[$index];
        }
        return $randomString;
    }
    getName($number);//関数を呼び出す

        ///////////////ここからパスワードのハッシュ化///////////////////

        $solt=getName($number);//パスワードのソルト
    
        $stretch=rand(10000,100000);//ストレッチの回数
    
        //フォ分岐でハッシュ化されたパスワードを取得します
        if(!empty($pass)){  
        for ($i=0; $i < $stretch ; $i++) { 
        $pass = md5($solt.$pass);
        }
        }

    $arrayList=["name"=>$name ,"email"=> $email ,"login"=> $login ,"pass"=> $pass ,"hashId"=> $hashId , "solt"=>$solt , "stretch"=>$stretch , "userstate"=>$userstate , "filename"=>$filename, "address"=>$address];

    $insertDb = insertDb("localhost","root","","legit",$arrayList);


    $_SESSION["hash"] = $hashId;

    //  メールの送信ですがエラー

    // sendMail($connectDb ,$_SESSION["hash"]);

    //  登録完了へ
    header("location:done.php");

    exit ;

}

if(isset($_POST["submitback"])){  
    header("location:index.php");
}

// HTMLへの要求
require_once "tpl/check.php" ; 

?>