<?php
// Problema #4: Funciones de manipulación de cadenas
// Hlaa Na Vanna - 28/08/2026

$texto = "   hola mundo! este es un ejemplo   ";

echo "<h2>Texto original:</h2>";
echo "\"$texto\"<br><br>";

// trim() - elimina espacios al inicio y final
$texto_trim = trim($texto);
echo "<b>trim():</b> elimina espacios<br>";
echo "\"$texto_trim\"<br><br>";

// ucfirst() - primera letra mayúscula
echo "<b>ucfirst():</b> primera letra mayúscula<br>";
echo ucfirst($texto_trim) . "<br><br>";

// strtoupper() - todo en mayúsculas
echo "<b>strtoupper():</b> todo en MAYÚSCULAS<br>";
echo strtoupper($texto_trim) . "<br><br>";

// strtolower() - todo en minúsculas
echo "<b>strtolower():</b> todo en minúsculas<br>";
echo strtolower($texto_trim) . "<br><br>";

// strlen() - longitud de la cadena
echo "<b>strlen():</b> longitud de la cadena<br>";
echo "El texto tiene " . strlen($texto_trim) . " caracteres<br><br>";

// strpos() - buscar palabra
echo "<b>strpos():</b> buscar \"mundo\"<br>";
$posicion = strpos($texto_trim, "mundo");
if ($posicion !== false) {
    echo "La palabra 'mundo' está en la posición $posicion<br><br>";
} else {
    echo "No se encontró 'mundo'<br><br>";
}

// urlencode() y urldecode()
$url_texto = "Hola mundo! cómo estás?";
echo "<b>urlencode():</b> codificar para URL<br>";
$codificado = urlencode($url_texto);
echo "Original: $url_texto<br>";
echo "Codificado: $codificado<br><br>";

echo "<b>urldecode():</b> decodificar URL<br>";
$decodificado = urldecode($codificado);
echo "Decodificado: $decodificado<br>";
?>