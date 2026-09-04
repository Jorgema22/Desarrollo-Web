<?php
// Problema #3: Función pimpinfo()
// Hlaa Na Vanna - 28/08/2026

function pimpinfo() {
    // Mostrar fecha y hora actual con date()
    echo "<h2>Fecha y Hora Actual</h2>";
    echo "Fecha: " . date("d/m/Y") . "<br>";
    echo "Hora: " . date("h:i:s A") . "<br>";
    echo "Semana del año: " . date("W") . "<br>";
    echo "Día de la semana: " . date("l") . "<br><br>";
    
    // Mostrar información del servidor con $_SERVER
    echo "<h2>Información del Servidor</h2>";
    echo "IP del servidor: " . $_SERVER['SERVER_ADDR'] . "<br>";
    echo "Nombre del servidor: " . $_SERVER['SERVER_NAME'] . "<br>";
    echo "IP del cliente: " . $_SERVER['REMOTE_ADDR'] . "<br>";
    echo "Método de petición: " . $_SERVER['REQUEST_METHOD'] . "<br><br>";
    
    // Ejemplos con strtotime()
    echo "<h2>Ejemplos con strtotime()</h2>";
    echo "Próximo lunes: " . date("d/m/Y", strtotime("next Monday")) . "<br>";
    echo "Dentro de 7 días: " . date("d/m/Y", strtotime("+7 days")) . "<br>";
    echo "Fecha específica (2025-09-11): " . date("d/m/Y", strtotime("2025-09-11")) . "<br>";
}

// Ejecutar la función
pimpinfo();

// Mostrar información completa de PHP
phpinfo();
?>