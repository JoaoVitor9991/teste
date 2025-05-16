<?php
// Iniciar a sessão
session_start();

// Destruir a sessão
session_unset();
session_destroy();

// Redirecionar para a página de login
header("Location: login.html?success=Logout realizado com sucesso!");
exit();
?>