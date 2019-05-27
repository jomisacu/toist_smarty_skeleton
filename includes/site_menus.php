<?php

use Toist\MenuItem;

$menus = [];

$menuItems = [
    new MenuItem('Inicio', 'home.php', 'menu-item'),
    new MenuItem('Seccion', 'section.php', 'menu-item'),
    new MenuItem('Contenido', 'content.php', 'menu-item'),
    new MenuItem('Pagina', 'page.php', 'menu-item'),
];

$menus['main_menu'] = new Toist\Menu('site-menus', 'main menu', $menuItems);
