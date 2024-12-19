<?php

require_once "../../classes/bancodedados.php";
require_once "../../classes/logger.php";


date_default_timezone_set("America/Sao_Paulo");

session_start();

class Projeto {
    private $nome = "ZEMAIL"; //Nome do Projeto

    public function getNome() { //Função Retorna o Nome do Projeto
        echo $this->nome;
    }

}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </html><link rel="stylesheet" href="../css/root.css">
</head>
<body>
    
</body>
