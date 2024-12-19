<?php

require_once "../../classes/logger.php";


class User {

    // Atributos
    private $pdo, $msgErro;

    // Criando Função Para Logar Usuários
    public function Login($username, $password) {

        global $pdo; // Variáveis Globais


        $new_password = hash('sha256', $password);

        $sql = $pdo->prepare("SELECT * FROM `user` WHERE `username` = :u AND `password` = :p"); // Linha de Comando MySqli
        
        // Substituindo Valores
        $sql->bindValue(":u", $username);
        $sql->bindValue(":p", $new_password);
        
        $sql->execute(); // Executando Linha MySqli

        if($sql->rowCount() > 0) { // Verificando se Teve Resposta

            $dados = $sql->fetch(); // Pegando dados em forma de array

            $_SESSION['user'] = $dados; // Colocando array na sessão USUARIO

            $_SESSION['logged'] = true; // Sessao para saber se esta logado
            $Logger = new Logger();
            $Logger->acessSystemLog("Login success USER: '".$username."' ACCESS LEVEL: '[".$_SESSION['user']['access_level']."]' logged in with the IP: '".$_SERVER['REMOTE_ADDR']."'", "SUCCESS");
            
            return true; // Retornou true


        } else {
            $Logger = new Logger();
            $Logger->acessSystemLog("Login attempt, USER: '".$username."', PASSWORD: '".$password."', on IP: '".$_SERVER['REMOTE_ADDR']."'", "WARNING");
            return false; //Retornou False
        }
    }
}