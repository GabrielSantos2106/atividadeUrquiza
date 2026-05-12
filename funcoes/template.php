<?php
require_once "config/config.php";

function loadStyles() {
    global $styles;
    foreach ($styles as $s) {
        $s = htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
        echo "<link rel='stylesheet' href='$s'>\n";
    }
}

function loadScripts() {
    global $scripts;
    foreach ($scripts as $s) {
        $s = htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
        echo "<script src='$s'></script>\n";
    }
}

function navbar() {
    global $titulo, $links;

    $tituloSafe = htmlspecialchars($titulo, ENT_QUOTES, 'UTF-8');

    echo "<nav class='navbar navbar-dark bg-dark navbar-expand-lg'>";
    echo "<div class='container'>";
    echo "<a class='navbar-brand fw-bold' href='index.php'>$tituloSafe</a>";

    echo "<button class='navbar-toggler' type='button' data-bs-toggle='collapse' data-bs-target='#navMenu'>
            <span class='navbar-toggler-icon'></span>
          </button>";

    echo "<div class='collapse navbar-collapse' id='navMenu'>";
    echo "<ul class='navbar-nav ms-auto'>";

    foreach ($links as $nome => $url) {
        $nomeSafe = htmlspecialchars($nome, ENT_QUOTES, 'UTF-8');
        $urlSafe  = htmlspecialchars($url,  ENT_QUOTES, 'UTF-8');
        echo "<li class='nav-item'>
                <a class='nav-link' href='$urlSafe'>$nomeSafe</a>
              </li>";
    }

    echo "</ul></div></div></nav>";
}

function container() {
    echo "<div class='container mt-4'>";
    section();
    echo "</div>";
}

function section() {
    // Whitelist de páginas válidas — evita path traversal
    $paginasPermitidas = ['home', 'musicas'];

    $page = $_GET['page'] ?? 'home';

    if (!in_array($page, $paginasPermitidas, true)) {
        $page = 'home';
    }

    require_once "secoes/$page.php";
}