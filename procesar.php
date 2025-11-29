<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuestionario Completado</title>
    <style>
        /* Diseño con fondo degradado */
        body {
            background: linear-gradient(to right, #0D1B2A, #673AB7);
            font-family: 'Segoe UI', sans-serif;
            color: white;
            padding: 40px;
            text-align: center;
        }

        h1 {
            color: #BB86FC;
        }

        h2 {
            color: #616161ff; /* título */
            font-size: 28px;
            margin-top: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: rgba(31, 27, 36, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(147, 112, 219, 0.4);
        }

        .data-box {
            background: rgba(255, 255, 255, 0.1);
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
            margin: 10px 0;
        }

        /* Estilo para el ID en verde */
        .highlight {
            color: #4CAF50; /* Verde brillante */
            font-size: 22px;
            font-weight: bold;
            margin-top: 20px;
        }

        a {
            background-color: #BB86FC;
            color: white;
            padding: 12px 20px;
            border-radius: 5px;
            text-decoration: none;
            transition: 0.3s;
            font-size: 18px;
            display: inline-block;
            margin-top: 20px;
        }

        a:hover {
            background-color: #9575CD;
        }

        /* Estilo para el mensaje de agradecimiento */
        #gracias {
            color: #4CAF50;
            font-size: 24px;
            font-weight: bold;
            margin-top: 30px;
        }

    </style>
</head>
<body>

<div class="container">
    <!-- Título adicional -->
    <h2>Gracias por participar en este proyecto</h2>

    <?php
    // Conectar a MySQL
    $conexion = mysqli_connect("localhost:3307", "root", "", "interactivo_v2");

    if (!$conexion) {
        die("<p>Error no se pudo conectar a MySQL.</p><p>" . mysqli_connect_error() . "</p>");
    }

    // Capturar datos del formulario
    $nombre_post = $_POST['campoNombre'] ?? "";
    $comentarios_post = $_POST['campoComentarios'] ?? "";
    $opinion_post = $_POST['campoOpinion'] ?? "";
   
    // Insertar datos en MySQL
    $sql = "INSERT INTO respuestas (`Nombre`, `Comentarios`, `Opinion`)  
            VALUES ('$nombre_post', '$comentarios_post', '$opinion_post')";

    if (mysqli_query($conexion, $sql)) {
        // Obtener el ID recién insertado
        $id_usuario = mysqli_insert_id($conexion);

        echo "<h1>¡Felicidades, $nombre_post!</h1>";
        echo "<p>Cuestionario contestado exitosamente.</p>";
        
        // Mostrar el ID en verde
        echo "<p class='highlight'>Tu ID de usuario es: <strong>$id_usuario</strong></p>";
      
    } else {
        echo "<p>Error: No se pudo realizar el registro.</p><p>" . mysqli_error($conexion) . "</p>";
    }

    mysqli_close($conexion);
    ?>

    <div class='data-box'><p><strong>Nombre:</strong> <?php echo $nombre_post; ?></p></div>
    <div class='data-box'><p><strong>Comentarios:</strong> <?php echo $comentarios_post; ?></p></div>
    <div class='data-box'><p><strong>Opinion:</strong> <?php echo $opinion_post; ?></p></div>

    <a href="index.html">Volver</a>
    <a href="listado.php">Ver el listado</a>

    <!-- Mensaje de agradecimiento al final -->
    <div id="gracias">
        Gracias por participar en este proyecto.
    </div>
</div>

</body>
</html>
