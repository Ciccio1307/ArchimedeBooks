<html>
<head><title>InterrogazioneSuperUser</title>
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
        <?php
        session_start();
        ?>
        <h1><center><font
        face="impact">Archimede Books <br>ACCOUNT SuperUser-Interrogazione 2
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
    
    <center><h2>Interrogazione</h2></center>
    <center><h3>Inserisci il periodo in cui sono stati venduti i libri</h3></center>
    <fieldset>
      <center>
    <form action="interrogazione2.php" method="post">
    Data Inizio <input type="date" name="dataI">
    <br>
    <br>
    Data Fine <input type="date" name="dataF">
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