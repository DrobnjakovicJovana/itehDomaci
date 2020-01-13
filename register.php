<?php
      include 'konekcija.php';


      $poruka = '';
      if(isset($_POST["registracija"])){

      include("klase/userKlasa.php");

      $user = new User($db);

      if($user->registracija()){
      $poruka = 'Uspesno ste registrovani';
    }else{
      $poruka = 'Neuspesna registracija';
    }
  }

?>
 
<?php include 'header.php'; 
include 'navigacija.php';
?>

<body style="background-image:url(images/2.jpg); background-repeat: no-repeat;
   background-size: 100% 700px;">

<section id="about">
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <h3 class="section-title">Registracija korisnika </h3>
          <div class="section-title-divider"></div>
        </div>
      </div>
    </div>
    <div class="container wow fadeInUp">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="">

            <p><?php
                echo($poruka);
            ?></p>
              <div class="form-group">
                <label for="ime" class="cols-sm-2 control-label">Ime i prezime : </label>
                <div class="cols-sm-10">
                  <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" name="ime" id="ime"  placeholder="Ime i prezime"/>
                  </div>
                </div>
              </div>
            <div class="form-group">
              <label for="username" class="cols-sm-2 control-label">Username : </label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="username" id="username"  placeholder="Username"/>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="password" class="cols-sm-2 control-label">Lozinka : </label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-key fa" aria-hidden="true"></i></span>
                  <input type="password" class="form-control" name="password" id="password"  placeholder="Password"/>
                </div>
              </div>
            </div>

            <div class="form-group ">
              <button type="button" class="btn btn-lg btn-default" id="generisiLozinku">Generisi lozinku</button>
            </div>
            
            
            <div class="form-group ">
              <button type="submit" name="registracija" id="button" class="btn btn-primary btn-lg btn-block" style="margin-top: 3%; background-color: #382a2a; opacity: 0.8;">Registruj se na  zalihe</button>
            </div>

          </form>

        </div>
      </div>
    </div>
  </section>
	
  <?php include 'footer.php'; ?>


<script type="text/javascript">
$(document).ready(function() {

  $('#generisiLozinku').click(function() {
    $.ajax({
      url: 'lozinka.php',
      success: function(json) {
        alert(json);
          $('#password').val(json);
      }
    });

  });

});
</script>
</body>
</html>