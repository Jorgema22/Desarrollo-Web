<?php


$Pulgadas = $_POST['pulgadas'];

if (isset($Pulgadas) && is_numeric($Pulgadas)) {
    $Centimetros = $Pulgadas * 2.54;
    echo "Pulgadas ingresadas: " . $Pulgadas . "<br>";
    echo "Resultado en centímetros: " . $Centimetros . " cm";
} else {
    echo "Error: Ingrese un valor numérico válido.";
}
?>