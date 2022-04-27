<html>
 <head><title>AcquistoStudente</title>
        <link rel="stylesheet" href="cssElaborato.css"></head>   
<body>
    <script type ="text/javascript">
            function Annulla()
                {
                 window.location.reload();
            
                }
                function showPwd() {
                var input = document.getElementById('pwd');
                if (input.type === "password") {
                  input.type = "text";
                } else {
                  input.type = "password";
                }
                }
                function showPwd2() {
                var input = document.getElementById('pwd2');
                if (input.type === "password") {
                  input.type = "text";
                } else {
                  input.type = "password";
                }
              }
            </script>
            <h1><center><font
        face="impact">Archimede Books<br>FASE D'ACQUISTO
      </center> <center> <img src="logo.PNG"  width="250" height="150">
    </h1><hr
        style="height:3px;border:none;color:#000000;background-color:#000000;">
      
        
        <center>
            

        <marquee >Istituto Tecnico "Archimede"
            Esame di Stato 2021  Francesco Virzi 5C INFORMATICA AS 2020/21</marquee>                  <br>              <br>
        <div class="divTable blueTable">
            <div class="divTableBody">
            <div class="divTableRow">
            <div class="divTableCell"><a href="homeStudente.php">Home Account</a></div>
            <div class="divTableCell"><a href="vendiLibro.html">Vendi un Libro</a></div>
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
            
            
            <font face="impact">
<?php
$username = 'root';
$password = '';
  


    $StrConnessione = 'mysql:host=localhost;dbname=my_ciccio1307';

                try {
                    $conn = new PDO($StrConnessione, $username, $password);
                } catch (PDOException $e) {
                    echo 'Attenzione: ' . $e->getMessage();
                }
session_start();
$idStudente=$_COOKIE['studente'];
$scelta=$_POST['scelta'];
$dataA=$_POST['dataA'];
$l = '';
$s = '';
$pV =  0 ;
$idV = 0 ;
$p = 0 ;
$query = "SELECT Portafoglio FROM studenti 

 WHERE ID='$idStudente' ";
$result=$conn->query($query);
foreach($result as $row)
{
$portafoglio=$row['Portafoglio'];
}


$query = "SELECT interazioni.Libro,interazioni.Studente,libri.Prezzo 
FROM  interazioni INNER JOIN libri
ON interazioni.Libro=libri.ID
WHERE libri.ID='$scelta' AND interazioni.Vende='s'  ";
$result=$conn->query($query);
foreach($result as $row)
{
  $l = $row['Libro'];
  $s = $row['Studente'];
$p = $row['Prezzo'];
}

if($idStudente==$s)
{
    echo "<center>";
    echo "<h2>";
    echo "NON PUOI ACQUISTARE UN TUO STESSO LIBRO";
    echo "</h2>";
    echo "<br>";
    ?>
<img src="cancel.png"    width="150" height="150"/>
<br>
<?php
    echo "<br>";
  echo "<br>";
  echo "<center>";
  echo "<br>";
  echo "<br>";
  echo "<h2>";
  die("Ritorno alla Home Studente in corso...." ."refresh:3;url=homeStudente.php ");
  
}
if($portafoglio<$p)
{
    
    echo "<center>";
    echo "<h2>";
    echo "DENARO INSUFFICIENTE PER L'ACQUISTO!";
    echo "</h2>";
    echo "<br>";
    ?>
<img src="cancel.png"    width="150" height="150"/>
<br>
<?php
    echo "<br>";
  echo "<br>";
       echo "<center>";
echo "<h2>";
echo "Ritorno alla Home Studente in corso....";
                 die(header("refresh:3;url=homeStudente.php"));
}
$query = "INSERT INTO interazioni (Studente,Libro,Vende,DataAcquisto)
VALUES ('$idStudente','$l','a','$dataA')";
if($conn->query($query)){
    echo "<center>";
    echo "<h2>";
    echo "LIBRO DA ACQUISTARE  CON SUCCESSO!";
    echo "</h2>";
    ?>
<img src="check.png"  width="150" height="150" />
<br>

<br>
<img src="Reload-1s-200px.gif"  width="50" height="50" />
<br>
<?php
    echo "<br>";
    echo "<br>";
  echo "<br>";
  echo "<center>";


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
  echo "<br>";
  echo "Vuoi riprovare? ";
  echo "<a href=checkPagamento.php>clicca qui</a>";
  }

$query="UPDATE interazioni SET Vende='n', DataAcquisto='$dataA' WHERE Libro='$l'AND Vende!='a' ";
$result=$conn->query($query);

$portafoglio=$portafoglio-$p;
        $query="UPDATE studenti SET Portafoglio='$portafoglio' WHERE ID='$idStudente' ";

    if($conn->query($query)){
        echo "<center>";
      }
      else
      {
        echo "<br>";
        ?>
<img src="cancel.png"    width="150" height="150"/>
<br>
<?php
      echo "ERRORE VARIAZIONE PORTAFOGLIO D'ACQUISTO "." <br> ".$query." <br> ";
      echo "Vuoi riprovare? ";
      echo "<a href=checkPagamento.php>clicca qui</a>";
      echo "</h1>";
      echo "</center>";  
    
    }
    
        $query="SELECT studenti.Portafoglio,interazioni.Studente
         FROM interazioni INNER JOIN studenti
        ON interazioni.Studente=studenti.ID
        INNER JOIN libri 
        ON interazioni.Libro=libri.ID
         WHERE interazioni.Vende='n'  AND libri.ISBN='$isbn'";
         $result=$conn->query($query);
         echo "<br>";
         foreach($result as $row)
         {
         $pV=$row['Portafoglio'];
         $idV=$row['Studente'];
         }
         $pV=$pV+$p;
         $query="UPDATE studenti SET Portafoglio='$pV' WHERE ID='$idV' ";
         
             if($conn->query($query)){
                 echo "<center>";
                 echo "<h2>";
                 echo "<h2>";
                 echo "Ritorno alla Home Studente in corso...";
                 echo "</h2>";
                 header("refresh:3;url=homeStudente.php");
               }
               else
               {
                 echo "<br>";
                 ?>
<img src="cancel.png"    width="150" height="150"/>
<br>
<?php echo "<br>";
               echo "ERRORE VARIAZIONE PORTAFOGLIO D'ACQUISTO "." <br> ".$query." <br> ";
               echo "Vuoi riprovare? ";
        echo "<a href=checkPagamento.php>clicca qui</a>";
        echo "</center>";
       
               ?>
        <?php }
    
          ?>
          
          
          <br><br>

</body>
</html>