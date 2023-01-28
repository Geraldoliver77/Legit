<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="css/checkstyle.scss" rel="stylesheet" type="text/css"> 
 
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LEGIT Landing Page</title>


</head>
<body class="LandingBG">


<!-- CSS Connection Established -->


<h1 class="OfferAL"> アップロード </h1>

<div id="maincontainer" >

  
        <div id="registerbox" class="registerbox" active="false">
     
        <form action="<?php echo $_SERVER['PHP_SELF']?>?id=<?php echo $_GET["id"]; ?>" method="POST" 
            enctype="multipart/form-data">

            <!-- Begin -->

            <div class="flexer">

                <div class="flexerinnard">
                <a href="#"> <img class="image-cropper center" src="userprofile/<?php echo$_GET["id"]; ?>/img_<?php
                echo $_GET["id"]; ?>.jpg"></a>
                <p ><?php echo htmlspecialchars($newarray["name"], ENT_QUOTES);   ?> </p>

            

                </div>

                <div class="flexerinnard flexerinnardplus">

                    <input type="text" class="textbox" name="name" placeholder="アイテム名" >
                
                    <br> <br>
        
                    <input type="text" class="textbox" name="brand" placeholder="ブランド名" >

                    <br> <br>

                    <input type="text" class="textbox" name="url" placeholder="URL" >

                    <br>     <br>
            
                    <input type="file" class="custom-file-input1" name="fileOne" value="<?php echo $img; ?>">

                    <br>     <br>

                    <input type="file" class="custom-file-input2" name="fileTwo" value="<?php echo $img; ?>">

                     <br>     <br>
                    
                    <input type="file" class="custom-file-input3" name="fileThree" value="<?php echo $img; ?>">

                    <br>     <br>
                   
                    <input type="file" class="custom-file-input4" name="fileFour" value="<?php echo $img; ?>">
                    <br>
                    </div>
            </div>
            <!-- end -->

            <br>

            <textarea class="textboxdesc" name="description" placeholder= "追記情報"></textarea>



            <br><br><br>

       

        <input type="submit"  name="post" class="submit" 
        value="送信">

        
        <input type="submit"  name="back" class="submitback" 
        value="戻る">



            </form>
        </div>




</div>
    
</body>
</html>