<?php

// get all function list
require_once "function.php" ; 

//　デタベースのコンフィグ
include("const.php");

session_start();

$getid= $_GET["id"];

$functionId = idDb("localhost","root","","legit" , $getid);

$pass=$_POST["password"]??"";
$username=$_POST["username"]??"";
$address=$_POST["region"]??"";
$email=$_POST["email"]??"";
$name=$_POST["name"]??"";


 ///////////////////////////////////////////////////password 

  $number=10;
  function getName($number){
      $characters= '0123456789abcdefghijklmnoprstuvwxyzABCD
      EFGHIJKLMNOPQRSTUVWXYZ';
      $randomString = '';

      for ($i=0; $i < $number ; $i++) { 
          $index = rand(0,strlen($characters) - 1);
          $randomString.= $characters[$index];
      }
      return $randomString;
  }
      $solt=getName($number);//パスワードのソルト
  
      $stretch=rand(10000,100000);//ストレッチの回数
  
      //フォ分岐でハッシュ化されたパスワードを取得します
      if(!empty($pass)){  
      for ($i=0; $i < $stretch ; $i++) { 
      $pass = md5($solt.$pass);
      }
      }

     

      if(isset($_POST["submitpass"])){  

        $arraylist=[$pass,$solt,$stretch,$getid];

        if(strlen($pass)> 0 ){        
        $update = updateDbpass("localhost","root","","legit" ,$arraylist);
        header("location:tpl/doneUpdate.php?id=$getid");

    }
      }


 ///////////////////////////////////////////////////password 



 
 ///////////////////////////////////////////////////username


 if(isset($_POST["submitusername"])){  

    $arraylist=[$username,"username",$getid];

    if(strlen($username)> 0 ){        
    $update = updateDb("localhost","root","","legit" ,$arraylist);
    header("location:tpl/doneUpdate.php?id=$getid");

}
  }


///////////////////////////////////////////////////username


 ///////////////////////////////////////////////////address


 if(isset($_POST["submituseraddress"])){  

    $arraylist=[$address,"address",$getid];

    if(strlen($address)> 0 ){        
    $update = updateDb("localhost","root","","legit" ,$arraylist);
    header("location:tpl/doneUpdate.php?id=$getid");

}
  }


///////////////////////////////////////////////////address


 ///////////////////////////////////////////////////email


 if(isset($_POST["submituseremail"])){  

    $arraylist=[$email,"email",$getid];

    if(strlen($email)> 0 ){        
    $update = updateDb("localhost","root","","legit" ,$arraylist);
    header("location:tpl/doneUpdate.php?id=$getid");

}
  }


///////////////////////////////////////////////////email



 ///////////////////////////////////////////////////name


 if(isset($_POST["submitname"])){  

    $arraylist=[$name,"name",$getid];

    if(strlen($name)> 0 ){        
    $update = updateDb("localhost","root","","legit" ,$arraylist);
    header("location:tpl/doneUpdate.php?id=$getid");

}
  }


///////////////////////////////////////////////////name



 if(isset($_POST["back"])){  

    header("location:profile.php?id=$getid");


}


// get all function list
require_once "tpl/cPass.php" ; 
?>