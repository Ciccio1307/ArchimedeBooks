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

$email = $_POST['email'];
$pass = md5($_POST['pwd']);

$query = "SELECT * FROM studenti where Email='$email' and Pass='$pass'" ;
$result=$conne->query($query);
$colonna = $conne->query($query)->fetchColumn(0);
if ($colonna <> "") {
echo "<center>";
echo "<h1>";
echo "ACCESSO ESEGUITO";
session_start();
echo "<br>";
echo "<br>";?>
<img src="check.png"  width="150" height="150" />
<br>

<br>
<img src="Reload-1s-200px.gif"  width="50" height="50" />
<br>
<?php
echo "</center>";
$query = "SELECT ID,Email FROM studenti";
$result=$conne->query($query);
foreach($result as $row)
{
if($row['Email'] == $email)
$s= $row['ID'];
}
setcookie('studente' , $s,time()+3600);
header("refresh:3;url=homeStudente.php");


echo "</center>";
}
else
{
echo "<center>";
echo "<h1>";
echo "NOME UTENTE O PASSWORD ERRATI";
echo "</h1>";
echo "<br>";
?>
<img src="cancel.png"    width="150" height="150"/>
<br>
<?php
echo "<br>";
echo "<br>";

echo "Riprova : ";
echo "<a href=effettuaLoginStudenti.html>clicca qui</a>";
echo "</center>";
echo "Non hai un account? ";
echo "<a href=registrazioneStudente.html>clicca qui</a>";
echo "</center>";
}





?>


</body>


</html>