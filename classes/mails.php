<?php

require_once "../../classes/logger.php";


class Mails {

    // Atributos
    private $pdo, $msgErro;

    // Criando Função Para Logar Usuários
    public function getNumberOfMails($id_user) {

        global $pdo; // Variáveis Globais

        // Preparar o comando SQL para buscar e-mails
        $sql = $pdo->prepare("SELECT COUNT(*) FROM mails WHERE receiver = :ui");

        // Substituindo o valor do parâmetro
        $sql->bindValue(":ui", $id_user);

        // Executar a consulta SQL
        $sql->execute();

        // Verificar se algum dado foi retornado
        if ($sql->rowCount() > 0) {
            // Pegar todos os dados em forma de array
            $count = $sql->fetchColumn();

            return $count;
        } else {
            // Retorna false caso não haja registros
            return false;
        }
    }


    public function getNumberOfNewMails($id_user) {

        global $pdo; // Variáveis Globais

        // Preparar o comando SQL para buscar e-mails
        $sql = $pdo->prepare("SELECT COUNT(*) FROM mails WHERE receiver = :ui AND open = 0");

        // Substituindo o valor do parâmetro
        $sql->bindValue(":ui", $id_user);

        // Executar a consulta SQL
        $sql->execute();

        // Verificar se algum dado foi retornado
        if ($sql->rowCount() > 0) {
            // Pegar todos os dados em forma de array
            $count = $sql->fetchColumn();

            return $count;
        } else {
            // Retorna false caso não haja registros
            return false;
        }
    }

    public function getNumberOfTrashMails($id_user) {

        global $pdo; // Variáveis Globais

        // Preparar o comando SQL para buscar e-mails
        $sql = $pdo->prepare("SELECT COUNT(*) FROM mails WHERE receiver = :ui AND trash = 1");

        // Substituindo o valor do parâmetro
        $sql->bindValue(":ui", $id_user);

        // Executar a consulta SQL
        $sql->execute();

        // Verificar se algum dado foi retornado
        if ($sql->rowCount() > 0) {
            // Pegar todos os dados em forma de array
            $count = $sql->fetchColumn();

            return $count;
        } else {
            // Retorna false caso não haja registros
            return false;
        }
    }


    public function getNumberOfOpenMails($id_user) {

        global $pdo; // Variáveis Globais

        // Preparar o comando SQL para buscar e-mails
        $sql = $pdo->prepare("SELECT COUNT(*) FROM mails WHERE receiver = :ui AND open != 0");

        // Substituindo o valor do parâmetro
        $sql->bindValue(":ui", $id_user);

        // Executar a consulta SQL
        $sql->execute();

        // Verificar se algum dado foi retornado
        if ($sql->rowCount() > 0) {
            // Pegar todos os dados em forma de array
            $count = $sql->fetchColumn();

            return $count;
        } else {
            // Retorna false caso não haja registros
            return false;
        }
    }




    public function getNumberOfTypeMails($id_user) {

        global $pdo; // Variáveis Globais

        // Preparar o comando SQL para buscar e-mails
        $sql = $pdo->prepare("SELECT COUNT(*) FROM mails WHERE receiver = :ui AND type = 'Mail'");

        // Substituindo o valor do parâmetro
        $sql->bindValue(":ui", $id_user);

        // Executar a consulta SQL
        $sql->execute();

        // Verificar se algum dado foi retornado
        if ($sql->rowCount() > 0) {
            // Pegar todos os dados em forma de array
            $count = $sql->fetchColumn();

            return $count;
        } else {
            // Retorna false caso não haja registros
            return false;
        }
    }

    public function getNumberOfTypeNotify($id_user) {

        global $pdo; // Variáveis Globais

        // Preparar o comando SQL para buscar e-mails
        $sql = $pdo->prepare("SELECT COUNT(*) FROM mails WHERE receiver = :ui AND type = 'Notify'");

        // Substituindo o valor do parâmetro
        $sql->bindValue(":ui", $id_user);

        // Executar a consulta SQL
        $sql->execute();

        // Verificar se algum dado foi retornado
        if ($sql->rowCount() > 0) {
            // Pegar todos os dados em forma de array
            $count = $sql->fetchColumn();

            return $count;
        } else {
            // Retorna false caso não haja registros
            return false;
        }
    }

    public function getNumberOfTypeWarning($id_user) {

        global $pdo; // Variáveis Globais

        // Preparar o comando SQL para buscar e-mails
        $sql = $pdo->prepare("SELECT COUNT(*) FROM mails WHERE receiver = :ui AND type = 'Warning'");

        // Substituindo o valor do parâmetro
        $sql->bindValue(":ui", $id_user);

        // Executar a consulta SQL
        $sql->execute();

        // Verificar se algum dado foi retornado
        if ($sql->rowCount() > 0) {
            // Pegar todos os dados em forma de array
            $count = $sql->fetchColumn();

            return $count;
        } else {
            // Retorna false caso não haja registros
            return false;
        }
    }

    public function getNumberOfTypeStaff($id_user) {

        global $pdo; // Variáveis Globais

        // Preparar o comando SQL para buscar e-mails
        $sql = $pdo->prepare("SELECT COUNT(*) FROM mails WHERE receiver = :ui AND type = 'Staff'");

        // Substituindo o valor do parâmetro
        $sql->bindValue(":ui", $id_user);

        // Executar a consulta SQL
        $sql->execute();

        // Verificar se algum dado foi retornado
        if ($sql->rowCount() > 0) {
            // Pegar todos os dados em forma de array
            $count = $sql->fetchColumn();

            return $count;
        } else {
            // Retorna false caso não haja registros
            return false;
        }
    }
    
    
    

    
}