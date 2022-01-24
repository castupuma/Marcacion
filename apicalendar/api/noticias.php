<?php

header("Content-Type: application/json; charset=utf-8");

require_once '../dao/noticiaDAO.php';
$noticiaDAO = new NoticiaDAO();

$Noticias = $noticiaDAO->obtenerNoticias();
$rsNoticias = [];

sleep(3);

foreach ($Noticias as $not) {
    $rsNoticias[] = [
        'id_noticia' => $not['id_noticia'],
        'titulo' => utf8_encode($not['titulo']),
        'imagen' => utf8_encode($not['imagen'])
    ];
}

echo json_encode($rsNoticias);