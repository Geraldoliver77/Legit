<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/bulletindetails.scss">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/index.js"></script>
    <!-- Insert Username here to display their profile -->
    <title>transaction</title>
</head>

<h1>コネクト</h1>


<div class="container">

    <div class="contentprime">


        
        <div class="requests">

            <h2>DETAILS</h2>
  

           
           
        <div>
            <form action="" method="post" enctype="multipart">
                <input type="submit" name="back" class="home" value="↩">
            </form>
        </div>


        </div>        <br>          <br>

    <div class="userDetails">
        <table>

            <?php for ($i=0; $i < count($value) ; $i++) : ?>
       

            <?php $username = idDb("localhost","root","","legit" , $value[$i]["userid"]);?>
    

            

            <?php $image  =explode(",",$value[$i]["img"]); ?>
            <?php $functionComment = getComment("localhost","root","","legit" , $value[$i]["id"]); ?>
            <?php for ($a=0; $a < count($image) ; $a++) : ?>

        <tr> 
            <img class="image-cropper" src="images/task/<?php echo$value[$i]["userid"]; ?>/<?php echo$image[$a]; ?>">
            <?php endfor;  ?>

            <td class="title"> <a class="title" style="font-size:1em" href="bulletindetails.php?id=<?php echo$_GET["id"]; ?>&&postid=<?php echo$value[$i]["id"]?>">
                <?php echo$value[$i]["name"]; ?> </a>
            </td>
        </tr>

        <tr>
            <td class="date">
                <?php echo$value[$i]["date"]; ?>
            </td>
       
            <td class="category">  
                <?php echo $username[0]["name"]; ?> 
            </td>
        </tr>

        <tr>
            <td class="descriptionDetails"> 
                <?php echo$value[$i]["description"]; ?> 
            </td>
        </tr>

        <?php endfor;  ?>     
    
        </table>
    </div>
        <br><br>

        <h2>コメントリスト</h2>

    <div class="commentList">

        <table>

    
        <?php foreach ($functionComment as $value) : ?>
            <tr>
                <th rowspan="3"> <img class="image-user" src="userprofile/<?php echo$value["commentatorid"]; ?>/img_<?php
                echo $value["commentatorid"]; ?>.jpg"></th>  
            </tr>

            <tr>
                <td class="date"><?php echo$value["date"]; ?></td>      
                <td class="otherUser"><?php echo$value["verify"]; ?></td>      
            </tr>

            <tr>
                <td class="description"> <?php echo$value["message"]; ?> </td>
                <td class ="otherUser"><?php echo$value["commentator"];; ?></td>
            </tr>
            
            <?php endforeach;  ?>    


        </table>
        </div>
        <br>

        <br>
        <h2>コメント</h2>


        <form action="<?php echo $_SERVER['PHP_SELF']?>?id=<?php echo $_GET["id"]; ?>&&postid=<?php echo$_GET["postid"]?>" method="POST" 
        enctype="multipart/form-data"> 

        <div class="radioButton">
            <input type="radio" class="legit" name="radio" value="LEGIT" checked>LEGIT
            <input type="radio" class="fake" name="radio" value="FAKE">FAKE
        </div>
        <br>
        <textarea class="textboxdesc" name="comments" placeholder= "こちらへ書く
        
        
        "></textarea>
        <input type="submit" name="sendcomments" class="sendcomment" value="送信">
        </form>
        <br><br>
     
        
    </div>
        </div>
            </div>
</form>

</body>
</html>