<?php

// get all function list
require_once "function.php" ; 

//　デタベースのコンフィグ
include("const.php");


session_start();

//　変数の値  
$hashId=$_GET["hashid"];

$_SESSION["hash"] = $_GET["hashid"];;

$userState ="1";

$hashDb = hashDb("localhost","root","","legit",$hashId);

$conn = returnConn("localhost","root","","legit");

//MYSQLからのデータを取得
foreach ($hashDb as  $value)
{
       $newarray=[];
       
       $newarray= $value ; 
}


//　ジャンプの予防
// if (empty($_GET["hashid"]))
// {
//     header("location:register.php");
// }



///////////////サブミットボタンはここからになります//////////////////////
if(isset($_POST["submitOne"])){    

$address=$_POST["countries"];
   
$filename= $_FILES['image']['name']; //ファイル名


  // もし画像が空っぽの場合
  if (empty($filename)) 
  {
    $noimage="画像を入れてください！";
  }else{
   
    $exts = pathinfo($filename, PATHINFO_EXTENSION);//拡張子をゲット
    $allowedExts = array("jpg", "JPG"); //オッけー拡張子    


    if (!in_array($exts , $allowedExts)) {  
        $wrongExt="アップロード可能形式はJPGのみとなります";
    }
  
  }

   // もしパスワードが空っぽの場合
   if (empty($_POST['password'])) 
   {
    $emptyPassword="必項目です"; 
   }
   else{
    {
        $getpass=$_POST["password"];
   }

       //データベースの値を処理
       foreach($hashDb as $value){

        $userId =$value["id"];
      
      //フォ分岐でハッシュ化されたパスワードを取得します
      for ($i=0; $i < $value["stretch"] ; $i++) { 
        $getpass = md5($value["salt"].$getpass);
        }

        if($getpass != $value["password"] ) {
            $wrongPassword="入力されたパスワードが間違っています";        
          }
      

    //画像が空っぽでない場合
    if (!empty($_FILES['image']['name'])) 
    {
     
  //もし拡張子がオッけであれば
  if (empty($wrongExt) && $getpass == $value["password"] ) {  

    
    $dirname="userprofile/";//　新パスをセット
    $path = $dirname.$newarray["id"]."/"; //合体

    //　新フォルダを作成
    if  (!is_dir($path)){
    mkdir($path ,0777,true);

    }

    $filename =  "img_".$userId.".".$exts;

    $target = "\"$path\"".$_FILES['image']['name']; //合体
      
     move_uploaded_file($_FILES['image']['tmp_name'],"$path/{$filename}"); //ファイルを指定したフォルダに保存
 

    // SQLの文

    $sql = "UPDATE m_user set user_state='" .$userState. "', file_name='"
    . $filename ."', address='"
    . $address ."'
   Where hash_login_id='" . $hashId . "'";;

  $chatArray=[$value["id"] , $value["login_id"] , $value["password"] , $filename  ];

   insertChat("localhost","root","","legit" , $chatArray);

   //////////////////////////////////サムネイル画像を登録はここからになります////////////////////////////////////////////

   $img_size = getimagesize($path.$filename);//画像のサイズを取得
   $height=$img_size[1];//画像の高さ
   $width=$img_size[0];//画像の幅
 
    //比率を取得

    $widthratio=  $width / 60;
    $heightratio= $height/ 70;

    if ($height <= 70) {
   //新しい幅と高さ
    $newHeight = $height ;
    }

    if ($width <= 60) {
     //新しい幅と高さ
    $newWidth = $width ;
    }

    if($width >= $height){//幅の方が大きい時
    //新しい幅と高さ
    $newWidth = $width / $widthratio; 
    $totalratio = $newWidth / $width; 
    $newHeight = $height * $totalratio; 

    if ($height < 70) {
    //新しい幅と高さ
    $newHeight = $height ;
    }

    if ($width < 60) {
    //新しい幅と高さ
     $newWidth = $width ;
    }
 
     //高さが基準より大きい
    if ($newHeight > 70) {
 
     $newHeight = $height / $heightratio; 
      $totalratio = $newHeight / $height; 
    $newWidth = $width * $totalratio; 
     }
    }
    else{//幅の方が小さい時

    //新しい幅と高さ
    $newHeight = $height / $heightratio;
    $totalratio = $newHeight / $height;
    $newWidth = $width * $totalratio;

    if ($height < 70) {
    //新しい幅と高さ
      $newHeight = $height ;
    }
    
    if ($width < 60) {
    //新しい幅と高さ 
      $newWidth = $width ;
    }
  //幅が基準より大きい
    if($newWidth > 60)
    {
      $newWidth = $width / $widthratio;
      $totalratio = $newWidth / $width;
      $newHeight = $height * $totalratio;

    }

}
 
     $img_in=imagecreatefromjpeg($path.$filename);//元画像をメモリに生成
 
     $img_out=ImageCreateTruecolor($newWidth, $newHeight);  //背景の黒い新しい画像ファイルを作成(width,height)
 
     ImageCopyResampled($img_out,$img_in,0, 0, 0, 0, $newWidth , 
     $newHeight , $width, $height);
 
     Imagejpeg($img_out,$path.'thumb_'.$filename);
 
     //画像をアップした後に破壊する
     ImageDestroy($img_in);
     ImageDestroy($img_out);
 
 //////////////////////////////////サムネイル画像を登録はここまでになります////////////////////////////////////////////


    // SQLに書き込み
    if(mysqli_query($conn , $sql)){
        header("location:done.php");
        exit;
    } 

}
}
}
}
}
///////////////サブミットボタンはここまでになります//////////////////////



// HTMLへの要求
require_once "tpl/main_regist.php" ; 























?>