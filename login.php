<html lang="ES">
    <head>
        <meta charset="UTF-8">
        <title>Envios </title>
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <br>
    <br>
    <br>
    <br>
    <br>

    <?php
    /* include_once ('includes/login.php'); */
    session_start();
    session_destroy();
    ?>
    <html>
        <head>
            <meta charset="UTF-8">
            <title> Inicio </title>
            <link href ="css/login.css" rel ="stylesheet" type ="text/css">
        </head>
        <body> 
            <section id="Formulario">

                <br>
                <br>	
                <div class ="login">
                    <form action ="../controller/login.php" method= "POST" > 
                        <center>    
                            <fieldset>       
                                <legend><h1>Iniciar Sesion</h1></legend>	
                                <p>
                                    <input title = "se necesita el nombre" type = "text" name = "usuario" placeholder = "usuario" required>
                                </p> 
                                <p>
                                    <input  title = "se necesita la contraseña" type = "password" name = "pass" placeholder = "password" required>
                                </p> 
                                <p>
                                    <input  type = "submit" value = "Entrar"> 
                                    <input  type = "reset" value = "Limpiar"> 
                                </p>  
                                
                                    
                                </a>                                  

                            </fieldset>
                        </center>
                    </form>	
                </div>
            </section>
        </body>
    </html>