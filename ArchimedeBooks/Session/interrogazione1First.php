<html>
    <head><title>InterrogazioneSuperUser</title>
        <link rel="stylesheet" href="cssElaborato.css"></head>
    <body>
        <?php
        session_start();
        ?>
        <h1><center><font
        face="impact">Archimede Books <br>ACCOUNT SuperUser-Interrogazione 1
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

$id=$_COOKIE['studente'];
$username = 'root';
$password = '';
$conne=new PDO('mysql:host=localhost;dbname=my_ciccio1307');
$scelta='';
    $query="SELECT Nome,Cognome,Telefono,Portafoglio,Email from studenti WHERE Email!='superUser@gmail.com' "; 
$result=$conne->query($query);

?>
<center>
      <table table width="500" lenght="100" align="center"
      border="2">
      <tr>
      <td bgcolor="olive"><h3 ><center> NOME </h3></td>
      <td bgcolor="olive"><h3 ><center> COGNOME </h3></td>
      <td bgcolor="olive"><h3 ><center> TELEFONO</h3></td>
      <td bgcolor="olive"><h3 ><center> PORTAFOGLIO </h3></td>
      <td bgcolor="olive"><h3 ><center> EMAIL </h3></td>
      </tr>
      <?php
      echo '<br />';

      foreach($result as $row){?>
        <tr>
        <td bgcolor="gainsboro"><h3 ><center><?php echo $row['Nome'];
        ?></h3></td>
        <td bgcolor="gainsboro"><h3 ><center><?php echo $row['Cognome'];
        ?></h3></td>
        <td bgcolor="gainsboro"><h3 ><center><?php echo $row['Telefono'];
        ?>
         <td bgcolor="gainsboro"><h3 ><center><?php if($row['Portafoglio']=="")
    {
        echo " 0 ";
        
    }else{ echo $row['Portafoglio'];}
        ?>
          <td bgcolor="gainsboro"><h3 ><center><?php echo $row['Email'];
        ?>
        
      <?php
      }
      ?>
      <BR>
      <BR><BR>
      </table>
     <center><h2>Interrogazione</h2></center>
    <center><h3>Scegli lo studente da cui vedere quanti libri ha venduto</h3></center>
    <fieldset>
      <center>
    <form action="interrogazione1.php" method="post">
    <select name='scelta'>
      <option value="*">*</option>
  <?php
  
  $query="SELECT ID,Nome,Cognome,Telefono,Portafoglio,Email from studenti WHERE Email!='superUser@gmail.com' "; 
  $result=$conne->query($query);
 foreach ($result as $row) {
 
    echo "<option value='" . $row['ID'] . "' >" . $row['Nome'] . " - ".$row['Cognome']. " - ".$row['Email'].    "</option>";

                        echo "<br>";
                    }
 
?>
 </select>
    <br>
    <br>
    <center><br><input type="submit" id="esecuzione" value="INTERROGA"> <input type ="reset" value="ANNULLA" id="pulsante" onclick="Annulla() "/> </center></center>
</form>
</center>

</fieldset>
 <br>
 <center>
<h2> Per tornare alla homeStudente <a href=homeStudente.php>clicca qui</a></h2>
</center>
</body>
</html>
