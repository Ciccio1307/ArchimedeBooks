<html>
<head>
<?php
session_start();
?>
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
                    </center>
    
    </center>
    <br><br>
     <center>
                  <img src="padlock.png" width="150" height="150" >
                  </center>
                  <br><br>
    <fieldset>
    <center><h2>Login</h2></center>
<center><h3>Riempia i campi richiesti per effettuare il cambio Password</h3></center>

  <center>
<form action="cambiaPassStudente.php" method="post">
<table><tr>
<td><label for="email">Email</label> </td>
<td><input type="text" name="Email"> </td>
</tr>
<tr>
<td>
<label for="pasw">Password precendente</label></td>
<td><INPUT TYPE="password"  name="pwd" id="pwd"></td>
   <td> <input type="button" id="pass" onclick="showPwd()" value="Mostra/nascondi password"><td>
 </tr><tr><td>
    <label for="pasw2">Nuova Password</label></td>
    <td>
<INPUT TYPE="password"  name="pwd2" id="pwd2"></td>
   <td> <input type="button" id="pass" onclick="showPwd2()" value="Mostra/nascondi password"></td>
 </tr>
 </table>

<center><br><input type="submit" id="esecuzione" value="CAMBIA"> <input type ="reset" value="ANNULLA" id="pulsante" onclick="Annulla() "/> </center></center>
</form>
</center>
</fieldset>

</body>



</html>