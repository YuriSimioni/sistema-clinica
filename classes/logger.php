<?php

class Logger {

    private $logVisible = true; // Habilita e desabilita os LOGS


    function debugLog($message, $level = 'INFO') {
        if($this->logVisible == true) {
            $logFile = '../../logs/debug.log';
            $timestamp = date("Y-m-d H:i:s");
            $logMessage = "[$timestamp] [$level] - $message" . PHP_EOL;
            
            // Abre o arquivo de log no modo append
            $file = fopen($logFile, 'a');
            
            if ($file) {
                fwrite($file, $logMessage);
                fclose($file);
            }
        }
    }
    function acessSystemLog($message, $level = 'INFO') {
        if($this->logVisible == true) {
            $logFile = '../../logs/acess_system.log';
            $timestamp = date("Y-m-d H:i:s");
            $logMessage = "[$timestamp] [$level] - $message" . PHP_EOL;
            
            // Abre o arquivo de log no modo append
            $file = fopen($logFile, 'a');
            
            if ($file) {
                fwrite($file, $logMessage);
                fclose($file);
            }
        }
    }
    function errorLog($message, $level = 'INFO') {
        if($this->logVisible == true) {
            $logFile = '../../logs/error.log';
            $timestamp = date("Y-m-d H:i:s");
            $logMessage = "[$timestamp] [$level] - $message" . PHP_EOL;
            
            // Abre o arquivo de log no modo append
            $file = fopen($logFile, 'a');
            
            if ($file) {
                fwrite($file, $logMessage);
                fclose($file);
            }
        }
    }
    function systemLog($message, $level = 'INFO') {
        if($this->logVisible == true) {
            $logFile = '../../logs/system.log';
            $timestamp = date("Y-m-d H:i:s");
            $logMessage = "[$timestamp] [$level] - $message" . PHP_EOL;
            
            // Abre o arquivo de log no modo append
            $file = fopen($logFile, 'a');
            
            if ($file) {
                fwrite($file, $logMessage);
                fclose($file);
            }
        }
    }
}