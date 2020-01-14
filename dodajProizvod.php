
<?php
include 'konekcija.php';

if($_SESSION['user']['uloga'] =='0' || $_SESSION['user']==''){
  header("Location:login.php");
  exit;
}

$poruka = '';
if(isset($_POST["unesi"])){

    include("klase/proizvodKlasa.php");

    $pr = new Proizvod($db);

    if($pr->unesiProizvod()){
      header("Location: index.php");
    }else{
      $poruka = 'Greska pri dodavanju proizvoda';
    }
}

?>


<?php include 'header.php'; 
include 'navigacija.php';


?>

  <body style="background-image:url(images/2.jpg); background-repeat: no-repeat;
   background-size: 100% 700px;">

        <div class="col-md-12">
          <h2 style="text-align: center; font-family: sans-serif;">Ubacite novi proizvod : </h2>
          
        </div>


        <section id="about" style=" margin-left: 25%; margin-top: 6%; margin-right: 2%;">
 	  
        <div class="col-md-12">
        <form method="post" action="">




                <div class="form-group">
              <label for="naziv" class="cols-sm-2 control-label">Naziv proizvoda : </label>
           
                <div class="input-group" style="width: 70%">
                  
                  <input type="text" class="form-control" name="naziv" id="naziv"  placeholder="Naziv"/>
                
              </div>
            </div>


            <div class="form-group">
              <label for="opis" class="cols-sm-2 control-label">Opis proizvoda : </label>
              
                <div class="input-group" style="width: 70%">
                  
                  <input type="text" class="form-control" name="opis" id="opis"  placeholder="Opis"/>

                </div>
              </div>


              <div class="form-group">
              <label for="brend" class="cols-sm-2 control-label">Izaberite brend : </label>
              
                <div class="input-group" style="width: 70%">
                 
                  <select name="brend" class="form-control">
                    <?php
                    $brend = $db->get('brend');
                        foreach($brend as $b){
                     ?>
                     <option value="<?php echo $b['brendID'] ;?>"><?php echo $b['nazivBrenda'] ;?></option>

                   <?php } ?>
                  </select>
              
              </div>
            </div>



              <div class="form-group">
              <label for="cena" class="cols-sm-2 control-label">Cena proizvoda : </label>
              
                <div class="input-group" style="width: 70%">
                 
                  <input type="text" class="form-control" name="cena" id="cena"  placeholder="Cena"/>
              </div>
              </div>

          

          <div class="form-group ">
              <button type="submit" name="unesi" id="button" class="btn btn-default btn-md" style="border-radius: 10px;  border: 2px solid #9ccce5; margin-left: 25%; margin-top: 2%;" >Dodaj novi proizvod:</button>
            </div>


              

            <h5 style=" font-family: sans-serif; margin-left: 23%;"><?php echo $poruka ?></h5>

         </form>

        </div>
      
      </section>


  <?php include 'footer.php'; ?>
  

</body>

</html>
