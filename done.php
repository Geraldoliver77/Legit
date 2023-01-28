<?php

// get all function list
require_once "function.php" ; 


//　デタベースのコンフィグ

include("const.php");

session_start();

$hashId = $_SESSION["hash"];//IDをゲットする

$hashDb = hashDb("localhost","root","","legit",$hashId);

$url = "";

$base = BASE_URL."/main_regist.php?hashid=";//URLのリンクを合体する

$_SESSION["check"]="exist";//　ジャンプの予防

//　本登録完了   
if (empty($hashId)) {
    header("location:register.php");
  
}

$link=$base.$hashId;



//　ユーザの登録状態を確保する    
foreach ($hashDb as  $value)
{
    //　本登録未完了   
    if ($value["user_state"]  == "0") {
        
        // send the email
        $mail=$value["mail"];          
        sendMail($mail,$link);
        
        $text="<h3>ご登録いただき誠にありがとうございました。
        <br>                 
        メールに詳細を送りいたしました</h3>";

    }    
    //　本登録完了   
    elseif ($value["user_state"]  == "1") {
       $text="<h3>登録が完了いたしました！</h3>";
       $login='  <input type="submit"  name="submitOne" class="submit" 
       value="LOGIN">';
    }




}

///////////////サブミットボタンはここからになります//////////////////////
if(isset($_POST["submitOne"])){    

    header("location:index.php");

}



///////////////サブミットボタンはここまでになります//////////////////////

// HTMLへの要求
require_once "tpl/done.php" ; 
?>