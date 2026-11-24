
<?php
session_start();

// Menghapus seluruh data session
$_SESSION = [];

session_destroy();

// Menghapus cookie petugas
setcookie('petugas', '', [
    'expires' => time() - 3600,
    'path' => '/',
    'httponly' => true,
    'samesite' => 'Lax'
]);

header("Location: index.php");
exit;
?>
