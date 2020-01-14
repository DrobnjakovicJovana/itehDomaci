<?php
include 'konekcija.php'; ?>


<?php include 'header.php'; 
include 'navigacija.php';


?>

 <body style="background-image:url(images/2.jpg); background-repeat: no-repeat;
   background-size: 100% 700px;">


<div class="container">
   <br />
   <h2 align="center">Pretrazite prodavnicu po lokaciji</h2><br />
   <div class="form-group">
    <div class="input-group">
     <span class="input-group-addon">Search</span>
     <input type="text" name="search_text" id="search_text" placeholder="Unesite grad" class="form-control" />
    </div>
   </div>
   <br />
   <div id="result"></div>
  </div>

<?php include "footer.php" ; ?>

</body>


<script>
$(document).ready(function(){

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"gradovi.php",
   method:"POST",
   data:{query:query},
   success:function(data)
   {
    $('#result').html(data);
   }
  });
 }
 $('#search_text').keyup(function(){
  var search = $(this).val();
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>