

<nav class="navbar navbar-default navbar-fixed-top" style="background-color: #d7e8f2; border-bottom: 2px solid #382a2a; ">
    <div class="container">
       <a href="index.php" class="navbar-brand">AJI zalihe</a>
        <ul class="nav navbar-nav">
       
        <li><a href="proizvodi.php">Lista proizvoda</a></li>
      

        <li><a href="prodajniObjekti.php">Prodajni objekti</a></li>

    
        
        <?php if($_SESSION['user'] != ''){ ?>
      
       
        <li><a href="dodajStanje.php">Dodaj na stanje</a></li>
         <li><a href="grafik1.php">Sve o proizvodima </a></li>
       


        <?php if($_SESSION['user']['uloga'] == 1){ ?>
    
          <li><a href="trenutnoStanje.php">Trenutno stanje</a></li>
        
        <li><a href="dodajProizvod.php">Dodaj proizvod</a></li>
         <li><a href="dodajBrend.php">Dodaj brend</a></li>
      <?php } ?>
      
      <li><a href="logout.php">Logout</a></li>
    <?php }else{ ?>

      <li><a href="register.php">Registracija</a></li>
      <li><a href="login.php">Login</a></li>
    <?php } ?>
      </ul>
    </div>
  </nav>
