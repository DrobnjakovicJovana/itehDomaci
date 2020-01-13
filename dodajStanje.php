
<?php include 'konekcija.php'  ?>
<?php

$poruka= '';
if($_SESSION['user'] == ''){
  header("Location:login.php");
  echo "Morate biti korisnik da bi dodali stanje";
  exit;
}


if(isset($_POST["unesi"])){

    include("klase/stanjeKlasa.php");
    $stanje = new Stanje($db);

    if($stanje->unesiStanje()){
     $poruka = 'Uspesno ste dodali proizvod na stanje.';
    }else{
      $poruka='Greska pri dodavanju. Pokusajte ponovo.';
    }
}

?>



<?php include 'header.php'; 
include 'navigacija.php';


?>

  <body style="background-image:url(images/2.jpg); background-repeat: no-repeat;
   background-size: 100% 700px;">

        <div class="col-md-12">
          <h2 style="text-align: center; font-family: sans-serif;">Dodavanje proizvoda na stanje</h2>
          
        </div>


        <section id="about" style=" margin-left: 25%; margin-top: 8%; margin-right: 2%;">
 	  
        <div class="col-md-12">
        <form method="post" action="">



        	 <div class="form-group" >

                 <label for="proizvod" class="cols-sm-2 control-label">Proizvod : </label>
          
                  <div class="input-group" style="width: 70%">
                  
                  <select name="proizvod" class="form-control">
                   <?php
                    $pro = $db->get('proizvod');
                        foreach($pro as $pr){
                     ?>
                     <option value="<?php echo $pr['proizvodID'] ;?>"><?php echo $pr['nazivProizvoda'] ;?></option>

                   <?php } ?>
                  </select>
               
              </div>
            </div>



             <div class="form-group" >

                 <label for="prodavnica" class=" control-label" >Prodavnica : </label>
                 
                  <div class="input-group" style="width: 70%">
                  
                  <select name="prodavnica" class="form-control">
                    <?php
                    $prod = $db->get('prodavnica');
                        foreach($prod as $p){
                     ?>
                     <option value="<?php echo $p['prodavnicaID'] ;?>"><?php echo $p['nazivProdavnice'] ;?></option>

                   <?php } ?>
                  </select>
               
              </div>
            </div>



            <div class="form-group">
              <label for="kolicina" class="cols-sm-2 control-label">Kolicina : </label>
           
                <div class="input-group" style="width: 70%">
                  
                  <input type="number" class="form-control" name="kolicina" id="kolicina"  placeholder="Kolicina"/>
                
              </div>
            </div>


             <div class="form-group ">
              <button type="submit" name="unesi" id="button" class="btn btn-default btn-lg" style="border-radius: 12px;  border: 2px solid #9ccce5; margin-left: 25%; margin-top: 3%;" >Dodaj na stanje</button>
            </div>


            <h4 style=" font-family: sans-serif; margin-left: 17%;"><?php echo $poruka ?></h4>

         </form>

        </div>
      
      </section>
   
 


      
        <div class="form-group " style="margin: 80px 44%;">
             
              <button type="submit" name="file"  class="btn btn-primary btn-md" style="border-radius: 12px;  border: 2px solid #9ccce5;  margin-bottom: 5px;" ><a href="fajlovi.php" style="text-decoration: none; color: white;">Svi fajlovi reklamacija</a></button>
            </div>


         

  <?php include 'footer.php'; ?>
  

</body>

</html>