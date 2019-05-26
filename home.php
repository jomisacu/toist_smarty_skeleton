<?php

require __DIR__ . '/includes/init.php';

require __DIR__ . '/includes/site_menus.php';
require __DIR__ . '/includes/site_contents.php';

$section = new Toist\Section('Example section', null, '/', true, '/', $menus, toist_getContentLists(), 20);

$smarty->assign('section', $section);

$smarty->display('index_section.tpl');