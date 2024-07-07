<?php
include('connection.php');

$con = connection();

$sql = "SELECT * FROM usuarios";
$query = mysqli_query($con, $sql);


?>

<!doctype html>
<html lang="en">
    <head>
        <title>CRUD</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"/>
            <link rel="stylesheet" href="./styles_css/index.css">
    </head>

    <body>
        <!-- Formulario de creacion de usuarios -->
        <div class="formulario">
            <form class="form" action="insert_usuarios.php" method="POST">
                <h1>Crear Usuario</h1>
                <input class="input" type="text" name="name"placeholder="Nombre">
                <input class="input" type="text" name="lastname" placeholder="Apellido">
                <input class="input" type="text" name="username" placeholder="Usuario">
                <input class="input" type="text" name="password" placeholder="Contraseña">
                <input class="input" type="text" name="email" placeholder="Correo">

                <input class="input" type="submit" value="Agregar Usuario">
            </form>
        </div>
        <!-- Tabla de usuarios registrados -->
        <div class="tabla_registro">
            <h2>Usuarios Registrados</h2>

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Usuario</th>
                        <th>Password</th>
                        <th>Email</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <!-- Tabla de usuarios con siclo while -->
                <tbody>
                    <?php while($row = mysqli_fetch_array($query)): ?>
                    <tr>
                    <th><?= $row ['id']?></th>
                    <th><?= $row ['name']?></th>
                    <th><?= $row ['username']?></th>
                    <th><?= $row ['lastname']?></th>
                    <th><?= $row ['password']?></th>
                    <th><?= $row ['email']?></th>

                    <!-- Botones editar y eliminar -->
                    
                    <th><a href="editar.php?id=<?=$row ['id']?>">Editar</a></th>
                    <th><a href="eliminar.php?id=<?=$row ['id']?>">Eliminar</a></th>
                    </tr>
                    <?php  endwhile; ?>
                    </tbody>
            </table>
        </div>
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
