<html>
<head><title>InterrogazioneSuperUser</title>
        <link rel="stylesheet" href="cssElaborato.css"></head>
<body>

<h1><center><font
        face="impact">Archimede Books <br>ACCOUNT SuperUser Guadagno Venditori
      </center> <center> <img src="logo.PNG"  width="250" height="150">
    </h1><hr
        style="height:3px;border:none;color:#000000;background-color:#000000;">
      
        
        <center>
            
    
                <marquee >Istituto Tecnico "Archimede"
                    Esame di Stato 2021  Francesco Virzi 5C INFORMATICA AS 2020/21</marquee>
                               <br>
                <div class="divTable blueTable">
                    <div class="divTableBody">
                    <div class="divTableRow">
                    <div class="divTableCell"><a href="checkPagamento.php">Prenota un Libro</a></div>
                    <div class="divTableCell"><a href="vendiLibro.html">Vendi un Libro</a></div>
                    <div class="divTableCell"><a href="aggiungiSoldi.html">Aggiungi Denaro </a></div>
               <div class="divTableCell"><a href="libriinVenditaLogged.php">Visualizza Libri  in Vendita </a></div>
                <div class="divTableCell"><a href="chiSiamoStudentiHome.php">Chi Siamo ? </a></div>
                  <div class="divTableCell"><a href="cambiaPasswordStudente.php">Cambia password dell'account </a></div>
                    <div class="divTableCell"><a href="logoutStudenti.php">Esci dall'account </a></div>
                    </div>
                    </div>
                    </div>
                    </center>
    
    </center>
    <br><br>
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
session_start();
  $dataI=$_POST['dataI'];
$dataF=$_POST['dataF'];
echo "<br>";

echo "<center>";
echo "<h2>";
echo "Per tornare indietro ";
echo "<a href=homeStudente.php>clicca qui</a>";
echo "</center>";
echo "</h2>";
$query="SELECT  studenti.Nome,sum(libri.Prezzo) as Guadagno
FROM interazioni INNER JOIN studenti
ON interazioni.Studente = studenti.ID
INNER JOIN libri
ON interazioni.Libro = libri.ID
WHERE Vende='n' AND DataAcquisto BETWEEN  '$dataI' AND '$dataF'
GROUP BY studenti.Nome"; 
$result=$conne->query($query);
echo "<center>";
echo "<h1>";
echo "GUADAGNI DI OGNI  STUDENTE VENDITORE";
echo "</h1>";
echo "</center>";
echo "<br>";

?>

<center>
      <table table width="1000" lenght="200" align="center"
      border="2">
      <tr>
      <td bgcolor="olive"><h3 ><center> NOME </h3></td>
      <td bgcolor="olive"><h3 ><center> GUADAGNO </h3></td>
    
      
      </tr>
      <?php
      echo '<br />';

      foreach($result as $row){?>
        <tr>
        <td bgcolor="gainsboro"><h3 ><center><?php echo $row['Nome'];
        ?></h3></td>
        <td bgcolor="gainsboro"><h3 ><center><?php echo $row['Guadagno'];
        ?></h3></td>
      

        <?php
        }
        


?>



</body>


</html>