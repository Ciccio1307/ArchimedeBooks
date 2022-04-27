<html>
<head>
    <link rel="stylesheet" href="cssElaborato.css">
<title>CambiaPasswordStudente</title> 
</head>
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
        face="impact">Archimede Books <br>CAMBIO PASSWORD ACCOUNT STUDENTE
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
                    <div class="divTableCell"><a href="homeStudente.php">Home</a></div>
                    <div class="divTableCell"><a href="vendiLibro.html">Vendi un Libro</a></div>
                    <div class="divTableCell"><a href="aggiungiSoldi.html">Aggiungi Denaro </a></div>
                      <div class="divTableCell"><a href="libriinVenditaLogged.php">Visualizza Libri  in Vendita </a></div>
                <div class="divTableCell"><a href="chiSiamoStudentiHome.php">Chi Siamo ? </a></div>
                    <div class="divTableCell"><a href="checkPagamento.php">Compra un Libro</a></div>
                    <div class="divTableCell"><a href="cambiaPasswordStudente.php">Cambia password dell'account </a></div>
                    <div class="divTableCell"><a href="logoutStudenti.php">Esci dall'account </a></div>
                    </div>
                    </div>
                    </div>
                    <br>
                <BR>
                    </center>
    
    </center>
    <br><br>
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
  $id=$_COOKIE['studente'];
  
  $query = "SELECT Email FROM studenti WHERE ID='$id' ";
$result=$conne->query($query);
foreach($result as $row)
{
    $e = $row['Email'];

}

    $StrConnessione = 'mysql:host=localhost;dbname=my_ciccio1307';

                try {
                    $conne = new PDO($StrConnessione, $username, $password);
                } catch (PDOException $e) {
                    echo 'Attenzione: ' . $e->getMessage();
                }
$email = $_POST['Email'];
$pass = md5($_POST['pwd']);
$pass2 = md5($_POST['pwd2']);

if ($e!=$email)
{
 echo "<center>";
echo " NON HAI INSERITO LA TUA EMAIL PERSONALE ";
echo "<br>";
echo "<br>";
 echo "<center>";
?>
 
<img src="cancel.png"    width="150" height="150"/>
<br>
<?php
echo "<br>";
die("Riprova " ."<a href=cambiaPasswordStudente.php>clicca qui</a>");

}
if($pass==$pass2)
{
 echo "<center>";
   echo " HAI RIDIGITATO  LA STESSA PASSWORD, RITORNA ALLA SCHERMATA DEL CAMBIO PASSWORD ";
echo "<br>";
echo "<br>";
?>
<img src="cancel.png"    width="150" height="150"/>
<br>
<?php
echo "<br>";
echo "<br>";
die("Riprova " ."<a href=cambiaPasswordStudente.php>clicca qui</a>");


}
$query = "SELECT * FROM studenti where Email='$email' and Pass='$pass'" ;
$result=$conne->query($query);
$colonna = $conne->query($query)->fetchColumn(0);
$query="UPDATE studenti SET Pass='$pass2' WHERE Email='$email' ";
if ($colonna <> "") {
if($conne->query($query)){
    echo "<center>";
    echo "<h2>";
    echo "CAMBIO PASSWORD COMPLETATA CON SUCCESSO!";
    echo "<br>";
echo "<br>";
    ?>
    <img src="check.png"  width="150" height="150" />
<br>

<br>
<img src="Reload-1s-200px.gif"  width="50" height="50" />
<br>
    
    <?php
   echo "<h2>";
                 echo "Ritorno alla Home Studente in corso...";
                 echo "</h2>";
                 header("refresh:3;url=homeStudente.php");

  }
  else
  {
    echo "<br>";
  echo "ERRORE CAMBIO PASSWORD "." <br> ".$query." <br> ";
  }
}else{
    echo "<center>";
    echo "<h1>";
    echo "NOME UTENTE O PASSWORD NON TROVATI";
    echo "</h1>";
    ?>
<img src="cancel.png"    width="150" height="150"/>
<br>
<?php
    echo "<br>";
    echo "Vuoi riprovare? ";
    echo "<br>";
    die("Riprova " ."<a href=cambiaPasswordStudente.php>clicca qui</a>");
    
    }

?>
</body>
</html>