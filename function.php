<?php


// // PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\Exception;

// Base files 
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

/////////////////// list of function for user


// get all data from user database
function connectDb($host,$userId,$password,$dbName){

    // コネクションを入れる
    $conn = mysqli_connect( $host , $userId , $password , $dbName );

    // ＳＱＬ文
    $sqls = "SELECT * FROM m_user  ";

    //　ＳＱＬ文と結果
    $result = mysqli_query($conn,$sqls);

    //　結果は配列にかくのう
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);

    //　データベースにあるデータの数
    $number = mysqli_num_rows($result);

    return $data;

    
}

// get all data from post database
function connectDbPost($host,$userId,$password,$dbName){

    // コネクションを入れる
    $conn = mysqli_connect( $host , $userId , $password , $dbName );

    // ＳＱＬ文
    $sqls = "SELECT * FROM m_post  ";

    //　ＳＱＬ文と結果
    $result = mysqli_query($conn,$sqls);

    //　結果は配列にかくのう
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);

    //　データベースにあるデータの数
    $number = mysqli_num_rows($result);

    return $data;

    
}

// get all data from user database
function getComment($host,$userId,$password,$dbName , $id){

    // コネクションを入れる
    $conn = mysqli_connect( $host , $userId , $password , $dbName );

    // ＳＱＬ文
    $sqls = "SELECT * FROM m_comments where postid = $id  ";

    //　ＳＱＬ文と結果
    $result = mysqli_query($conn,$sqls);

    //　結果は配列にかくのう
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);

    //　データベースにあるデータの数
    $number = mysqli_num_rows($result);

    return $data;

    
}



// get all data from user database
function getCommentatorId($host,$userId,$password,$dbName , $name){

  // コネクションを入れる
  $conn = mysqli_connect( $host , $userId , $password , $dbName );

  // ＳＱＬ文
  $sqls = "SELECT * FROM m_user where name = $name  ";

  //　ＳＱＬ文と結果
  $result = mysqli_query($conn,$sqls);

  //　結果は配列にかくのう
  $data = mysqli_fetch_all($result,MYSQLI_ASSOC);

  //　データベースにあるデータの数
  $number = mysqli_num_rows($result);

  return $data;

  
}

// insert data to user database
function insertDb($host,$userId,$password,$dbName , $array){

    $zero=NULL;

       // コネクションを入れる
       $conn = mysqli_connect( $host , $userId , $password , $dbName );
     // インサート文
    $sql = 
    "INSERT INTO m_user (name , mail , login_id , password , hash_login_id , salt , stretch , user_state , file_name , address ) 

    VALUES('". $array["name"] ."' , '" . $array["email"]. "', '" . $array["login"]. "', '" . $array["pass"]. "', '" . $array["hashId"]. "', '" . $array["solt"]. "', '" 
    . $array["stretch"]. "', '" . $array["userstate"]. "', '" .$array["filename"]. "', '" . $array["address"]. "' )";

    //　結果と文書
    $results = mysqli_query($conn,$sql);

    return $results;
    
}

// insert data to user database
function insertChat($host,$userId,$password,$dbName , $array){

    $zero=NULL;

       // コネクションを入れる
       $conn = mysqli_connect( $host , $userId , $password , $dbName );
     // インサート文
    $sql = 
    "INSERT INTO chat_users (userid , username , password , avatar , current_session , online  ) 

    VALUES('". $array[0] ."' , '" . $array[1]. "', '" . $array[1]. "', '" .$array[3]. "', '" . $zero. "', '" . $zero. "' )";

    //　結果と文書
    $results = mysqli_query($conn,$sql);

    return $results;
    
}

// insert data to user database
function insertPost($host,$userId,$password,$dbName , $array){

    $zero=NULL;

       // コネクションを入れる
       $conn = mysqli_connect( $host , $userId , $password , $dbName );
     // インサート文
    $sql = 
    "INSERT INTO m_form (title , userid , type , description , category , likes , comments  ) 

    VALUES('". $array[0] ."' , '" . $array[1]. "', '" . $array[2]. "', '" . $array[3]. "', '" . $array[4]. "', '" . $zero. "', '" 
    . $zero. "')";

    //　結果と文書
    $results = mysqli_query($conn,$sql);

    return $results;
    
}

// insert data to user database
function insertComment($host,$userId,$password,$dbName , $array){


     // コネクションを入れる
     $conn = mysqli_connect( $host , $userId , $password , $dbName );
   // インサート文
  $sql = 
  "INSERT INTO m_comments (postid , commentatorid , commentator , message , verify ) 

  VALUES('". $array[0] ."' , '". $array[1] ."' ,'" . $array[2]. "', '" . $array[3]. "', '" . $array[4]. "')";

  //　結果と文書
  $results = mysqli_query($conn,$sql);

  return $results;
  
}


// get hash id data from user database
function idDb($host,$userId,$password,$dbName , $id){

    // コネクションを入れる
    $conn = mysqli_connect( $host , $userId , $password , $dbName );

    // ＳＱＬ文
    $sqls ="SELECT * FROM m_user WHERE id='" . $id . "'";

    //　ＳＱＬ文と結果
    $result = mysqli_query($conn,$sqls);

    //　結果は配列にかくのう
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);

    //　データベースにあるデータの数
    $number = mysqli_num_rows($result);

    return $data ;
    
}



function postDb($host,$userId,$password,$dbName , $id){

  // コネクションを入れる
  $conn = mysqli_connect( $host , $userId , $password , $dbName );

  // ＳＱＬ文
  $sqls ="SELECT * FROM m_task WHERE id='" . $id . "'";

  //　ＳＱＬ文と結果
  $result = mysqli_query($conn,$sqls);

  //　結果は配列にかくのう
  $data = mysqli_fetch_all($result,MYSQLI_ASSOC);

  //　データベースにあるデータの数
  $number = mysqli_num_rows($result);

  return $data ;
  
}

function profileDb($host,$userId,$password,$dbName , $id){

  // コネクションを入れる
  $conn = mysqli_connect( $host , $userId , $password , $dbName );

  // ＳＱＬ文
  $sqls ="SELECT * FROM m_task WHERE userid='" . $id . "'";

  //　ＳＱＬ文と結果
  $result = mysqli_query($conn,$sqls);

  //　結果は配列にかくのう
  $data = mysqli_fetch_all($result,MYSQLI_ASSOC);

  //　データベースにあるデータの数
  $number = mysqli_num_rows($result);

  return $data ;
  
}


function deleteDb($host,$userId,$password,$dbName , $id){

  // コネクションを入れる
  $conn = mysqli_connect( $host , $userId , $password , $dbName );

  // ＳＱＬ文
  $sqls ="DELETE FROM m_task WHERE id='".$id."'";

  //　ＳＱＬ文と結果
  $result = mysqli_query($conn,$sqls);

  return $result;
  
}


// get hash id data from user database
function hashDb($host,$userId,$password,$dbName , $hash){

    // コネクションを入れる
    $conn = mysqli_connect( $host , $userId , $password , $dbName );

    // ＳＱＬ文
    $sqls ="SELECT * FROM m_user WHERE hash_login_id='" . $hash . "'";

    //　ＳＱＬ文と結果
    $result = mysqli_query($conn,$sqls);

    //　結果は配列にかくのう
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);

    //　データベースにあるデータの数
    $number = mysqli_num_rows($result);

    return $data ;
    
}

function returnConn($host,$userId,$password,$dbName ){
       // コネクションを入れる
       $conn = mysqli_connect( $host , $userId , $password , $dbName );

       return $conn;
}

//　メールを送信するの関数
function sendMail($Mail,$url){

    $Correo = new PHPMailer();
    $Correo->IsSMTP();
    $Correo->SMTPAuth = true;
    $Correo->SMTPSecure = "tls";
    $Correo->Host = "smtp.gmail.com";
    $Correo->Port = 587;
    $Correo->Username = "geraldoliver77@gmail.com";
    $Correo->Password = "friojzkizwjjuyro";
    $Correo->SetFrom('foo@gmail.com','De Yo');
    $Correo->FromName = "From";
    $Correo->AddAddress($Mail);
    $Correo->Subject = "From=> ".$Mail;
    $Correo->Body ="Thank You for the registration !! The last step is to ";
    $Correo->Body ="Thank You for the registration !! in order to complete the registration
     The last step is to click this link below => <br> "."<a href=".$url.">.".$url."<a>";
    $Correo->IsHTML (true);

    if (!$Correo->Send())
    {
      echo "Error: $Correo->ErrorInfo";
    }
    else
    {
  
    }
    
    }




// get all prefecture data 

function getCountries(){

    $countries = array("Afghanistan", "Albania", "Algeria", "
    American Samoa", "Andorra", "Angola", "Anguilla", "Antar
    ctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba"
    , "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "
    Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "
    Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana",
     "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei
      Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Ca
      meroon", "Canada", "Cape Verde", "Cayman Islands", "Central African
       Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Ke
       eling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democrati
       c Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", 
       "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark"
       , "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuad
       or", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", 
       "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", 
       "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories",
        "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", 
        "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands"
    , "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Region");

    return $countries;


}


function getTypee(){

    $type = array("REQUEST", "OFFER");

    return $type;


}


function getCategories(){

    $category = array("Bag","Wallet","Shoes","Videos","Programming","Gaming",
    "News","History","KPOP","FASHION","SPORTS","SLICE OF LIFE","ENTERTAINMENT");
    
    return $category;


}


function searchBarOff($host,$userId,$password,$dbName,$searchName , $id ){

    // コネクションを入れる

    $connect = mysqli_connect( $host , $userId , $password , $dbName );

    // ＳＱＬ文
    $sqls = "SELECT * FROM m_form WHERE ";

    //　キーワードを配列に格納
    $keywords= explode(" " , $searchName);

    // SQL文のLIKEを入れる
    foreach($keywords as $word){

	$sqls .= " description LIKE '%".$word."%' AND TYPE LIKE 'OFFER' HAVING userid = $id ";

	}

    //　ＳＱＬ文と結果
    $result = mysqli_query($connect,$sqls);

    //　結果は配列にかくのう
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);

    //　データベースにあるデータの数
    $number = mysqli_num_rows($result);

    return $data ;

}


function searchBarReq($host,$userId,$password,$dbName,$searchName,$id ){

  // コネクションを入れる

  $connect = mysqli_connect( $host , $userId , $password , $dbName );

  // ＳＱＬ文
  $sqls = "SELECT * FROM m_form WHERE ";

  //　キーワードを配列に格納
  $keywords= explode(" " , $searchName);

  // SQL文のLIKEを入れる
  foreach($keywords as $word){

$sqls .= " description LIKE '%".$word."%' AND TYPE LIKE 'REQUEST' HAVING userid = $id   ";

}

  //　ＳＱＬ文と結果
  $result = mysqli_query($connect,$sqls);

  //　結果は配列にかくのう
  $data = mysqli_fetch_all($result,MYSQLI_ASSOC);

  //　データベースにあるデータの数
  $number = mysqli_num_rows($result);

  return $data ;

}




function searchBarReqBulletin($host,$userId,$password,$dbName,$searchName){

// コネクションを入れる

$connect = mysqli_connect( $host , $userId , $password , $dbName );

// ＳＱＬ文
$sqls = "SELECT * FROM m_task WHERE ";

//　キーワードを配列に格納
$keywords= explode(" " , $searchName);

// SQL文のLIKEを入れる
foreach($keywords as $word){

$sqls .= " brand LIKE '%".$word."%'  ";

}

//　ＳＱＬ文と結果
$result = mysqli_query($connect,$sqls);

//　結果は配列にかくのう
$data = mysqli_fetch_all($result,MYSQLI_ASSOC);

//　データベースにあるデータの数
$number = mysqli_num_rows($result);

return $data ;

}








// insert data to user database
function updateDbpass($host,$userId,$password,$dbName , $array){

$id= $array[3];

    // コネクションを入れる
    $conn = mysqli_connect( $host , $userId , $password , $dbName );
  // インサート文

  $sql = "UPDATE m_user set password='".$array[0]."',salt='".$array[1]."',stretch='".$array[2]."'
 Where id=$id";;

 //　結果と文書
 $results = mysqli_query($conn,$sql);

 return $results;
 
}

// insert data to user database
function updateDb($host,$userId,$password,$dbName , $array){

        if($array[1]=="username"){
            $text="login_id";
        }

        else if($array[1]=="email"){
            $text="mail";
        }

        else if($array[1]=="name"){
            $text="name";
        }

        else if($array[1]=="address"){
            $text="address";
        }

        $id= $array[2];
    
        // コネクションを入れる
        $conn = mysqli_connect( $host , $userId , $password , $dbName );
      // インサート文
    
      $sql = "UPDATE m_user set $text='".$array[0]."'
     Where id=$id";;
    
     //　結果と文書
     $results = mysqli_query($conn,$sql);
    
     return $results;
     
    }

// insert data to user database
    function updateformDb($host,$userId,$password,$dbName ,$array, $id){

      // コネクションを入れる
      $conn = mysqli_connect( $host , $userId , $password , $dbName );
    // インサート文

    $sql = "UPDATE m_form set title='".$array[0]."',type='".$array[1]."',description='".$array[2]."',category='".$array[3]."'
    Where id=$id";;

    //　結果と文書
    $results = mysqli_query($conn,$sql);

    return $results;

    }


// insert data to user database
function insertDbPost($host,$userId,$password,$dbName , $array){

    // コネクションを入れる
    $conn = mysqli_connect( $host , $userId , $password , $dbName );
  // インサート文
 $sql = 
 "INSERT INTO m_post (title , description , category , name ) 

 VALUES('". $array["title"] ."' , '" . $array["description"]. "', '" . $array["category"]
 . "', '" .$array["name"].
 "' ) ";;

 //　結果と文書
 $results = mysqli_query($conn,$sql);

 return $results;
 
}


// insert data to m_comments
function insertDbComments($host,$userId,$password,$dbName , $array){

    // コネクションを入れる
    $conn = mysqli_connect( $host , $userId , $password , $dbName );
  // インサート文
 $sql = 
 "INSERT INTO m_comments (title , postid , commentator , message ) 

 VALUES('". $array["title"] ."' , '" . $array["postid"]. "', '" . $array["commentator"]
 . "', '" .$array["message"].
 "' ) ";;

 //　結果と文書
 $results = mysqli_query($conn,$sql);

 return $array;
 
}

function getForm($host,$userId,$password,$dbName , $id){

    // コネクションを入れる
    $conn = mysqli_connect( $host , $userId , $password , $dbName );

    // ＳＱＬ文
    $sqls ="SELECT * FROM m_task WHERE userid='" . $id . "'";

    //　ＳＱＬ文と結果
    $result = mysqli_query($conn,$sqls);

    //　結果は配列にかくのう
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);

    //　データベースにあるデータの数
    $number = mysqli_num_rows($result);

    return $data ;
    
}

function getUserPostId($host,$userId,$password,$dbName , $id){

  // コネクションを入れる
  $conn = mysqli_connect( $host , $userId , $password , $dbName );

  // ＳＱＬ文
  $sqls ="SELECT * FROM m_task WHERE id='" . $id . "'";

  //　ＳＱＬ文と結果
  $result = mysqli_query($conn,$sqls);

  //　結果は配列にかくのう
  $data = mysqli_fetch_all($result,MYSQLI_ASSOC);

  //　データベースにあるデータの数
  $number = mysqli_num_rows($result);

  return $data ;
  
}


function getAllForm($host,$userId,$password,$dbName){

    // コネクションを入れる
    $conn = mysqli_connect( $host , $userId , $password , $dbName );

    // ＳＱＬ文
    $sqls ="SELECT * FROM m_task ORDER BY date DESC ";

    //　ＳＱＬ文と結果
    $result = mysqli_query($conn,$sqls);

    //　結果は配列にかくのう
    $data = mysqli_fetch_all($result,MYSQLI_ASSOC);

    //　データベースにあるデータの数
    $number = mysqli_num_rows($result);

    return $data ;
    
}



class Pager
{
    //プロパティーをセット
    private $page_num;
    private $line;
    private $data_array;

    // 指定された変数でコンストラクターを作成します
    public function __construct($data_array ,
      $line , $page_num)
    {      
            $this->data_array = $data_array;    
            $this->line = $line;
            $this->page_num = $page_num;


            //ページナンバーエラーを予防
            if ($page_num > $line) {
              header("location:index.php");
            }

              //文字入力エラーを予防
              if (!is_numeric($page_num)) {
                header("location:index.php");
              }

    }

    //対処のページに表示するデータを配列で戻すの関数はここから//
    public function get_data(){

      $flag=0;

    // 配列の数を求める
    $datas=count($this->data_array);
    
    // 新しいIDをセットする
    $newID=$this->page_num-1;  

   //　ページが何番まであるのかを表示する
   $pager=ceil(  $datas/ $this->line );

   $divider=$datas-(($this->page_num-1)*$this->line); //最後のデータの数

   // 配列の数を求める
   
  $check=0;

   for ($i=$this->line*$newID ; $i < $this->line*$newID + $this->line  ; $i++) 
   {
    //もしデータがもう存在しない場合は
    if($i == $datas) 
    {      
      $check+=1;
      break;
    }
    //データを配列に入れる
    $array[]=$this->data_array[$i];
    $flag+=1;

   }

  //戻り値
  if($flag > 0 ){
    return $array ;
  }
  else{
    return "NULL";
  }
   

    }

    //対処のページに表示するデータを配列で戻すの関数はここまで//


  //Page List の関数はここからになります  
  public function page_list($style = [] , $url=""){


    //初期値を設定
    $active="";

    $disabledPrev="";

    $disabledNext="";

    $pagination = $style['ul'];//ULのクラスを設定

    $pageItem = $style['li']['main'];//リストのクラスを設定

    $styleAnchor = $style['a'];// Aタグのクラスを設定




    $datas=count($this->data_array );// 配列の数を求める

    //　ページが何番まであるのかを表示する
    $pager=ceil( $datas/ $this->line );

    // 前へのボタンの処理
    $previous = $this->page_num - 1 ;

    if ($previous == 0 ) {
      $disabledPrev =  $style['li']['disabled'];
    }

    // 次へのボタンの処理
    $next = $this->page_num + 1 ;

    if ($next > $pager ) {
      $disabledNext =  $style['li']['disabled'];
    }

    ///////////////// ページャはここからになります /////////////////

      echo'<ul class="'.$pagination.'">';

      // 前へのボタンの処理
      echo'<li class ="'.$pageItem.' '.$disabledPrev.'" >
      <a class ="'.$styleAnchor.'" href="'.$url."=".$previous.'">＜</a></li>';

      // ページの処理
      for ($i=1; $i <= $pager ; $i++) { 

        // 何のページにあるかを示している
        if ($i == $this->page_num) {
          $active = $style['li']['active'];
                
        }
        // 今のページの場合は空っぽ
        else{
          $active="";
        }

        
        // ページの数字を表示する
        echo'<li class ="'.$pageItem.' '.$active.'">
        <a class ="'.$styleAnchor.'"   href="'.$url."=".$i.'">'.$i.'</a></li>';      

      }


      // 次へのボタンの処理
      echo'<li class ="'.$pageItem.' '.$disabledNext.'">
      <a class ="'.$styleAnchor.'" href="'.$url."=".$next.'">＞</a></li>';

      echo'</ul>';

  ///////////////// ページャはここまでになります /////////////////

    }
    //Page List の関数はここまでになります
}

function imageUpload($image,$id,$name,$url, $brand , $desc  ){

  $null="0";

  if (count($image) == 5) {
                              
      $filename = $image["name"];//ファイル名
      $fileTmpName = $image["tmp_name"];
      $fileExt = explode('.' , $filename);
      $ext = strtolower(end($fileExt));//ファイルタイプを読み出す

      $conn = mysqli_connect(HOST, USER_ID, PASSWORD ,DB_NAME);
      $sql = "SELECT * FROM m_user where id='" . $id . "'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);

      

      $filename = $image["name"];//ファイル名
      $id = $row["id"];//ID
      $new_name = $row["id"] .'.'. $ext;//新名
      $folder = "images/task/$id/";//フォルダ名
      $move_folder = $folder .$filename;//画像フォルダ
      $fileTmpName = $image["tmp_name"];
      

      
      //データベースに入力する

      $query = "INSERT INTO m_task(userid,name,url,brand,description,likes,comment,img)
       VALUES('$id','$name','$url','$brand','$desc',0,0,'$filename')";


      //フォルダがない場合新しいフォルダ作る
      if (!file_exists($folder)) {
          
          mkdir("images/task/$id/", 0755, true);
          

      }
      else{
          
      }

      move_uploaded_file($fileTmpName, $move_folder);

      mysqli_query($conn, $query);

      //閉じる
      mysqli_close($conn);
  
      
      

      
  }

  if (count($image) != 5) {

      

      $conn = mysqli_connect(HOST, USER_ID, PASSWORD ,DB_NAME);
      $sql = "SELECT * FROM m_user where id='" . $id . "'";
      $result = mysqli_query($conn,$sql);
      $row = mysqli_fetch_assoc($result);

      $textArray="";

      $id = $row["id"];//ID

      for ($i=0; $i < count($image) ; $i++) { 


        $newfilename=substr($image[$i]["name"],0, -4)."_".$i.".jpg";
          $textArray.=substr($image[$i]["name"],0, -4)."_".$i.".jpg";

          if(count($image)-1 != $i){
          $textArray.=",";
          }


      $filename = $image[$i]["name"];//ファイル名
      $fileTmpName = $image[$i]["tmp_name"];
      $fileExt = explode('.' , $filename);
      $ext = strtolower(end($fileExt));//ファイルタイプを読み出す

      $filename = $image[$i]["name"];//ファイル名
      $id = $row["id"];//ID
      $new_name = $row["id"] .'.'. $ext;//新名
      $folder = "images/task/$id/";//フォルダ名
      
      $move_folder = $folder . $newfilename;//画像フォルダ
      $fileTmpName = $image[$i]["tmp_name"];
      

      
      //データベースに入力する


      $query = "INSERT INTO m_task(userid,name,url,brand,description,likes,comment,img)
       VALUES('$id','$name','$url','$brand','$desc',0,0,'$textArray')";

      //フォルダがない場合新しいフォルダ作る
      if (!file_exists($folder)) {
          
          mkdir("images/task/$id/", 0755, true);
          

      }
      else{
          
      }

      move_uploaded_file($fileTmpName, $move_folder);
          
      }

      
      mysqli_query($conn, $query);
      mysqli_close($conn);
  }    
   
}



?>