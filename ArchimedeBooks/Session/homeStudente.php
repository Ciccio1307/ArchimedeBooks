<html>
<head>
<title>homeStudente</title>
        <link rel="stylesheet" href="cssElaborato.css">
</head>
<body>

<h1><center><font
    face="impact">Archimede Books <br>ACCOUNT PERSONALE
  </center> <center> <img src="logo.PNG"  width="250" height="150">
</h1><hr
    style="height:3px;border:none;color:#000000;background-color:#000000;">
  
    
    <center>
        

        
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
    <br>
                <BR>
</center>
<br><br>

    <?php
session_start();

$id=$_COOKIE['studente'];
$username = 'root';
$password = '';
  


    $StrConnessione = 'mysql:host=localhost;dbname=my_ciccio1307';

                try {
                    $conne = new PDO($StrConnessione, $username, $password);
                } catch (PDOException $e) {
                    echo 'Attenzione: ' . $e->getMessage();
                }
$query = "SELECT Nome,Cognome,Portafoglio,Email FROM studenti WHERE ID=$id ";
$result=$conne->query($query);
foreach($result as $row)
{
if($row['Email']=='superUser@gmail.com' || $row['Email']=='danielaVetri@gmail.com')
{
    echo "<center>";
    echo "<h1>";
    echo "BENVENUTO  ". $row['Nome'];
    echo"<br>";
    echo "</h1>";
    echo "<h2>";
    echo "Scelga quale interrogazione effettuare ...  ";
    echo"<br>";
   
echo "Totale dei libri venduti di un determinato venditore ";
echo "<a href=interrogazione1First.php>clicca qui</a>";
echo"<br>";
echo "Totale dei libri venduti in un determinato periodo ";
echo "<a href=interrogazione2First.php>clicca qui</a>";
echo"<br>";
echo "Nomi e numeri telefoni dei proprietari dei libri invenduti ";
echo "<a href=interrogazione3.php>clicca qui</a>";
echo"<br>";
echo "Guadagno venditori ";
echo "<a href=fromGuadagno.php>clicca qui</a>";
echo"<br>";

}else{


    echo "<text-align:left>";
    echo "<h1>";
    echo "Nome studente : ". $row['Nome'];
    echo"<br>";
    echo "<h1>";
    echo "Cognome studente : ". $row['Cognome'];
    echo"<br>";
    echo"<br>";
    if($row['Portafoglio']=="")
    {
        echo "Saldo Portafoglio : 0 "." euro ";
        echo"<br>";
    }else{
    echo "Saldo Portafoglio : ". $row['Portafoglio']." euro ";
    echo"<br>";
    }
    echo "</text-align>";

echo "<center>";
echo "<h1>";
echo "LIBRI MESSI IN VENDITA DA TE";

$query = "SELECT libri.Titolo ,libri.ISBN ,libri.Materia ,libri.Prezzo,Vende 
FROM  interazioni INNER JOIN libri
ON interazioni.Libro=libri.ID
 WHERE studente=$id AND interazioni.Vende!='a'"; 
$result=$conne->query($query);
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
      <td bgcolor="olive"><h3 ><center> STATO </h3></td>
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
          <td bgcolor="gainsboro"><h3 ><center><?php if($row['Vende']=='s'){
              echo "IN VENDITA";}
              if($row['Vende']=='n'){echo "VENDUTO";
            }
        ?>
       
        
        
      
        
        <?php
        }
        ?>
</table>
<br><br>
<?php
echo "<center>";

echo "LIBRI ACQUISTATI DA TE";

$query = "SELECT libri.Titolo ,libri.ISBN ,libri.Materia ,libri.Prezzo ,DataAcquisto
FROM  interazioni INNER JOIN libri
ON interazioni.Libro=libri.ID
 WHERE studente=$id AND interazioni.Vende='a' ";
$result=$conne->query($query);
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
      <td bgcolor="olive"><h3 ><center> DATA ACQUISTO </h3></td>
      
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
        <td bgcolor="gainsboro"><h3 ><center><?php echo $row['DataAcquisto'];
        ?>
        
      
        
        <?php
      }
      }
        }
        ?>
        
</table>
<br><br>
    <marquee >Istituto Tecnico "Archimede"
                Esame di Stato 2021  Francesco Virzi 5C INFORMATICA AS 2020/21</marquee>
</body>



</html>