<html>
<head> <link rel="stylesheet" href="cssElaborato.css">
    <title>LogoutStudenti</title></head>
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
face="impact">Archimede Books<br>LOGOUT AL NOSTRO DATABASE STUDENTI</center><center> <img src="logo.PNG"  width="250" height="150"></h1><hr
style="height:3px;border:none;color:#000000;background-color:#000000;">
<center>
<marquee >Istituto Tecnico "Archimede"
        Esame di Stato 2021  Francesco Virzi 5C INFORMATICA AS 2020/21</marquee>
        <div class="divTable blueTable">
                    <div class="divTableBody">
                    <div class="divTableRow">
                    <div class="divTableCell"><a href="homeStudente.php">Home</a></div>
                    <div class="divTableCell"><a href="vendiLibro.html">Vendi un Libro</a></div>
                    <div class="divTableCell"><a href="libriInVendita.php">Visualizza Libri  in Vendita </a></div>
                    <div class="divTableCell"><a href="chiSiamoStudenti.html">Chi Siamo ? </a></div>
                    <div class="divTableCell"><a href="checkPagamento.php">Prenota un Libro</a></div>
                    <div class="divTableCell"><a href="logoutStudenti.php">Esci dall'account </a></div>
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
$conne=new PDO('mysql:host=localhost;dbname=my_ciccio1307');

echo "<center>";

?>
       <img src="bye.png" width="150" height="150" >
<?php
echo "<h1>";
echo "LOGOUT EFFETTUATO , A PRESTO ";
echo "<br>";

echo "</h1>";
echo "<h3>";
echo "<center>";
echo ' <center>';

session_unset();


header("refresh:3;url=homeNuovoUtente.html");

?>


<br><br>
<center><img src="Reload-1s-200px.gif" alt="loandig"  width="250" /></center>





</body>
</html>