<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Problema #5 - Formulario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }
        form {
            background-color: white;
            padding: 15px;
            border-radius: 5px;
            width: 300px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.15);
        }
        label {
            font-weight: bold;
        }
        input[type="text"], input[type="number"] {
            width: 100%;
            padding: 5px;
            margin: 5px 0 10px 0;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 3px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 8px;
            border: none;
            width: 100%;
            cursor: pointer;
            border-radius: 3px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .resultado {
            margin-top: 15px;
            padding: 10px;
            background-color: #e7f3fe;
            border: 1px solid #b6d4fe;
            width: 295px;
            border-radius: 5px;
        }
        .error {
            margin-top: 15px;
            padding: 10px;
            background-color: #fdecea;
            border: 1px solid #f5c2c0;
            width: 295px;
            border-radius: 5px;
            color: #a94442;
        }
        .exito {
            margin-top: 15px;
            padding: 10px;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            width: 295px;
            border-radius: 5px;
            color: #155724;
        }
    </style>
</head>
<body>
    <h2>Problema #5: Formulario de Datos</h2>

    <form method="post" action="">
        <label for="nombre">Nombre completo:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="edad">Edad:</label>
        <input type="number" id="edad" name="edad" required min="1" max="120">

        <input type="submit" value="Enviar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        $nombre = trim($_POST['nombre'] ?? '');
        $edadInput = trim($_POST['edad'] ?? '');

        $errores = array();

        // Validar nombre
        if (empty($nombre)) {
            $errores[] = "El nombre es obligatorio.";
        } elseif (strlen($nombre) < 2) {
            $errores[] = "El nombre debe tener al menos 2 caracteres.";
        }

        // Validar edad
        $edad = filter_var($edadInput, FILTER_VALIDATE_INT);
        if ($edad === false) {
            $errores[] = "La edad debe ser un número válido.";
        } elseif ($edad < 1 || $edad > 120) {
            $errores[] = "La edad debe estar entre 1 y 120 años.";
        }

        // Mostrar resultados
        if (count($errores) > 0) {
            echo "<div class='error'>";
            echo "<strong>Errores encontrados:</strong><br>";
            foreach ($errores as $error) {
                echo "- $error<br>";
            }
            echo "</div>";
        } else {
            echo "<div class='exito'>";
            echo "<strong>✅ Datos válidos</strong><br>";
            echo "Nombre: " . htmlspecialchars($nombre) . "<br>";
            echo "Edad: " . $edad . " años<br>";

            if ($edad < 18) {
                echo "Eres menor de edad.";
            } else {
                echo "Eres mayor de edad.";
            }
            echo "</div>";
        }
    }
    ?>
</body>
</html>