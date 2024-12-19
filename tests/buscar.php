<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obtenha o valor da pesquisa (query) enviado via GET
$query = isset($_GET['query']) ? $_GET['query'] : '';

// Preparar a consulta SQL
$sql = "SELECT id, login FROM usuarios WHERE login LIKE '%$query%' LIMIT 10";  // Limite de 10 resultados
$result = $conn->query($sql);

// Armazenar os resultados em um array
$options = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $options[] = ['id' => $row['id'], 'login' => $row['login']];
    }
}

// Retornar os dados em formato JSON
echo json_encode($options);

$conn->close();
?>
