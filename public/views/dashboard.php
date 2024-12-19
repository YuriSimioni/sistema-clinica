<?php

require_once "../../config/config.php";
require_once "../../classes/usuarios.php";
require_once "../../classes/mails.php";

$Logger = new Logger();

$Projeto = new Projeto();
$BancoDeDados = new BancoDeDados();
$Usuarios = new User();
$Mails = new Mails();


if(!isset($_SESSION["logged"])) {
    header("Location: ../../index.php");
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $Projeto->getNome()?> | Dashboard - <?php echo $_SESSION['user']['name'].' '.$_SESSION['user']['surname']?></title>
    <link rel="stylesheet" href="../css/root.css">
    <link rel="stylesheet" href="../css/dashboard_style.css">

</head>
<body>
    <?php
    require_once '../template/menu.php';
    ?>
    <div id="container">
        

        <section id="infos-basicas">
            <h1>Mails</h1>
            <div class="box-card">
                <div class="card">
                    
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M537-484q11 8 23 8t23-8l257-179v-97L560-566 280-760v97l257 179ZM120-120q-33 0-56.5-23.5T40-200v-460q0-17 11.5-28.5T80-700q17 0 28.5 11.5T120-660v460h620q17 0 28.5 11.5T780-160q0 17-11.5 28.5T740-120H120Zm160-160q-33 0-56.5-23.5T200-360v-400q0-33 23.5-56.5T280-840h560q33 0 56.5 23.5T920-760v400q0 33-23.5 56.5T840-280H280Z"/></svg>
                    <div>
                        <p class="result">
                            <?php
                
                                if($BancoDeDados->Conectar()) {
                                    echo $Mails->getNumberOfMails($_SESSION['user']['id']);
                                } else {
                                    
                                }
                            
                            ?>
                        
                        </p>
                        <p>Total of Mails</p>
                    </div>
                </div>
                <div class="card">
                    
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M200-200q-17 0-28.5-11.5T160-240q0-17 11.5-28.5T200-280h40v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h40q17 0 28.5 11.5T800-240q0 17-11.5 28.5T760-200H200ZM480-80q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80Z"/></svg>
                    <div>
                        <p class="result">
                            <?php
                
                                if($BancoDeDados->Conectar()) {
                                    echo $Mails->getNumberOfNewMails($_SESSION['user']['id']);
                                } else {
                                    
                                }
                            
                            ?>
                        
                        </p>
                        <p>New Mails</p>
                    </div>
                </div>


                <div class="card">
                    
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="m521-896 321 192q18 11 28 30t10 40v434q0 33-23.5 56.5T800-120H160q-33 0-56.5-23.5T80-200v-434q0-21 10-40t28-30l321-192q19-11 41-11t41 11Zm-41 442 312-186-312-186-312 186 312 186Z"/></svg>
                <div>
                        <p class="result">
                            <?php
                
                                if($BancoDeDados->Conectar()) {
                                    echo $Mails->getNumberOfOpenMails($_SESSION['user']['id']);
                                } else {
                                    
                                }
                            
                            ?>
                        
                        </p>
                        <p>Open Mails</p>
                    </div>
                </div>



                <div class="card">
                    
                <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M280-120q-33 0-56.5-23.5T200-200v-520h-40v-80h200v-40h240v40h200v80h-40v520q0 33-23.5 56.5T680-120H280Zm80-160h80v-360h-80v360Zm160 0h80v-360h-80v360Z"/></svg>
                    <div>
                        <p class="result">
                            <?php
                
                                if($BancoDeDados->Conectar()) {
                                    echo $Mails->getNumberOfTrashMails($_SESSION['user']['id']);
                                } else {
                                    
                                }
                            
                            ?>
                        
                        </p>
                        <p>Mails in Trash</p>
                    </div>
                </div>

                

            </div>
        </section>





        <section id="infos-basicas">
            <h1>Type Mails</h1>
            <div class="box-card">
                <div class="card type mail">
                    
                    <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 -960 960 960" width="24"><path d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm320-287q5 0 10.5-1.5T501-453l283-177q8-5 12-12.5t4-16.5q0-20-17-30t-35 1L480-520 212-688q-18-11-35-.5T160-659q0 10 4 17.5t12 11.5l283 177q5 3 10.5 4.5T480-447Z"/></svg>
                    <div>
                        <p class="result">
                            <?php
                
                                if($BancoDeDados->Conectar()) {
                                    echo $Mails->getNumberOfTypeMails($_SESSION['user']['id']);
                                } else {
                                    
                                }
                            
                            ?>
                        
                        </p>
                        <p>Mails</p>
                    </div>
                </div>
                <div class="card type notify">
                    
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M200-200q-17 0-28.5-11.5T160-240q0-17 11.5-28.5T200-280h40v-280q0-83 50-147.5T420-792v-28q0-25 17.5-42.5T480-880q25 0 42.5 17.5T540-820v28q80 20 130 84.5T720-560v280h40q17 0 28.5 11.5T800-240q0 17-11.5 28.5T760-200H200ZM480-80q-33 0-56.5-23.5T400-160h160q0 33-23.5 56.5T480-80ZM120-560q-17 0-28.5-13T82-603q8-75 42-139.5T211-855q13-11 29.5-10t26.5 15q10 14 8 30t-15 28q-39 37-64 86t-33 106q-2 17-14 28.5T120-560Zm720 0q-17 0-29-11.5T797-600q-8-57-33-106t-64-86q-13-12-15-28t8-30q10-14 26.5-15t29.5 10q53 48 87 112.5T878-603q2 17-9.5 30T840-560Z"/></svg>
                <div>
                        <p class="result">
                            <?php
                
                                if($BancoDeDados->Conectar()) {
                                    echo $Mails->getNumberOfTypeNotify($_SESSION['user']['id']);
                                } else {
                                    
                                }
                            
                            ?>
                        
                        </p>
                        <p>Notifys</p>
                    </div>
                </div>


                <div class="card type warning">
                    
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M480-120q-33 0-56.5-23.5T400-200q0-33 23.5-56.5T480-280q33 0 56.5 23.5T560-200q0 33-23.5 56.5T480-120Zm0-240q-33 0-56.5-23.5T400-440v-320q0-33 23.5-56.5T480-840q33 0 56.5 23.5T560-760v320q0 33-23.5 56.5T480-360Z"/></svg>
                    <div>
                        <p class="result">
                            <?php
                
                                if($BancoDeDados->Conectar()) {
                                    echo $Mails->getNumberOfTypeWarning($_SESSION['user']['id']);
                                } else {
                                    
                                }
                            
                            ?>
                        
                        </p>
                        <p>Warnings</p>
                    </div>
                </div>



                <div class="card type staff">
                    
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed"><path d="M42-160v-72q0-33 17-62t47-44q51-26 115-44t141-18q77 0 141 18t115 44q30 15 47 44t17 62v72q0 17-11.5 28.5T642-120H82q-17 0-28.5-11.5T42-160Zm320-280q-66 0-113-47t-47-113h-10q-9 0-14.5-5.5T172-620q0-9 5.5-14.5T192-640h10q0-45 22-81t58-57v38q0 9 5.5 14.5T302-720q9 0 14.5-5.5T322-740v-54q9-3 19-4.5t21-1.5q11 0 21 1.5t19 4.5v54q0 9 5.5 14.5T422-720q9 0 14.5-5.5T442-740v-38q36 21 58 57t22 81h10q9 0 14.5 5.5T552-620q0 9-5.5 14.5T532-600h-10q0 66-47 113t-113 47Zm0-80q33 0 56.5-23.5T442-600H282q0 33 23.5 56.5T362-520Zm297 144-3-14q-6-2-11.5-4.5T634-402l-12 4q-7 2-13.5 0t-10.5-9l-4-7q-4-6-2.5-13t6.5-12l10-9v-24l-10-9q-5-5-6.5-12t2.5-13l4-7q4-7 10.5-9t13.5 0l12 4q4-4 10-7t12-5l3-14q2-7 7-11.5t12-4.5h8q7 0 12 4.5t7 11.5l3 14q6 2 12 5t10 7l12-4q7-2 13.5 0t10.5 9l4 7q4 6 2.5 13t-6.5 12l-10 9v24l10 9q5 5 6.5 12t-2.5 13l-4 7q-4 7-10.5 9t-13.5 0l-12-4q-5 5-10.5 7.5T708-390l-3 14q-2 7-7 11.5t-12 4.5h-8q-7 0-12-4.5t-7-11.5Zm23-54q12 0 21-9t9-21q0-12-9-21t-21-9q-12 0-21 9t-9 21q0 12 9 21t21 9Zm68-152-4-20q-9-3-16.5-7.5T716-620l-21 7q-9 3-18-.5T663-625l-6-10q-5-8-3.5-17.5T663-669l17-15q-2-5-2-8v-16q0-3 2-8l-17-15q-8-7-9.5-16.5T657-765l6-10q5-8 14-11.5t18-.5l21 7q6-6 13.5-10.5T746-798l4-20q2-10 9.5-16t17.5-6h10q10 0 17.5 6t9.5 16l4 20q9 3 16.5 7.5T848-780l21-7q9-3 18 .5t14 11.5l6 10q5 8 3.5 17.5T901-731l-17 15q2 5 2 8v16q0 3-2 8l17 15q8 7 9.5 16.5T907-635l-6 10q-5 8-14 11.5t-18 .5l-21-7q-6 6-13.5 10.5T818-602l-4 20q-2 10-9.5 16t-17.5 6h-10q-10 0-17.5-6t-9.5-16Zm32-68q21 0 35.5-14.5T832-700q0-21-14.5-35.5T782-750q-21 0-35.5 14.5T732-700q0 21 14.5 35.5T782-650Z"/></svg><div>
                        <p class="result">
                            <?php
                
                                if($BancoDeDados->Conectar()) {
                                    echo $Mails->getNumberOfTypeStaff($_SESSION['user']['id']);
                                } else {
                                    
                                }
                            
                            ?>
                        
                        </p>
                        <p>Staff</p>
                    </div>
                </div>

                

            </div>
        </section>
    </div>
</body>
</html>