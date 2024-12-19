<?php

class BancoDeDados {
    private $host = "localhost"; // HOST do Banco de Dados
    private $user = "root";      // USUARIO do Banco de Dados
    private $pass = "";          // SENHA do Banco de Dados
    private $bd = "zemail";    // NOME DO BANCO no Banco de Dados
    
    private $pdo;          // Variável GLOBAL para a Conexão com o Banco de Dados
    public $msgErro = ""; // Variável para Mensagem de Erro Caso Ocorra
    
    public function Conectar() { // Função Para Testar a Conexão com o Banco de Dados
        
        // Chamando os Atributos
        global $pdo;
        global $msgErro;

        
        try { // Caso a Conexão Funcione
        
            $pdo = new PDO("mysql:dbname=".$this->bd.";host=".$this->host, $this->user, $this->pass); // Testando a Conexão
            return true; // Conexão foi Realizada com Sucesso
        
        } catch (PDOException $e) { // Senão
        
            $msgErro = $e->getMessage(); // Mensagem de Erro
            return false; // Conexão falhou
        
        }
    }
}