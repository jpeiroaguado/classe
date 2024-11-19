<?php
function dividir($numerador, $denominador) {
    if ($denominador == 0) {
        throw new Exception("No se puede dividir por cero."); // Lanzar una excepción
    }
    return $numerador / $denominador; // Retornar el resultado de la división
}

try {
    $num1 = 10;
    $num2 = 0; // Cambia a 2 para una división válida

    // Intentar realizar la división
    $resultado = dividir($num1, $num2);
    echo "El resultado de la división es: " . $resultado;

} catch (Exception $e) {
    // Capturar la excepción y mostrar un mensaje de error
    echo "Error: " . $e->getMessage();
}
?>
