<?php
include 'konekcija.php';

if($_SESSION['user'] == ''){
  header("Location:login.php");
  echo "Morate biti korisnik da bi dodali stanje";
  exit;
}

$id = $_GET['id'];
$db-> where("stanjeID",$id);

$poruka = '';

if(isset($_POST["izmeni"])){

    include("klase/stanjeKlasa.php");
    $stanje = new Stanje($db);

    if($stanje->izmeniStanje($id)){
      
       header("Location:trenutnoStanje.php");  
    }else{
      $poruka = 'Greska pri izmeni';
    }
}

?>



<?php include 'header.php'; 
include 'navigacija.php';


?>

  <body style="background-image:url(images/2.jpg); background-repeat: no-repeat;
   background-size: 100% 700px;">

        <div class="col-md-12">
          <h2 style="text-align: center; font-family: sans-serif;">Izmena kolicine : </h2>
          
        </div>


        <section id="about" style=" margin-left: 25%; margin-top: 8%; margin-right: 2%;">
 	  
        <div class="col-md-12">

        <form method="post" action="">


        <div class="form-group">
              <label for="kolicina" class="cols-sm-2 control-label">Kolicina : </label>
             
                <div class="input-group" style="width: 70%">
              
                  <input type="number" class="form-control" name="kolicina" id="kolicina"  />
              
              </div>
            </div>


        	
             <div class="form-group ">
              <button type="submit" name="izmeni" id="button" class="btn btn-default btn-lg" style="border-radius: 12px;  border: 2px solid #9ccce5; margin-left: 28%; margin-top: 5%;" >Izmeni</button>
            </div>


            <h4 style=" font-family: sans-serif; margin-left: 22%;"><?php echo $poruka ?></h4>
     

         </form>


        </div>
      
      </section>

      <img src="images/zalihe1.png" style="margin-top: 50px; margin-left: 20px;">

  <?php include 'footer.php'; ?>
  

</body>

</html>