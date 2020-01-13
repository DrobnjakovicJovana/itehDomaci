
<?php include 'konekcija.php'  ?>
<?php include 'header.php'; 
include 'navigacija.php';


?>

<body style="background-image:url(images/2.jpg); background-repeat: no-repeat;
   background-size: 100% 700px;">


  <div id="flip" style="margin-top: 5%; text-align: center;background-color: #8b99b5; padding: 15px; margin:40px 20px 0px 20px;
    border: solid 1px #c3c3c3;">Pogledajte fajlove : </div>

<div id="panel" style=" padding: 50px;text-align: center;background-color: #8b99b5; margin:0px 20px 0px 20px; opacity: 0.6;
    display: none;">

    <div class="container wow fadeInUp">
      <?php

         $files = glob("fajlovi/*.*");
         foreach ($files as $file) {
           ?>
           <div class="col-md-12">
                   <a  href="<?php echo $file; ?>" target="blank" style="color: black;">
                     <?php echo substr($file, 8); ; ?>
                   </a>
             </div>

           <?php
         }
      ?>


    </div></div>


   <?php include 'footer.php'; ?>
  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script> 
$(document).ready(function(){
    $("#flip").click(function(){
        $("#panel").slideToggle("slow");
    });
});
</script>
</body>

</html>
