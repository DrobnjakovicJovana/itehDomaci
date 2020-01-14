<?php

$connect = mysqli_connect("localhost", "root", "", "ajizalihe");
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM prodavnica WHERE grad LIKE '%".$search."%'
 
 ";
}
else
{
 $query = "
  SELECT * FROM prodavnica";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
 
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Prodavnica</th>
     <th>Grad</th>
     
   
   
    </tr>
   
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr>
    <td>'.$row["nazivProdavnice"].'</td>
    <td>'.$row["grad"].'</td>
    
   
   </tr>
  ';
 }
 echo $output;
}
else
{
 echo 'Ne postoji prodajni objekat na vasoj lokaciji';
}

?>