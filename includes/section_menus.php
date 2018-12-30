<?php

use Toist\MenuItem;

$menus = [];

$menuItems = [
    new MenuItem('Inicio (desde el menu de la seccion)', 'home.php'),
    new MenuItem('Seccion (desde el menu de la seccion)', 'section.php'),
    new MenuItem('Lista (desde el menu de la seccion)', 'list.php'),
    new MenuItem('Contenido (desde el menu de la seccion)', 'content.php'),
    new MenuItem('Pagina (desde el menu de la seccion)', 'page.php'),
];

$menus['main_menu'] = new Toist\Menu($menuItems);
