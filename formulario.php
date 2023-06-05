<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="formulario.css" type="text/css" />
</head>

<body>
    <div class="group">
        <form method="POST" action="">
            <h2><em>Formulario de Registro</em></h2>
            <label for="nombre"><b>Nombre</b> <span><em>(requerido)</em></span>
                <input type="text" name="nombre" class="forma-input" required /></label>

            <label for="apellido"><b>Apellido</b> <span><em>(requerido)</em></span>
                <input type="text" name="apellido" class="forma-input" required /></label>

            <label for="email"><b>Email</b> <span><em>(requerido)</em></span>
                <input type="text" name="email" class="forma-input" required /></label>

            <input class="form-btn" name="submit" type="submit" value="Suscribirse" />

            <?php

            if ($_POST) {
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $email = $_POST['email'];

                //Conexión con PDO
            
                $host = 'localhost';
                $user = 'root';
                $pass = '';
                $datab = 'practicasql';
                //Create connection
                $connection = mysqli_connect($host, $user, $pass);
                //Check connection
               // if(!$connection) 
        //{
          //  echo "No se ha podido conectar con el servidor" . mysqli_error($connection);
       // }
         //   else
       // {
        //    echo "Hemos conectado al servidor <br>" ;
       // }
        $db = mysqli_select_db($connection,$datab);
               // if ($db->connect_error) {
                //   die("Connection faile: " . $db->connect_error);
               // }
                $sql = "INSERT INTO usuario (nombre, apellido, email) VALUES ('$nombre', '$apellido', '$email')";
                $query = mysqli_query($connection, $sql);

                if ($query === TRUE) {
                 echo "Nueva subscripción creada correctamente";
                } else {
                  echo "Error: " . $sql . "<br>" . $conn->error;
                }

                //if (!$db) {
                //    echo "No se ha podido encontrar la Tabla";
               // } else {
                //    echo "Tabla seleccionada";
               // }
               // ;


                $connection->close();

            }

            ?>

        </form>
    </div>
</body>

</html>