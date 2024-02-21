<?php
// Inicie a sessão (se já não estiver iniciada)
session_start();

// Destrua todas as variáveis de sessão
session_unset();

// Destrua a sessão
session_destroy();

// Redirecione para a página de login ou qualquer outra página de sua escolha
header("Location: http://localhost/Work-tattoo/Home.html");
exit();
?>
