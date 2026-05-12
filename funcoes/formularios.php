<?php

function formularioFiltroMusicas() {
    echo '
    <form method="GET" class="mb-4">
        <input type="hidden" name="page" value="musicas">
        <input class="form-control mb-2" type="text" name="artista" placeholder="Artista">
        <input class="form-control mb-2" type="text" name="genero" placeholder="Gênero">
        <input class="form-control mb-2" type="number" name="ano" placeholder="Ano">
        <button class="btn btn-dark">Filtrar</button>
    </form>
    ';
}

function filtrarMusicas($musicas) {
    $resultado = [];

    foreach ($musicas as $m) {
        if (
            (empty($_GET['artista']) || stripos($m['artista'], $_GET['artista']) !== false) &&
            (empty($_GET['genero']) || stripos($m['genero'], $_GET['genero']) !== false) &&
            (empty($_GET['ano']) || $m['ano'] == $_GET['ano'])
        ) {
            $resultado[] = $m;
        }
    }

    return $resultado;
}