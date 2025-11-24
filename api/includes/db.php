<?php
function conectarBD() {
    $host = 'localhost';  
    $db   = 'ayuntamiento';
    $user = 'root';       
    $pass = 'alejandro';          
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $opciones = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    try {
        $pdo = new PDO($dsn, $user, $pass, $opciones);
        return $pdo;
    } catch (PDOException $e) {
        echo "Error al conectar a la base de datos: " . $e->getMessage();
        exit;
    }
}

function login($usuario, $password) {
    $pdo = conectarBD();

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :usuario");
    $stmt->execute(['usuario' => $usuario]);
    $usuarioDB = $stmt->fetch();

    if ($usuarioDB) {
        // Compara texto plano
        return trim($usuarioDB['password']) === trim($password);
    }
    return false;
}
?>