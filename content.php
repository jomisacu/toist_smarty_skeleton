<?php

require __DIR__ . '/includes/init.php';

require __DIR__ . '/includes/site_menus.php';
require __DIR__ . '/includes/site_contents.php';

$contentid = $request->query->getInt('id', 1);

$content = toist_getContentLists()['latest'][$contentid];

$section = new Toist\Section('Example section', null, '/', true, '/', $menus, toist_getContentLists(), 20);

$smarty->assign('section', $section);

$smarty->assign('content', $content);
$smarty->display('index_content.tpl');