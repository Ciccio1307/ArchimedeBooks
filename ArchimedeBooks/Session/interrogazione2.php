<html>
<head><title>InterrogazioneSuperUser</title>
        <link rel="stylesheet" href="cssElaborato.css"></head>
        <body>
    <h1><center><font
        face="impact">Archimede Books <br>ACCOUNT SuperUser-Interrogazione 2
      </center> <center> <img src="logo.PNG"  width="250" height="150">
    </h1><hr
        style="height:3px;border:none;color:#000000;background-color:#000000;">
      
        
        <center>
            
    
                <marquee >Istituto Tecnico "Archimede"
                    Esame di Stato 2021  Francesco Virzi 5C INFORMATICA AS 2020/21</marquee>
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

$id=$_COOKIE['studente'];
$username = 'root';
$password = '';
  $dataI=$_POST['dataI'];
$dataF=$_POST['dataF'];


    $StrConnessione = 'mysql:host=localhost;dbname=my_ciccio1307';

                try {
                    $conne = new PDO($StrConnessione, $username, $password);
                } catch (PDOException $e) {
                    echo 'Attenzione: ' . $e->getMessage();
                }
              
$query="SELECT count(*) AS Conteggio
 FROM interazioni INNER JOIN libri
 ON interazioni.Libro = libri.ID
 WHERE  DataAcquisto BETWEEN  '$dataI' AND '$dataF' AND Vende='n'"; 
$result=$conne->query($query);
foreach($result as $row)
{
$cc= $row['Conteggio'];
}
echo "<center>";
echo "<h2>";
echo "NEL PERIODO SCELTO SI SON VENDUTI  ".$cc." LIBRI";
echo "</h2>";
echo "</center>";
echo "<br>";

?>
<center>
      <table table width="1000" lenght="200" align="center"
      border="2">
      <tr>
      <td bgcolor="olive"><h3 ><center> TITOLO </h3></td>
      <td bgcolor="olive"><h3 ><center> ISBN </h3></td>
      <td bgcolor="olive"><h3 ><center> MATERIA</h3></td>
      <td bgcolor="olive"><h3 ><center> PREZZO </h3></td>
       <td bgcolor="olive"><h3 ><center> DATA VENDITA </h3></td>
      </tr>
      <?php
      $query="SELECT Titolo,ISBN,Prezzo,Materia,DataAcquisto
 FROM interazioni INNER JOIN libri
 ON interazioni.Libro = libri.ID 
 WHERE  DataAcquisto BETWEEN  '$dataI' AND '$dataF' AND Vende='a'"; 
$result=$conne->query($query);
      echo '<br />';

      foreach($result as $row){?>
        <tr>
        <td bgcolor="gainsboro"><h3 ><center><?php echo $row['Titolo'];
        ?></h3></td>
        <td bgcolor="gainsboro"><h3 ><center><?php echo $row['ISBN'];
        ?></h3></td>
        <td bgcolor="gainsboro"><h3 ><center><?php echo $row['Materia'];
        ?>
         <td bgcolor="gainsboro"><h3 ><center><?php echo $row['Prezzo']. " € ";
        ?>
         <td bgcolor="gainsboro"><h3 ><center><?php echo $row['DataAcquisto'];
        ?>

        <?php
        }
        

echo "<br>";
echo "<center>";
echo "<h2>";
echo "</table>";
echo "<center>";
echo "<center>";
echo "<h2>";
echo "Per tornare indietro ";
echo "<a href=homeStudente.php>clicca qui</a>";
echo "</center>";
echo "</h2>";
?>



</body>
</html>