<?php

use Toist\MenuItem;

$menus = [];

$menuItems = [
    new MenuItem('Inicio', 'home.php'),
    new MenuItem('Seccion', 'section.php'),
    new MenuItem('Lista', 'list.php'),
    new MenuItem('Contenido', 'content.php'),
    new MenuItem('Pagina', 'page.php'),
];

$menus['main_menu'] = new Toist\Menu($menuItems);
