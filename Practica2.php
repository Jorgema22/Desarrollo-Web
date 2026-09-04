<?php
// Práctica 2: Funciones y operaciones básicas
// Hlaa Na Vanna - 28/08/2026

function mostrar($operacion, $num1, $num2, $resultado) {
    echo "La $operacion de $num1 y $num2 es: $resultado<br>";
}

$num1 = 4;  $num2 = 7;
mostrar("suma", $num1, $num2, $num1 + $num2);

$num1 = 10; $num2 = 3;
mostrar("resta", $num1, $num2, $num1 - $num2);

$num1 = 5;  $num2 = 6;
mostrar("multiplicación", $num1, $num2, $num1 * $num2);

$num1 = 20; $num2 = 4;
mostrar("división", $num1, $num2, $num1 / $num2);

$numero = 4.6;
echo "Redondeo de $numero: " . round($numero);
?>