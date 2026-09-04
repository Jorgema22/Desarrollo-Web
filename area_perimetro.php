<?php
// Inicializamos variables
$resultado_area = "";
$resultado_perimetro = "";
$error = "";

// Verificamos si el formulario fue enviado
if (isset($_POST['figura'], $_POST['medida1'])) {
    
    $figura = $_POST['figura'];
    $medida1 = $_POST['medida1']; 
    // Si medida2 viene vacía, la convertimos a 0 para evitar errores
    $medida2 = $_POST['medida2'] ?? 0;

    if (is_numeric($medida1) && is_numeric($medida2)) {
        
        switch ($figura) {
            case 'cuadrado':
                $resultado_area = $medida1 * $medida1;
                $resultado_perimetro = 4 * $medida1;
                break;
            case 'rectangulo':
                $resultado_area = $medida1 * $medida2;
                $resultado_perimetro = 2 * ($medida1 + $medida2);
                break;
            case 'circulo':
                $resultado_area = M_PI * ($medida1 * $medida1);
                $resultado_perimetro = 2 * M_PI * $medida1;
                break;
            case 'triangulo':
                $resultado_area = ($medida1 * $medida2) / 2;
                $resultado_perimetro = "Necesitas 3 lados";
                break;
            default:
                $error = "Error: Selecciona una figura válida.";
                break;
        }

        if (is_numeric($resultado_area)) $resultado_area = round($resultado_area, 2);
        if (is_numeric($resultado_perimetro)) $resultado_perimetro = round($resultado_perimetro, 2);

    } else {
        $error = "Error: Ingrese un valor numérico válido.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora Geométrica Pro</title>
    <style>
        /* Reset básico */
        * { margin: 0; padding: 0; box-sizing: border-box; }

        /* Fondo oscuro con efecto de rejilla (Grid) */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #0f172a;
            background-image: linear-gradient(rgba(255, 255, 255, 0.05) 1px, transparent 1px), linear-gradient(90deg, rgba(255, 255, 255, 0.05) 1px, transparent 1px);
            background-size: 30px 30px;
            color: #e2e8f0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        /* Contenedor principal */
        .dashboard {
            background: rgba(30, 41, 59, 0.9);
            backdrop-filter: blur(10px);
            padding: 30px;
            border-radius: 12px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 500px;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            font-weight: 300;
            font-size: 28px;
            letter-spacing: 1px;
            color: #38bdf8;
            text-transform: uppercase;
        }

        /* Estilos del formulario */
        .form-grid {
            display: grid;
            gap: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
            color: #94a3b8;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        input[type="text"], select {
            width: 100%;
            padding: 15px;
            background-color: #1e293b;
            border: 1px solid #334155;
            border-radius: 8px;
            color: #fff;
            font-size: 16px;
            outline: none;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus, select:focus {
            border-color: #38bdf8;
            box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.2);
            background-color: #0f172a;
        }

        /* Botón de acción */
        .btn-calc {
            width: 100%;
            padding: 15px;
            background: linear-gradient(90deg, #38bdf8 0%, #818cf8 100%);
            border: none;
            border-radius: 8px;
            color: #fff;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            margin-top: 10px;
        }

        .btn-calc:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(56, 189, 248, 0.4);
        }

        /* Caja para ocultar/mostrar el campo 2 */
        #campoMedida2 {
            display: block;
            transition: all 0.3s ease;
        }

        /* Tarjetas de resultados estilo Neón */
        .resultados-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-top: 25px;
        }

        .tarjeta {
            background: #1e293b;
            border: 1px solid #334155;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .tarjeta::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
        }

        .tarjeta.area::before { background: #10b981; }
        .tarjeta.perimetro::before { background: #f59e0b; }

        .tarjeta h3 {
            font-size: 14px;
            color: #94a3b8;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .tarjeta .valor {
            font-size: 28px;
            font-weight: bold;
        }

        .tarjeta.area .valor { color: #10b981; }
        .tarjeta.perimetro .valor { color: #f59e0b; }

        /* Mensaje de error */
        .error-box {
            margin-top: 20px;
            padding: 15px;
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid #ef4444;
            border-radius: 8px;
            color: #fca5a5;
            font-size: 16px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="dashboard">
    <h2>⚡ Geo Calc Pro</h2>
    
    <form method="POST" action="">
        <div class="form-grid">
            <div>
                <label for="figura">Figura Geométrica</label>
                <select id="figura" name="figura" onchange="toggleMedida2()" required>
                    <option value="cuadrado">⬜ Cuadrado</option>
                    <option value="rectangulo">▭ Rectángulo</option>
                    <option value="circulo" selected>⭕ Círculo (Radio)</option>
                    <option value="triangulo">🔺 Triángulo</option>
                </select>
            </div>
            
            <div>
                <label for="medida1">Medida 1 (Lado, Base o Radio)</label>
                <input type="text" id="medida1" name="medida1" placeholder="Ej: 10" required>
            </div>
            
            <!-- Este campo se ocultará automáticamente si seleccionas Círculo o Cuadrado -->
            <div id="campoMedida2">
                <label for="medida2">Medida 2 (Altura o Ancho)</label>
                <input type="text" id="medida2" name="medida2" placeholder="Ej: 5">
            </div>
            
            <button type="submit" class="btn-calc">Calcular</button>
        </div>
    </form>

    <?php if ($resultado_area !== "" || $resultado_perimetro !== ""): ?>
        <div class="resultados-grid">
            <div class="tarjeta area">
                <h3>Área</h3>
                <div class="valor"><?php echo $resultado_area; ?></div>
            </div>
            <div class="tarjeta perimetro">
                <h3>Perímetro</h3>
                <div class="valor"><?php echo $resultado_perimetro; ?></div>
            </div>
        </div>
    <?php elseif ($error !== ""): ?>
        <div class="error-box">
            ⚠️ <?php echo $error; ?>
        </div>
    <?php endif; ?>
</div>

<!-- Script para ocultar el segundo campo según la figura -->
<script>
    function toggleMedida2() {
        var figura = document.getElementById('figura').value;
        var campo = document.getElementById('campoMedida2');
        
        // Si es cuadrado o círculo, ocultamos el campo 2
        if (figura === 'cuadrado' || figura === 'circulo') {
            campo.style.display = 'none';
            document.getElementById('medida2').removeAttribute('required');
            document.getElementById('medida2').value = ''; // Limpiamos el campo
        } else {
            campo.style.display = 'block';
            document.getElementById('medida2').setAttribute('required', 'required');
        }
    }

    // Ejecutamos la función al cargar la página para que el campo esté oculto si es círculo (por defecto)
    window.onload = toggleMedida2;
</script>

</body>
</html>