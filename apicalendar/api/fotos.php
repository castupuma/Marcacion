<?php

header("Content-Type: application/json; charset=utf-8");

require_once '../dao/fotoDAO.php';
$fotoDAO = new FotoDAO();

$Fotos = $fotoDAO->obtenerFotos();
$rsFotos = [];

sleep(3);

foreach ($Fotos as $fot) {
    $rsFotos[] = [
        '_id' => $fot['id_foto'],
        'fecha' => utf8_encode($fot['fecha']),
        'nombre' => utf8_encode($fot['nombre']),
        'usuario' => utf8_encode($fot['usuario']),
        'imagen' => utf8_encode($fot['imagen'])
    ];
}

echo json_encode($rsFotos);