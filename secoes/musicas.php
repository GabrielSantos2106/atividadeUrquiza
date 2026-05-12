<?php
require_once "dados/musicas.php";
require_once "funcoes/formularios.php";

echo "<h2>Catálogo de Músicas</h2>";

formularioFiltroMusicas();

$lista = filtrarMusicas($musicas);

echo "<table class='table table-striped'>";
echo "<tr><th>Título</th><th>Artista</th><th>Gênero</th><th>Ano</th></tr>";

foreach ($lista as $m) {
    echo "<tr>
            <td>{$m['titulo']}</td>
            <td>{$m['artista']}</td>
            <td>{$m['genero']}</td>
            <td>{$m['ano']}</td>
          </tr>";
}

echo "</table>";