<html>
<head>
<link rel="stylesheet" href="cssElaborato.css">
<title>Login</title>
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
        </script>
<h1><center><font
face="impact">Archimede Books<br>ACCESSO AL NOSTRO DATABASE STUDENTI</center><center> <img src="logo.PNG"  width="250" height="150"></h1><hr
style="height:3px;border:none;color:#000000;background-color:#000000;">
<center>
<marquee >Istituto Tecnico "Archimede"
        Esame di Stato 2021  Francesco Virzi 5C INFORMATICA AS 2020/21</marquee>
        <div class="divTable blueTable">
    <div class="divTableBody">
    <div class="divTableRow">
      <div class="divTableCell"><a href="homeNuovoUtente.html">Home</a></div>
    <div class="divTableCell"><a href="registrazioneStudente.html">Registrati come studente nel nuovo database</a></div>
    <div class="divTableCell"><a href="libriInVendita.php">Visualizza Libri  in Vendita </a></div>
                    <div class="divTableCell"><a href="chiSiamoStudenti.html">Chi Siamo ? </a></div>
                    
    </div>
    </div>
    </div>
        <br>
                <BR>
<br><br>

<font face="impact">
<?php

$username = 'root';
$password = '';
  


    $StrConnessione = 'mysql:host=localhost;dbname=my_ciccio1307';

                try {
                    $conne = new PDO($StrConnessione, $username, $password);
                } catch (PDOException $e) {
                    echo 'Attenzione: ' . $e->getMessage();
                }
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$data = $_POST['data'];
$telefono = ($_POST['telefono']);
$genere = ($_POST['genere']);
$email = $_POST['email'];
$pass = md5($_POST['pwd']);
$pass2 = md5($_POST['pwd2']);

if($pass!=$pass2)
{
   echo "NON HAI RIDIGITATO CORRETTAMENTE LA PASSWORD, RITORNA ALLA SCHERMATA DELLA REGISTRAZIONE ";
echo "<br>";
echo "<br>";
?>
<img src="cancel.png"    width="150" height="150"/>
<br>
<?php
echo "<br>";
echo "<br>";
echo "Per tornare alla schermata di registrazione, ";
echo "<a href=creaAccount.html>clicca qui</a>";

}

$userCheck = false;
echo "<h2>";
echo "BENVENUTO ".$nome."  ".$cognome;
echo '<br>';
echo "</h2>";


$query = "SELECT Email FROM studenti";
$result=$conne->query($query);
foreach($result as $row)
{
if($row['Email'] == $email)
$userCheck = true;
}
if($userCheck){
echo "<center>";
echo "<h2>";
echo "Email studente  e' gia' stato utilizzato!";
echo "<br>";
echo "<br>";
?>
<img src="cancel.png"    width="150" height="150"/>
<br>
<?php
echo "<br>";
echo "<br>";
echo "<br>";
echo "Per tornare alla schermata di registrazione, ";
echo "<a href=registrazioneStudente.html>clicca qui</a>";
echo "</h2>";
echo "</center>";
}
else
{
$query = "INSERT INTO studenti (Nome,Cognome,DataNascita,Telefono,Sesso,Email,Pass)
 VALUES ('$nome','$cognome','$data','$telefono','$genere','$email','$pass')";


if($conne->query($query)){
  echo "<center>";
  echo "<h2>";
  echo "REGISTRAZIONE COMPLETATA CON SUCCESSO!";
  echo "</h2>";
  echo "<br>";
  echo "<br>";
echo "<br>";

echo "<h2>";
echo "ORA EFFETTUI IL LOGIN ";
echo "<a href=effettuaLoginStudenti.html>clicca qui</a>";
echo "</h2>";
}
else
{
  echo "<br>";
echo "ERRORE INSERIMENTO RECORD "." <br> ".$query." <br> ";
echo "<br>";
echo "<br>";
?>
<img src="cancel.png"    width="150" height="150"/>
<br>
<?php
echo "<br>";
echo "<br>";
echo "Per tornare alla schermata di registrazione, ";
echo "<a href=registrazioneStudente.html>clicca qui</a>";
}





echo "</center>";


}
?>

    </body>    
<html>