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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.3.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
    
    <style>
        body {
            background: linear-gradient(to right, #e0eafc, #cfdef3);
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            width: 90%;
            max-width: 1200px;
            justify-content: center;
        }

        .formulario, .tabla_registro {
            background: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            flex: 1;
            min-width: 300px;
            max-width: 100%;
            overflow-x: auto;
        }

        h1, h2 {
            text-align: center;
            color: #333;
        }

        .formulario .form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .input {
            background: white;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 10px;
            font-size: 16px;
            color: #333;
        }

        .input[type="submit"] {
            background-color: #007bff;
            color: white;
            cursor: pointer;
            border: none;
        }

        .input[type="submit"]:hover {
            background-color: #0056b3;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border: 1px solid #ccc;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .formulario, .tabla_registro {
                width: 100%;
                min-width: unset;
                overflow-x: auto;
            }

            table, thead, tbody, th, td, tr {
                display: block;
            }

            th, td {
                text-align: right;
                padding-left: 50%;
                position: relative;
            }

            th::before, td::before {
                position: absolute;
                left: 10px;
                white-space: nowrap;
            }

            th::before {
                content: attr(data-label);
                font-weight: bold;
            }

            td::before {
                content: attr(data-label);
            }

            th:first-child, td:first-child {
                padding-top: 10px;
            }

            th:last-child, td:last-child {
                padding-bottom: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Formulario de creación de usuarios -->
        <div class="formulario">
            <form class="form" action="insert_usuarios.php" method="POST">
                <h1>Crear Usuario</h1>
                <input class="input" type="text" name="name" placeholder="Nombre">
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
                        <th data-label="ID">ID</th>
                        <th data-label="Nombre">Nombre</th>
                        <th data-label="Apellido">Apellido</th>
                        <th data-label="Usuario">Usuario</th>
                        <th data-label="Password">Password</th>
                        <th data-label="Email">Email</th>
                        <th data-label="Editar"></th>
                        <th data-label="Eliminar"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_array($query)): ?>
                    <tr>
                        <td data-label="ID"><?= $row['id'] ?></td>
                        <td data-label="Nombre"><?= $row['name'] ?></td>
                        <td data-label="Apellido"><?= $row['lastname'] ?></td>
                        <td data-label="Usuario"><?= $row['username'] ?></td>
                        <td data-label="Password"><?= $row['password'] ?></td>
                        <td data-label="Email"><?= $row['email'] ?></td>
                        <td data-label="Editar"><a href="editar.php?id=<?= $row['id'] ?>">Editar</a></td>
                        <td data-label="Eliminar"><a href="eliminar.php?id=<?= $row['id'] ?>">Eliminar</a></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
