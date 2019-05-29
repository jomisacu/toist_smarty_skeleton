<?php

$contents = toist_getContentLists(true);

// only for demo purposes. you can use $named_contents from template
// and use specific contents.
$named_contents = [
    'some_key' => $contents['latest'][1],
];