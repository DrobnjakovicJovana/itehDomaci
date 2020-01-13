
<?php
include 'konekcija.php';

$poruka = '';
if(isset($_POST["login"])){

    include("klase/userKlasa.php");
    $user = new User($db);

    if($user->login()){
      header("Location: index.php");
    }else{
      $poruka = 'Neuspesno logovanje';
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
          <h3 class="section-title">Ulogujte se </h3>
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
              <label for="username" class="cols-sm-2 control-label">Username</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                  <input type="text" class="form-control" name="username" id="username"  placeholder="Username"/>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="password" class="cols-sm-2 control-label">Password</label>
              <div class="cols-sm-10">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-key fa" aria-hidden="true"></i></span>
                  <input type="password" class="form-control" name="password" id="password"  placeholder="Password"/>
                </div>
              </div>
            </div>
            
            
            <div class="form-group ">
              <button type="submit" name="login" id="button" class="btn btn-primary btn-lg btn-block" style="background-color: #382a2a; opacity: 0.8;">Login</button>
            </div>

          </form>

        </div>
      </div>
    </div>
  </section>
	
  <?php include 'footer.php'; ?>

</body>
</html>