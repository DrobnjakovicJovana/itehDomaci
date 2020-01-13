<?php 

include 'konekcija.php';

if($_SESSION['user']['uloga'] =='0' || $_SESSION['user']==''){
  header("Location:login.php");
  
  exit;
}
   if(isset($_POST["dodaj"])){

      include("klase/brendKlasa.php");

      $brend = new Brend($db);

      if($brend->dodajBrend()){
     
    }else{
      
    }
  }

 ?>

 <?php include 'header.php'; 
include 'navigacija.php';
?>

 <body style="background-image:url(images/2.jpg); background-repeat: no-repeat;
  background-size: 100% 1200px;">
 	 
    
    <h3 class="text-center">Brendovi</h3>
   <h5 class="text-center">Unesite brend po vasoj zelji!</h5>
<hr>
  <div class="text-center">
  	<form class="form-inline" method="post">
    <div class="form-group">
    <label for="brand">Unesite brend:</label>
    <input type="text" name="brend"  class="form-control">
    <input type="submit" name="dodaj" class="btn btn-large " value="Dodaj">
		</div>
	</form>
</div>

<div style="margin: 20px 20px;">
<table class="table" id="tabela" style="border: 2px solid black; opacity: 0.8; text-align: center; ">
  <thead> 
     <tr>
      <th style="background:#3f4247; text-align: center; color: white;">Naziv brenda</th>
    </tr>
  </thead>
  <tbody>
<?php

            $zahtev = curl_init("http://localhost:8080/ajiZalihe/api/brend");
            curl_setopt($zahtev, CURLOPT_RETURNTRANSFER, 1);
            $odgovor = curl_exec($zahtev);
            $brend = json_decode($odgovor);
            curl_close($zahtev);

                  foreach($brend as $b){
               ?>


    <tr>
    
      <td><?php echo $b->nazivBrenda; ?> </td>
    </tr>
   
     <?php  } ?>
  </tbody>
</table>
</div>


 <div id="poll" style="margin-left: 37%; margin-top: 35px; margin-bottom: 10px;">
<h3>Da li Vam se svidja izbor brendova?</h3>
<form style="margin-bottom: 15%;">
Da:
<input type="radio" name="vote" value="0" onclick="getVote(this.value)">
<br>Ne:
<input type="radio" name="vote" value="1" onclick="getVote(this.value)">
</form>
</div>


 
<script>
function getVote(int) {
 
 xmlhttp=new XMLHttpRequest();
  
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("poll").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","poll_vote.php?vote="+int,true);
  xmlhttp.send();
}
</script>



<script src="js/datatables.js"></script>
<link href="css/datatables.css" rel="stylesheet">
<script>
  $(document).ready(function(){
    $('#tabela').DataTable();
    });
  </script>

<?php include 'footer.php'; ?>
</body>
</html>

