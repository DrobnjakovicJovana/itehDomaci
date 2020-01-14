<?php include 'konekcija.php'; ?>
<?php include 'header.php'; 
include 'navigacija.php';
 

?>
<?php
/* Database connection settings */
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'ajizalihe';
$mysqli = new mysqli($host, $user, $pass, $db) or die($mysqli->error);

$data1 = '';
$data2 = '';

//query to get data from the table
$sql="select sum(s.kolicina) as broj,p.proizvodID as pr from proizvod p join stanjezaliha s on p.proizvodID=s.proizvodID group by p.proizvodID";
$result = mysqli_query($mysqli, $sql);





//loop through the returned data
while ($row = mysqli_fetch_array($result)) {

	$data1 = $data1 . '"' . $row['broj'] . '",';
	$data2 = $data2 . '"' . $row['pr'] . '",';
}

$data1 = trim($data1, ",");
$data2 = trim($data2, ",");
?>

<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>POZORIŠTE ATELJE 212</title>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link href="css/animate.min.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>



	<!-- <style type="text/css">			
			body{
				font-family: Arial;
			    margin: 80px 100px 10px 100px;
			    padding: 0;
			    color: white;
			    text-align: center;
			    background: #555652;
			}

			.container {
				color: #E8E9EB;
				background: #222;
				border: #555652 1px solid;
				padding: 10px;
			}
		</style>-->
</head>

<?php include 'header.php'; 
include 'navigacija.php';


?>
<?php  
 $connect = mysqli_connect("localhost", "root", "", "ajizalihe");  
 
 if(isset($_POST["insert"]))  
 {  
      $file = addslashes(file_get_contents($_FILES["image"]["tmp_name"]));  
      $query = "INSERT INTO images(name) VALUES ('$file')";  
      if(mysqli_query($connect, $query))  
      {  
           
      }  
 }  
 ?>  
<body style="background-image:url(images/2.jpg); background-repeat: no-repeat;
   background-size: 100% 700px;">
	<div class="container">
		<h1>Statistika broja komada na stanju po proizvodima</h1>
		<canvas id="chart" style="width: 100%; height: 65vh; background: #222; border: 1px solid #555652; margin-top: 10px;"></canvas>

		<script>
			var ctx = document.getElementById("chart").getContext('2d');
			var myChart = new Chart(ctx, {
				type: 'line',
				data: {
					labels: [ "Haljina na pruge","Karirana suknja"  ,"Bela kosulja" ," Tunika na pruge","Sivi kaput","Crveni duks"],
					
					datasets: [{
							label: 'Broj komada',
							data: [<?php echo $data1; ?>],
							backgroundColor: 'transparent',
							borderColor: 'rgba(255,99,132)',
							borderWidth: 3
						},

						{
							label: 'ProizvodID',
							data: [<?php echo $data2; ?>],
							backgroundColor: 'transparent',
							borderColor: 'rgba(0,255,255)',
							borderWidth: 3
						}

					]
				},

				options: {
					scales: {
						scales: {
							yAxes: [{
								beginAtZero: false
	
							}],
							xAxes: [{
								autoskip: true,
								maxTicketsLimit: 20
							}]
						}
					},
					tooltips: {
						mode: 'index'
					},
					legend: {
						display: true,
						position: 'top',
						labels: {
							fontColor: 'rgb(255,255,255)',
							fontSize: 16
						}
					}
				}
			});
		
 
		</script>


	
	</div>

	<br>
	<?php include 'footer.php'; ?>
</body>


</html>