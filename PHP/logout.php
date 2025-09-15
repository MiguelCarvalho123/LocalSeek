<?php

session_start(); // Inicia a sessão
session_unset(); 
session_destroy(); // Destrói a sessão

header("Location: ../loginPage.html");
exit();
?>