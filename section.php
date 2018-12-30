<?php

require __DIR__ . '/includes/init.php';

require __DIR__ . '/includes/section_menus.php';
require __DIR__ . '/includes/section_contents.php';

$section = new Toist\Section($menus, $contents, 20);


$smarty->assign('section', $section);

$smarty->display('index_section.tpl');