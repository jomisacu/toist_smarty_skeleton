<?php

require __DIR__ . '/includes/init.php';

require __DIR__ . '/includes/section_menus.php';
require __DIR__ . '/includes/section_contents.php';

$section = new Toist\Section('A site section on my site in toist.net', null, '/', false, '/', $menus, $contents, 20);


$smarty->assign('section', $section);

$smarty->display('index_section.tpl');