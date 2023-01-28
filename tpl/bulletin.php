<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/bulletinstyle.scss">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="js/index.js"></script>
    <!-- Insert Username here to display their profile -->
    <title>Bulletin</title>
</head>

<h1>CONNECT</h1>


<div class="outsidecontainment">

    <div class="containernew">

        <div>
            <form action="" method="post" enctype="multipart">
                <input type="submit" name="back" class="home" value="↩">
            </form>
        </div>

        <div class="contentalt facmiddle">

            
      <a href="offer.php?id=<?php echo$_GET["id"]; ?>">     
      <img class="image-cropper" src="userprofile/<?php echo$_GET["id"]; ?>/img_<?php
      echo $_GET["id"]; ?>.jpg"></a>

        </div>

        <div>
                <input type="submit" id="chatopen" onclick="ChatIconAppearPartOne()" class="home" value="💬">
                <input type="submit" id="chatclose" onclick="ChatIconByePartOne()" class="chatback noexist" value="💬">
        </div>

        





        

    </div>

    <div id="chatentry" class="noexist">

        <iframe src="chatbox.php?id=<?php echo$_GET["id"]; ?>" id="chatframe" class="" name="targetframe" allowTransparency="true" scrolling="yes" frameborder="1"></iframe>

    </div>


</div>



<div class="container">

    <div class="contentprime">


        
        <div class="requests">

            <h2>ALL POST</h2>
        
           
            <form action="<?php echo $_SERVER['PHP_SELF']?>?id=<?php echo $_GET["id"]; ?>&&action=reqsearch" method="POST" 
            enctype="multipart/form-data">           
            <input class="submit" type="text" name="reqsearch" placeholder="検索" >
                <input class="searchbutton" name="reqsubmitsearch" type="submit" value="🔎︎" >
            </form>
       

        </div>

        <table>

        <?php if ($reqflag < 1 ) :   ?>
    
        <?php for ($i=0; $i < count($value) ; $i++) : ?>

        <?php $image  =explode(",",$value[$i]["img"]); ?>


            <?php $functionComment = getComment("localhost","root","","legit" , $value[$i]["id"]); ?>

            <tr>
    
                <th rowspan="3"> <img class="image-cropper" src="images/task/<?php echo$value[$i]["userid"]; ?>/<?php echo$image[0]; ?>"></th>
            <td class="title"> <a class="title" style="font-size:1em" href="bulletindetails.php?id=<?php echo$_GET["id"]; ?>&&postid=<?php echo$value[$i]["id"]?>">
            <?php echo$value[$i]["name"]; ?> </a></td>
            </tr>

            <tr>
                <td class="date"><?php echo$value[$i]["date"]; ?></td>
                <td class="category"><?php echo$value[$i]["brand"]; ?></td>
            </tr>

            <tr>
                <td class="description"> <?php echo$value[$i]["description"]; ?> </td>
                <td class ="comments"><?php echo count($functionComment); ?> コメント </td>
            </tr>

           

            <?php endfor;  ?>    
     
            <?php else :   ?>    

          
            <?php for ($i=0; $i < count($arraysearch) ; $i++) : ?>

                <?php $imagesearch  =explode(",",$arraysearch[$i]["img"]); ?>
            
            <tr>
            <th rowspan="3"> <img class="image-cropper" src="images/task/<?php echo$arraysearch[$i]["userid"]; ?>/<?php echo$imagesearch[0]; ?>"></th>
                
            <td class="title"> <a class="title" style="font-size:1em" href="bulletindetails.php?id=<?php echo$_GET["id"]; ?>&&postid=<?php echo$arraysearch[$i]["id"]?>">
            <?php echo$arraysearch[$i]["name"]; ?> </a></td>
            </tr>

            <tr>
                <td class="date"><?php echo$arraysearch[$i]["date"]; ?></td>
                <td class="category"><?php echo$arraysearch[$i]["brand"]; ?></td>
            </tr>

            <tr>
                <td colspan="2" class="description"> <?php echo$arraysearch[$i]["description"]; ?> </td>
            </tr>

            <?php endfor;  ?>

            <?php endif; ?>




        </table>


        <br>
        <?php if ($reqflag < 1 ) :   ?>
        <?php  $reqpage->page_list($class ,"bulletin.php?id=$getid&&reqpage_num"); ?>
        <?php endif; ?>

        <h1>_______________________________</h1>
        <!-- Pagination here -->
     


    </div>

</div>


</body>
</html>