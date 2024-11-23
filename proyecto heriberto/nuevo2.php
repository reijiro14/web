<?php
// Iniciar sesión y configurar la base de datos de pedidos
session_start();
if (!isset($_SESSION['pedidos'])) {
    $_SESSION['pedidos'] = []; // Crear un array vacío para almacenar los pedidos
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Si hay un pedido, se agrega al array de pedidos
    if (isset($_POST['plato'])) {
        $_SESSION['pedidos'][] = $_POST['plato'];
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos de Platos Cochabambinos</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet"> <!-- Font Awesome -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }
        header, footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 15px 0;
        }
        nav {
            background-color: #007bff;
            padding: 10px;
            text-align: center;
        }
        nav a {
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            margin: 0 10px;
            border-radius: 5px;
        }
        nav a:hover {
            background-color: #0056b3;
        }
        .container {
            padding: 20px;
        }
        .menu {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }
        .menu-item {
            width: 30%;
            background-color: white;
            padding: 15px;
            margin: 10px 0;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            text-align: center;
        }
        .menu-item img {
            max-width: 100%;
            border-radius: 5px;
        }
        .btn {
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .btn:hover {
            background-color: #218838;
        }
        .cart-container {
            background-color: #fff;
            padding: 10px;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        .cart-item {
            display: flex;
            justify-content: space-between;
            margin: 10px 0;
        }
        .cart-item p {
            margin: 0;
        }
        .pedido-container {
            background-color: #fff;
            padding: 15px;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        /* Estilo para los iconos de redes sociales */
        .social-links {
            margin-top: 20px;
        }
        .social-links a {
            color: white;
            text-decoration: none;
            margin: 0 15px;
            font-size: 30px;
        }
        .social-links a:hover {
            color: #007bff;
        }
    </style>
</head>
<body>

<header>
    <h1>Pedidos de Platos Cochabambinos</h1>
</header>

<nav>
    <a href="#registro">Registrarse</a>
    <a href="#menu">Menú</a>
    <a href="#carrito">Ver Carrito</a>
    <a href="#bandeja" onclick="verBandejaPedidos()">Bandeja de Pedidos</a>
</nav>

<div class="container">
    <!-- Registro del Usuario -->
    <div id="registro">
        <h2>Registro de Usuario</h2>
        <form id="registro-form">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" required><br><br>
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" required><br><br>
            <button type="button" onclick="registrarUsuario()">Registrarse</button>
        </form>
    </div>

    <!-- Menú de Platos Cochabambinos -->
    <div id="menu" style="display:none;">
        <h2>Menú de Platos Cochabambinos</h2>
        <div class="menu">
            <div class="menu-item">
                <img src="https://via.placeholder.com/300x200?text=Pique+A+lo+Macho" alt="Pique Macho">
                <h3>Pique Macho</h3>
                <p>Precio: 50.00bs</p>
                <form method="POST">
                    <input type="hidden" name="plato" value="Pique a lo Macho">
                    <button class="btn" type="submit">Añadir al carrito</button>
                </form>
            </div>
            <div class="menu-item">
                <img src="https://via.placeholder.com/300x200?text=Charque" alt="Charque">
                <h3>Charque</h3>
                <p>Precio: 50.00bs</p>
                <form method="POST">
                    <input type="hidden" name="plato" value="Charque">
                    <button class="btn" type="submit">Añadir al carrito</button>
                </form>
            </div>
            <div class="menu-item">
                <img src="https://via.placeholder.com/300x200?text=Escabeche" alt="Escabeche">
                <h3>Escabeche</h3>
                <p>Precio: 50.00bs</p>
                <form method="POST">
                    <input type="hidden" name="plato" value="Escabeche">
                    <button class="btn" type="submit">Añadir al carrito</button>
                </form>
            </div>
            <div class="menu-item">
                <img src="https://via.placeholder.com/300x200?text=Chicharron" alt="Chicharrón">
                <h3>Chicharrón</h3>
                <p>Precio: 70.00bs</p>
                <form method="POST">
                    <input type="hidden" name="plato" value="Chicharrón">
                    <button class="btn" type="submit">Añadir al carrito</button>
                </form>
            </div>
            <div class="menu-item">
                <img src="https://via.placeholder.com/300x200?text=Fricase" alt="Fricasé">
                <h3>Fricasé</h3>
                <p>Precio: 25.00bs</p>
                <form method="POST">
                    <input type="hidden" name="plato" value="Fricasé">
                    <button class="btn" type="submit">Añadir al carrito</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bandeja de Pedidos -->
    <div id="bandeja" class="pedido-container">
        <h2>Bandeja de Pedidos</h2>
        <div id="bandeja-pedidos">
            <ul>
                <?php
                // Mostrar los pedidos actuales desde la sesión
                if (!empty($_SESSION['pedidos'])) {
                    foreach ($_SESSION['pedidos'] as $pedido) {
                        echo "<li>$pedido</li>";
                    }
                } else {
                    echo "<li>No hay pedidos por el momento.</li>";
                }
                ?>
            </ul>
        </div>
    </div>
</div>

<footer>
    <p> Platos Cochabambinos</p>
</footer>

<script>
    // Función para registrar al usuario (simplemente ocultar el formulario y mostrar el menú)
    function registrarUsuario() {
        const nombre = document.getElementById("nombre").value;
        const email = document.getElementById("email").value;
        if (nombre && email) {
            alert("¡Usuario registrado con éxito! Bienvenido, " + nombre);
            document.getElementById("registro").style.display = 'none';
            document.getElementById("menu").style.display = 'block';
        } else {
            alert("Por favor, complete todos los campos.");
        }
    }
</script>

</body>
</html>
