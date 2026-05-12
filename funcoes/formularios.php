<?php

function formularioFiltroMusicas() {
    // Repopula os campos com os valores já filtrados
    $artista = htmlspecialchars($_GET['artista'] ?? '', ENT_QUOTES, 'UTF-8');
    $genero  = htmlspecialchars($_GET['genero']  ?? '', ENT_QUOTES, 'UTF-8');
    $ano     = htmlspecialchars($_GET['ano']     ?? '', ENT_QUOTES, 'UTF-8');

    echo "
    <form method='GET' class='row g-3 mb-4'>
        <input type='hidden' name='page' value='musicas'>

        <div class='col-md-4'>
            <input class='form-control filtro-input'
                   type='text'
                   name='artista'
                   placeholder='Artista'
                   value='$artista'>
        </div>

        <div class='col-md-3'>
            <input class='form-control filtro-input'
                   type='text'
                   name='genero'
                   placeholder='Gênero'
                   value='$genero'>
        </div>

        <div class='col-md-3'>
            <input class='form-control filtro-input'
                   type='number'
                   name='ano'
                   placeholder='Ano'
                   value='$ano'>
        </div>

        <div class='col-md-2'>
            <button class='btn btn-info btn-filtrar w-100 fw-bold'>Filtrar</button>
        </div>
    </form>
    ";
}

function filtrarMusicas($musicas) {
    $resultado = [];

    foreach ($musicas as $m) {
        if (
            (empty($_GET['artista']) || stripos($m['artista'], $_GET['artista']) !== false) &&
            (empty($_GET['genero'])  || stripos($m['genero'],  $_GET['genero'])  !== false) &&
            (empty($_GET['ano'])     || $m['ano'] == $_GET['ano'])
        ) {
            $resultado[] = $m;
        }
    }

    return $resultado;
}