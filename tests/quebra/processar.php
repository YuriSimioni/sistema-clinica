<?php
// Conectar ao banco de dados
$host = 'localhost';
$user = 'usuario';
$password = 'senha';
$database = 'meu_banco';

$conn = new mysqli($host, $user, $password, $database);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Pegar o texto do textarea
$comentario = $_POST['comentario'];

// Escapar caracteres especiais para evitar SQL Injection
$comentario = $conn->real_escape_string($comentario);

// Inserir o comentário no banco de dados
$sql = "INSERT INTO comentarios (comentario) VALUES ('$comentario')";

if ($conn->query($sql) === TRUE) {
    echo "Comentário enviado com sucesso!";
} else {
    echo "Erro: " . $conn->error;
}

$conn->close();
?>
