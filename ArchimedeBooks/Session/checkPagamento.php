<html>
<head><link rel="stylesheet" href="cssElaborato.css">
    <title>CheckPagamento</title></head></head>
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
            Esame di Stato 2021  Francesco Virzi 5C INFORMATICA AS 2020/21</marquee>
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
            </div>
            <br>
                <BR>
            </center>

                    <font face="impact">
<?php
$username = 'root';
$password = '';
$conn=new PDO('mysql:host=localhost;dbname=my_ciccio1307');
session_start();
$id=$_COOKIE['studente'];

echo "<center>";
echo "<h1>";
?> 
 <center>
                  <img src="sell.png" width="150" height="150" >
                  </center>
                  <br>
<?php
echo "LIBRI MESSI IN VENDITA ";

$query = "SELECT libri.Titolo ,libri.ISBN ,libri.Materia ,libri.Prezzo 
FROM  interazioni INNER JOIN libri
ON interazioni.Libro=libri.ID
WHERE interazioni.Studente!='$id' AND interazioni.Vende='s' ";
$result=$conn->query($query);
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
      
      </tr>
      <?php
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
        
      
        
        <?php
        }
        ?>
</table>
<br><br>
<center>
<BR>
               
<fieldset>
<h2>QUALE VORRESTI PRENOTARE ?</h2>
<h3>Compila i seguenti dati per la prenotazione del libro che vedi nella tabella </h3>

     

<form action="acquistoStudente.php" method="post">

<table>
<h2><small>
<table><tr><td>
 <label for="book">Libro:</label></td>
<td>
<select name='scelta'>
      <option value="*">Scegli il libro desiderato</option>
      </center>
      </h2>
<?php

$query = "SELECT libri.ID,libri.Titolo ,libri.ISBN ,libri.Prezzo 
FROM  interazioni INNER JOIN libri
ON interazioni.Libro=libri.ID
WHERE interazioni.Studente!='$id' AND interazioni.Vende='s' ";
$result=$conn->query($query);

foreach($result as $row){
  echo "<option value='" . $row['ID'] . "' >" . $row['Titolo'] . " - ".$row['ISBN']. " - ".$row['Prezzo'].' € '.    "</option>";

}
echo '</select>';
?>
</td>
</tr>
<tr>
<td>
 <label for="datea">Data di acquisto:</label></td><td> <input type="date" required name="dataA"   size="10" ></td>
</tr>
</table>
<center><br><input type="submit" id="esecuzione" value="PRENOTA"> <input type ="reset" value="ANNULLA" id="pulsante" onclick="Annulla() "/> </center>
 </fieldset>

      </form>
     





</body>
</html>