<?php

require_once "../../config/config.php";
require_once "../../classes/usuarios.php";

$Logger = new Logger();
$Logger->acessSystemLog("Login page accessed with IP: '".$_SERVER['REMOTE_ADDR']."'", "INFO");

$Projeto = new Projeto();
$BancoDeDados = new BancoDeDados();
$Usuarios = new User();


if(isset($_SESSION["logged"])) {
    header("Location: dashboard.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $Projeto->getNome();?> | Login</title>
    <link rel="stylesheet" href="../css/root.css">
    <link rel="stylesheet" href="../css/index_style.css">
</head>
<body>
    <div id="msg">Login ou Senha Incorretos!</div>
    <form action="" method="post">
        <p id="title"><svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm320-287q5 0 10.5-1.5T501-453l283-177q8-5 12-12.5t4-16.5q0-20-17-30t-35 1L480-520 212-688q-18-11-35-.5T160-659q0 10 4 17.5t12 11.5l283 177q5 3 10.5 4.5T480-447Z"/></svg><?php echo strtoupper($Projeto->getNome())?></p>
        <div class="input-box">
            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M480-480q-66 0-113-47t-47-113q0-66 47-113t113-47q66 0 113 47t47 113q0 66-47 113t-113 47ZM160-160v-112q0-34 17.5-62.5T224-378q62-31 126-46.5T480-440q66 0 130 15.5T736-378q29 15 46.5 43.5T800-272v112H160Z"/></svg>
            <input type="text" name="username" placeholder="Username" class="input" required>
        </div>
        <div class="input-box">
            <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M280-360q50 0 85-35t35-85q0-50-35-85t-85-35q-50 0-85 35t-35 85q0 50 35 85t85 35Zm0 120q-100 0-170-70T40-480q0-100 70-170t170-70q81 0 141.5 46T506-560h335l79 79-140 160-100-79-80 80-80-80h-14q-25 72-87 116t-139 44Z"/></svg>
            <input type="password" name="password"  placeholder="Password" class="input" required>
        </div>
        <label for="btn" class="btn">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M520-120q-17 0-28.5-11.5T480-160q0-17 11.5-28.5T520-200h240v-560H520q-17 0-28.5-11.5T480-800q0-17 11.5-28.5T520-840h240q33 0 56.5 23.5T840-760v560q0 33-23.5 56.5T760-120H520Zm-73-320H160q-17 0-28.5-11.5T120-480q0-17 11.5-28.5T160-520h287l-75-75q-11-11-11-27t11-28q11-12 28-12.5t29 11.5l143 143q12 12 12 28t-12 28L429-309q-12 12-28.5 11.5T372-310q-11-12-10.5-28.5T373-366l74-74Z"/></svg>
            Login
        </label for="btn">
        <input type="submit" hidden id="btn" value="Entrar" class="bn">
        
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST["username"]) AND  isset($_POST["password"])) {
            if($BancoDeDados->Conectar()) {
                if($Usuarios->Login($_POST["username"], $_POST["password"])) {
                    header("Location: ./dashboard.php");
                } else {
                    ?>
                    <script>
                        let msg = document.getElementById('msg');
                        msg.style.display = "block"
                        msg.addEventListener("click", () => {
                            msg.style.display = "none"
                        })
                    </script>
                    <?php
                }
            } 
        }
    }


    ?>
</body>
</html>