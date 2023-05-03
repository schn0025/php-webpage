<?php

declare(strict_types=1);
require_once("../src/WebPage.php");

const INDICE_MAX = 10;
$page = new WebPage("pythagore");
$css = <<<html
        table#pythagore {
          border-spacing : 0;
          border-collapse: collapse;
        }
        table#pythagore td, table#pythagore th {
          width: 1.5em;
          height: 1.5em;
          text-align: right;
          padding: 0.2em;
          border: solid 1px grey;
        }
html;
$page->appendCss($css);

$page->appendContent(<<<HTML
    <h1>Table de Pythagore</h1>
        <table id='pythagore'>
          <tr><th>&times;
HTML);

// Première ligne
for ($colonne = 0; $colonne <= INDICE_MAX; $colonne++) {
    $page->appendContent("<th>$colonne");
}
// Les lignes de multiplication
for ($ligne = 0; $ligne <= INDICE_MAX; $ligne++) {
    $page->appendContent( "\n          <tr><th>$ligne");
    // Les colonnes de multiplication
    for ($colonne = 0; $colonne <= INDICE_MAX; $colonne++) {
        $page->appendContent("<td>" . ($ligne * $colonne));
    }
}
$page->appendContent("\n        </table>\n");

$page->appendContent(<<<HTML
    </body>
</html>
HTML);

echo $page->toHTML();