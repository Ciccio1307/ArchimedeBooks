<html>
<head>
    <title>VisualizzaLibriInVendita</title>
    <link rel="stylesheet" href="cssElaborato.css">


</head>
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
        face="impact">Archimede Books<br>LISTA LIBRI IN VENDITA 
      </center> <center> <img src="logo.PNG"  width="250" height="150">
    </h1><hr
        style="height:3px;border:none;color:#000000;background-color:#000000;">
      
        
        <center>
            

                <marquee >Istituto Tecnico "Archimede"
                    Esame di Stato 2021  Francesco Virzi 5C INFORMATICA AS 2020/21</marquee>
                <div class="divTable blueTable">
                    <div class="divTableBody">
                    <div class="divTableRow">
                    <div class="divTableCell"><a href="effettuaLoginStudenti.html">Effettua il Login nel Database studenti</a></div>
                    <div class="divTableCell"><a href="registrazioneStudente.html">Registrati al nostro Database studenti </a></div>
                    <div class="divTableCell"><a href="chiSiamoStudenti.html">Chi Siamo ? </a></div>
                    </div>
                    </div>
                
                    </div>

                    <font face="impact">
                    <BR><BR>
                       <BR>
                <center>
                  <img src="Deus_Books.png" width="150" height="150" >
                  </center>
                  <br><br>
                <BR>
<?php
$username = 'root';
$password = '';
$conn=new PDO('mysql:host=localhost;dbname=my_ciccio1307', $username,
$password);

  $sql = "SELECT libri.ISBN ,libri.Materia ,libri.Titolo ,libri.CasaEditrice ,libri.AnnoPubblicazione,libri.Prezzo
  FROM interazioni INNER JOIN libri 
  ON interazioni.Libro=libri.ID 
  WHERE Vende='s' ";
      $rs=$conn->query($sql);
      ?>

      <center>
      <table table width="1000" lenght="200" align="center"
      border="2">
      <tr>
      <td bgcolor="olive"><h3 ><center> ISBN </h3></td>
      <td bgcolor="olive"><h3 ><center> TITOLO </h3></td>
      <td bgcolor="olive"><h3 ><center> CASA EDITRICE </h3></td>
      <td bgcolor="olive"><h3 ><center> ANNO PUBBLICAZIONE </h3></td>
      <td bgcolor="olive"><h3 ><center> MATERIA </h3></td>
      <td bgcolor="olive"><h3 ><center> PREZZO </h3></td>
      
      </tr>
      <?php
      echo '<br />';

      foreach($rs as $row){?>
        <tr>
        <td bgcolor="gainsboro"><h3 ><center><?php echo $row['ISBN'];
        ?></h3></td>
        <td bgcolor="gainsboro"><h3 ><center><?php echo $row['Titolo'];
        ?></h3></td>
        <td bgcolor="gainsboro"><h3 ><center><?php echo $row['CasaEditrice'];
        ?>
         <td bgcolor="gainsboro"><h3 ><center><?php echo $row['AnnoPubblicazione'];
        ?>
        <td bgcolor="gainsboro"><h3 ><center><?php echo $row['Materia'];
        ?>
        <td bgcolor="gainsboro"><h3 ><center><?php echo $row['Prezzo']. " € ";
        ?>
      
        
        <?php
        }
        ?>
</table>
<br><br>
</body>


</html>