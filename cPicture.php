<?php

// get all function list
require_once "function.php" ; 

//　デタベースのコンフィグ
include("const.php");

session_start();

$getid= $_GET["id"];

$functionId = idDb("localhost","root","","legit" , $getid);

$conn = returnConn("localhost","root","","legit");

//MYSQLからのデータを取得
foreach ($functionId as  $value)
{
       $newarray=[];
       
       $newarray= $value ; 
}


if(isset($_POST["submitfile"])){  



$filename= $_FILES['images']['name']; //ファイル名



    $exts = pathinfo($filename, PATHINFO_EXTENSION);//拡張子をゲット
      $allowedExts = array("jpg", "JPG"); //オッけー拡張子    
      
  
      //画像が空っぽでない場合
      if (!empty($_FILES['images']['name'])) 
      {
           
      $dirname="userprofile/";//　新パスをセット
      $path = $dirname.$newarray["id"]."/"; //合体
      
    $exts = pathinfo($filename, PATHINFO_EXTENSION);//拡張子をゲット
    $allowedExts = array("jpg", "JPG"); //オッけー拡張子    

  
      //　新フォルダを作成
      if  (!is_dir($path)){
      mkdir($path ,0777,true);
  
      }
  
      $filename =  "img_".$getid.".".$exts;
  
      $target = "\"$path\"".$_FILES['images']['name']; //合体
        
       move_uploaded_file($_FILES['images']['tmp_name'],"$path/{$filename}"); 
       //ファイルを指定したフォルダに保存
   
  
      // SQLの文
  
      $sql = "UPDATE m_user set file_name='"
      . $filename ."'Where id='" . $getid . "'";;
  
  

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
        header("location:tpl/doneUpdate.php?id=$getid");
          exit;
      } 
  
  }
}

if(isset($_POST["back"])){  

    header("location:profile.php?id=$getid");


}

// get all function list
require_once "tpl/cPicture.php" ; 
?>