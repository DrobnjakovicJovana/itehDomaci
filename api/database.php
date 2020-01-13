<?php
class Database
{
private $hostname="localhost";
private $username="root";
private $password="";
private $dbname="bohoZalihe";
private $dblink; // veza sa bazom
private $result = true; // Holds the MySQL query result
private $records; // Holds the total number of records returned
private $affectedRows; // Holds the total number of affected rows

function __construct($dbname)
{
$this->dbname = $dbname;
 $this->Connect();
}



public function getResult()
{
return $this->result;
}

function __destruct()
{
$this->dblink->close();
//echo "Konekcija prekinuta";
}


//konekcija sa bazom
function Connect()
{
$this->dblink = new mysqli($this->hostname, $this->username, $this->password, $this->dbname);
if ($this->dblink ->connect_errno) {
    printf("Konekcija neuspešna: %s\n", $mysqli->connect_error);
    exit();
}
$this->dblink->set_charset("utf8");
//echo "Uspesna konekcija";
}


function ubaciKorisnika($data) {
            $mysqli = new mysqli("localhost", "root", "", "bohoZalihe");

            $imeIPrezime = mysqli_real_escape_string($mysqli,$data['imePrezime']);
            $korisnickoIme = mysqli_real_escape_string($mysqli,$data['username']);
            $lozinka = mysqli_real_escape_string($mysqli,$data['password']);


            $values = "('".$imeIPrezime."','".$korisnickoIme."','".$lozinka."')";

            $query = 'INSERT into user (imePrezime, username, password) VALUES '.$values;

            if($mysqli->query($query))
            {
                $this ->result = true;
            }
            else
            {
                $this->result = false;
            }
            $mysqli->close();
        }


      function proizvod() {
        $mysqli = new mysqli("localhost", "root", "", "bohoZalihe");
        $mysqli->set_charset("utf8");
        $q = 'select * from proizvod p join brend b on p.brendID=b.brendID';
        $this ->result = $mysqli->query($q);
        $mysqli->close();
    }

    function brend() {
        $mysqli = new mysqli("localhost", "root", "", "bohoZalihe");
        $mysqli->set_charset("utf8");
        $q = 'SELECT * FROM brend ';
        $this ->result = $mysqli->query($q);
        $mysqli->close();
    }

    function stanja() {
        $mysqli = new mysqli("localhost", "root", "", "bohoZalihe");
        $mysqli->set_charset("utf8");
        $q = 'select * from stanjezaliha s join prodavnica p on s.prodavnicaID=p.prodavnicaID join proizvod pr on s.proizvodID = pr.proizvodID join brend b on pr.brendID=b.brendID';
        $this ->result = $mysqli->query($q);
        $mysqli->close();
    }

    

    function korisnici() {
        $mysqli = new mysqli("localhost", "root", "", "bohoZalihe");
        $mysqli->set_charset("utf8");
        $q = 'select * from user';
        $this ->result = $mysqli->query($q);
        $mysqli->close();
    }


    function ExecuteQuery($query)
    {
        if($this->result = $this->dblink->query($query)){
            if (isset($this->result->num_rows)) $this->records         = $this->result->num_rows;
                if (isset($this->dblink->affected_rows)) $this->affected        = $this->dblink->affected_rows;
                    return true;
        }
        else{
            return false;
        }
    }

}
?>