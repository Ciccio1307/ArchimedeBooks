<html>
    <head>
    <link rel="stylesheet" href="cssElaborato.css">
<title>VenditaLibroStudentePhp</title> 
</head>
<body>
<h1><center><font
face="impact">Archimede Books<br>VENDITA LIBRO</center><center> <img src="logo.PNG"  width="250" height="150"></h1>
<hr style="height:3px;border:none;color:#000000;background-color:#000000;">

<center>
<marquee >Istituto Tecnico "Archimede"
                Esame di Stato 2021  Francesco Virzi 5C INFORMATICA AS 2020/21</marquee>
                <br>
            <div class="divTable blueTable">
                <div class="divTableBody">
                <div class="divTableRow">
                <div class="divTableCell"><a href="checkPagamento.php">Prenota un Libro</a></div>
                <div class="divTableCell"><a href="homeStudente.php">Home Studente</a></div>
                <div class="divTableCell"><a href="aggiungiSoldi.html">Aggiungi Denaro </a></div>
                <div class="divTableCell"><a href="libriinVenditaLogged.php">Visualizza Libri  in Vendita </a></div>
                <div class="divTableCell"><a href="chiSiamoStudentiHome.php">Chi Siamo ? </a></div>
                <div class="divTableCell"><a href="cambiaPasswordStudente.php">Cambia password dell'account </a></div>
                <div class="divTableCell"><a href="logoutStudenti.php">Esci dall'account </a></div>
                </div>
                </div>
                </div><br>
                <BR>
                </center>
<BR><BR>
<font face="impact">
<?php
session_start();
$username = 'root';
$password = '';
  


    $StrConnessione = 'mysql:host=localhost;dbname=my_ciccio1307';

                try {
                    $conne = new PDO($StrConnessione, $username, $password);
                } catch (PDOException $e) {
                    echo 'Attenzione: ' . $e->getMessage();
                }
$isbn = $_POST['isbn'];
$titolo = $_POST['titolo'];
$autore = $_POST['autore'];
$prezzo = $_POST['prezzo'];
$casaE = ($_POST['casaE']);
$annoP = ($_POST['anno']);
$materia = $_POST['materia'];
$query = "INSERT INTO libri (ISBN,Titolo,Autore,Prezzo,CasaEditrice,AnnoPubblicazione,Materia)
 VALUES ('$isbn','$titolo','$autore','$prezzo','$casaE','$annoP','$materia')";
$conne->query($query);

$query = "SELECT ID,ISBN FROM libri";
$result=$conne->query($query);
foreach($result as $row)
{
if($row['ISBN'] == $isbn)
$idLibro = $row['ID'];
}
$idStudente = $_COOKIE['studente'] ;


 $query = "INSERT INTO interazioni (Studente,Libro,Vende)
VALUES ('$idStudente','$idLibro','s')";


if($conne->query($query)){
    echo "<center>";
    echo "<h2>";
    echo "LIBRO DA VENDERE INSERITO CON SUCCESSO!";
    echo "</h2>";
    echo "<br>";
    ?>
<img src="check.png"  width="150" height="150" />
<br>

<br>
<img src="Reload-1s-200px.gif"  width="50" height="50" />
<br>
<?php
    echo "<br>";
  echo "<br>";
  echo "<center>";
  echo "<h2>";
  echo "Ritorno alla Home Studente in corso...";
  echo "</h2>";
  header("refresh:3;url=homeStudente.php");
  }
  else
  {
    echo "<br>";
  echo "ERRORE INSERIMENTO RECORD "." <br> ".$query." <br> ";
  echo "<br>";
  ?>
<img src="cancel.png"    width="150" height="150"/>
<br>
<?php
  echo "Per tornare alla schermata di vendita , ";
  echo "<a href=vendiLibro.html>clicca qui</a>";
  }
  
  

  
  
  echo "</center>";
  
  
  
?>










</body>
</html>
