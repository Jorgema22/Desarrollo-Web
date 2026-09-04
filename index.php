<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Problema #2 - Convertir Pulgadas</title>
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
        input[type="text"] {
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
    </style>
</head>
<body>
    <h2>Problema #2: Convertir Pulgadas a Centímetros</h2>

    <form method="post" action="conversion.php">
        <label for="pulgadas">Ingrese las pulgadas:</label>
        <input type="text" id="pulgadas" name="pulgadas">
        <input type="submit" value="Convertir">
    </form>
</body>
</html>