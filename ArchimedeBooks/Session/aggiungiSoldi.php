<html>
<head> <title>FondiMonetariStudentePhp</title>
        <link rel="stylesheet" href="cssElaborato.css"></head>
    <body>
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
        face="impact">Archimede Books ti da il Benvenuto! <br>REGISTRATI AL NOSTRO SITO PER LIBRI A PREZZO STRACCIATTO !
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
             <div class="divTableCell"><a href="libriinVenditaLogged.php">Visualizza Libri  in Vendita </a></div>
                <div class="divTableCell"><a href="chiSiamoStudentiHome.php">Chi Siamo ? </a></div>
         <div class="divTableCell"><a href="cambiaPasswordStudente.php">Cambia password dell'account </a></div>
            <div class="divTableCell"><a href="logoutStudenti.php">Esci dall'account </a></div>
            </div>
            </div>
            </div>
            </center>
        

            <?php
$$username = 'root';
$password = '';
  


    $StrConnessione = 'mysql:host=localhost;dbname=my_ciccio1307';

                try {
                    $conn = new PDO($StrConnessione, $username, $password);
                } catch (PDOException $e) {
                    echo 'Attenzione: ' . $e->getMessage();
                }

session_start();
$soldi=$_POST["qtd"];
$id=$_COOKIE['studente'];
$query="SELECT Portafoglio FROM studenti WHERE ID=$id";
$result=$conn->query($query);
foreach($result as $row)
{
    $soldi=$row["Portafoglio"]+$soldi;
}
$query = "UPDATE studenti SET Portafoglio='$soldi' WHERE ID='$id'  ";
$result=$conn->query($query);
if($conn->query($query)){
    echo "<center>";
    echo "<h1>";
    echo "INSERIMENTO FONDI PORTAFOGLIO CON SUCCESSO!";
    echo "<br>";
    echo "<br>";
    echo "SALDO ATTUALE ".$soldi." euro ";
    echo "</h1>";
    echo "<br>";
    ?>
<img src="check.png"  width="150" height="150" />
<br>

<br>
<img src="Reload-1s-200px.gif"  width="50" height="50" />
<br>
<?php
    echo "<br>";
    header("refresh:3;url=homeStudente.php");
  }
  else
  {
    echo "<br>";
  echo "ERRORE INSERIMENTO FONDI PORTAFOGLIO "." <br> ".$query." <br> ";
  ?>
  <br>
<img src="cancel.png"    width="150" height="150"/>
<br>
<?php
  }

?>




    </body>
</html>