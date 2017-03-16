<?php session_start();
//Controlla che l'utente abbia effettuato il login 
if ($_SESSION["user"] == NULL){
    header("Location:/mik_cms/resources/views/login/accedi.php?errore=Non sei autenticato");
    exit;
}
?>
