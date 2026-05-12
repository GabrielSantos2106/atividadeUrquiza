<?php
require_once "dados/musicas.php";
require_once "funcoes/formularios.php";

echo "<h2 class='mb-4'>Catálogo de Músicas</h2>";

formularioFiltroMusicas();

$lista = filtrarMusicas($musicas);
$total = count($lista);

echo "<p class='text-secondary mb-3'>$total música(s) encontrada(s)</p>";

if ($total === 0) {
    echo "<div class='alert alert-warning'>Nenhuma música encontrada com os filtros aplicados.</div>";
} else {
    echo "<div class='table-responsive'>
          <table class='table table-striped table-hover align-middle'>
            <thead>
              <tr>
                <th>Título</th>
                <th>Artista</th>
                <th>Gênero</th>
                <th>Ano</th>
              </tr>
            </thead>
            <tbody>";

    foreach ($lista as $m) {
        $titulo  = htmlspecialchars($m['titulo'],  ENT_QUOTES, 'UTF-8');
        $artista = htmlspecialchars($m['artista'], ENT_QUOTES, 'UTF-8');
        $genero  = htmlspecialchars($m['genero'],  ENT_QUOTES, 'UTF-8');
        $ano     = (int) $m['ano'];

        echo "<tr>
                <td>$titulo</td>
                <td>$artista</td>
                <td>$genero</td>
                <td>$ano</td>
              </tr>";
    }

    echo "  </tbody>
          </table>
          </div>";
}