<?php
require_once "config/config.php";

function loadStyles() {
    global $styles;
    foreach ($styles as $s) {
        echo "<link rel='stylesheet' href='$s'>";
    }
}

function loadScripts() {
    global $scripts;
    foreach ($scripts as $s) {
        echo "<script src='$s'></script>";
    }
}

function navbar() {
    global $titulo, $links;

    echo "<nav class='navbar navbar-dark bg-dark navbar-expand-lg'>";
    echo "<div class='container-fluid'>";
    echo "<a class='navbar-brand' href='index.php'>$titulo</a>";

    echo "<div class='collapse navbar-collapse'>";
    echo "<ul class='navbar-nav ms-auto'>";

    foreach ($links as $nome => $url) {
        echo "<li class='nav-item'>
                <a class='nav-link' href='$url'>$nome</a>
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
    if (isset($_GET['page'])) {
        $p = $_GET['page'];
        require_once "secoes/$p.php";
    } else {
        require_once "secoes/home.php";
    }
}