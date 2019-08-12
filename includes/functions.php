<?php

function toist_printr($data) {
    header('Content-Type: text/plain;charset=utf-8');
    print_r($data);
    exit;
}

function toist_buildBlockImages ($index, $limit = null) {
    $imageIds = [
        1,2,3,4,5,6
    ];
    
    $images = [];
    
    $limit = (int)$limit ?: rand(1, 20);
    
    for ($i = 0; $i < $limit; $i++) {
        $imageId = $imageIds[rand(0, 5)];
        $images[] = [
            'title' => 'The title for the image ' . $i . ' in the gallery ' . $index,
            'href' => 'the href for the image',
            'link' => 'the href for the image',
            'description' => 'the description for the image',
            'id' => $imageId,
            'key' => $imageId,
        ];
    }
    
    return $images;
}

/**
 * Creates content lists with example items
 * If your design uses custom content lists
 * you can provide it through the $contentListKeys
 * array
 *
 * @param array $contentListKeys
 *
 * @return array
 */
function toist_getContentLists($contentListKeys = [])
{
    $contents = [
        'latest' => [],
        'most_commented' => [],
        'most_viewed' => [],
        'featured' => [],
    ];
    
    // create all contents under the "latest" list
    foreach (range(1, 500) as $index) {
        
        $publicationDateInt = time();
        
        $image1 = ($index % 6) + 1;
        $image2 = ($index % 6) + 1;
        $image3 = ($index % 6) + 1;
    
        $blocks      = toist_getContentBlocks();
        $contents['latest'][$index] = [
            'categories' => [
                1 => [
                    'id' => 1,
                    'name' => 'category 1',
                    'permanent_url' => 'category-1/',
                ],
                2 => [
                    'id' => 2,
                    'name' => 'category 2',
                    'permanent_url' => 'category-2/',
                ],
            ],
            'related_contents' => array_slice($contents['latest'], 0, 19),
            'author_username' => 'JohnSmith999999',
            'author_full_name' => 'John Smith',
            'publication_date' => date('Y-m-d H:i:s', $publicationDateInt),
            'publication_date_int' => $publicationDateInt,
            'id' => $index,
            'title' => 'The title for the content #'.$index,
            'description' => 'This is the description for the content #'.$index,
            'url_title' => 'the-title-for-content-'.$index,
            'author_id' => 1,
            'published' => 1,
            'ready' => 1,
            'created_at' => date('Y-m-d H:i:s', $publicationDateInt - (3600 * 5)),
            'created_at_int' => $publicationDateInt - (3600 * 5),
            'image_square_id' => $image1,
            'image_wide_id' => $image2,
            'plain_text' => toist_getBlocksPlainText($blocks),
            'allow_comments' => 1,
            'blocks' => $blocks,
            'is_page' => false,
            'site_id' => 1,
            'permanent_url' => 'content.php?id='.$index,
            'comments_count' => rand(0, 127),
            'featured' => rand(1, 100) % 5 == 0,
            'body' => '',
            'keyword' => '',
            'views_count' => rand(1, 100) % 25 == 0 ? rand(1200, 1500) : $index,
            'source' => 'http://www.example.com/the-permanent-url-where-original-content-was-published/',
            'via' => 'algun-valor-valido-para-via',
        ];
    }
    
    if ($contentListKeys) {
        foreach ($contentListKeys as $contentListKey) {
            $contents[$contentListKey] = $contents['latest'];
        }
    }
    
    foreach ($contents['latest'] as $index => $content) {
        if ($content['featured']) {
            $contents['featured'][$index] = $content;
        }
    }
    
    $contents['most_viewed'] = $contents['latest'];
    
    uasort(
        $contents['latest'],
        function ($c1, $c2) {
            if ($c1['views_count'] > $c2['views_count']) {
                return 1;
            }
            if ($c1['views_count'] < $c2['views_count']) {
                return -1;
            }
            return 0;
        }
    );
    
    $contents['most_commented'] = $contents['latest'];
    
    uasort(
        $contents['most_commented'],
        function ($c1, $c2) {
            if ($c1['comments_count'] > $c2['comments_count']) {
                return 1;
            }
            if ($c1['comments_count'] < $c2['comments_count']) {
                return -1;
            }
            return 0;
        }
    );
    
    return $contents;
}

function toist_getContentBlocks($order = ['title', 'gallery', 'title', 'text', 'gallery', 'text', 'gallery', 'text', 'gallery']) {
    
    $blocks = [];
    
    $galleries = [
        // slidewshow
        [
            'type' => 'gallery',
            'images' => toist_buildBlockImages(1, 20),
            'display_options' => [
                'slideshow',
                // 'float_left',
                // 'float_right',
            ]
        ],
        
        // one image
        [
            'type' => 'gallery',
            'images' => toist_buildBlockImages(1, 1),
            'display_options' => [
                // 'slideshow',
                // 'float_left',
                // 'float_right',
            ]
        ],
        
        // left image
        [
            'type' => 'gallery',
            'images' => toist_buildBlockImages(1, 1),
            'display_options' => [
                // 'slideshow',
                'float_left',
                // 'float_right',
            ]
        ],
        
        // right image
        [
            'type' => 'gallery',
            'images' => toist_buildBlockImages(1, 1),
            'display_options' => [
                // 'slideshow',
                // 'float_left',
                'float_right',
            ]
        ],
    ];
    
    $titles = [
        [
            'type' => 'title',
            'text' => 'Some title in your content',
        ],
    ];
    
    $texts = [
        [
            'type' => 'text',
            'text' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi finibus venenatis elit ut tincidunt. Praesent non semper ligula. Nam pulvinar porttitor odio, et molestie libero euismod sodales. Proin ut tristique lectus, vulputate pretium purus. Cras placerat mauris quis nunc egestas, ut pretium lectus gravida. Aenean eros nisi, faucibus sed augue a, rutrum semper nisl. Suspendisse nec est nec quam aliquet fringilla a nec neque. Proin volutpat lorem quis aliquet iaculis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sodales enim ante, a fringilla nisl dapibus at.</p>

<p>Curabitur aliquam leo nec lacus faucibus tristique. Donec in est dolor. Integer vestibulum dolor elit, pulvinar aliquet mauris laoreet non. Vivamus at odio a quam ornare vulputate. Morbi sed pulvinar dui. In ultricies neque vel erat pellentesque faucibus. Pellentesque mollis, nibh non porta fringilla, neque diam tincidunt neque, eget venenatis libero felis sed urna. Nullam ut egestas lorem. Cras ultricies lacus purus. Donec at arcu at arcu efficitur laoreet ac in dui. Sed ultrices condimentum risus sit amet semper. Curabitur porttitor hendrerit erat, efficitur dapibus ipsum pulvinar ut. Ut non massa eget turpis rhoncus efficitur non in nisl.</p>

<p>Etiam egestas elit a feugiat venenatis. Duis finibus, sem vel finibus egestas, nisl purus tincidunt lectus, ac maximus nisi augue in leo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin a viverra lectus, vitae venenatis turpis. Sed nibh leo, condimentum at nunc eu, convallis malesuada ipsum. In ac venenatis erat. Vestibulum ut eros imperdiet, varius magna et, interdum purus. Curabitur nec neque dictum, semper erat hendrerit, congue sapien. Aenean placerat, diam a imperdiet laoreet, ligula turpis finibus orci, nec gravida felis turpis a purus. Proin facilisis rhoncus imperdiet. In ultricies nec purus ut porttitor. Sed iaculis sit amet turpis at interdum. Sed id pretium ex. In a volutpat orci. Ut volutpat efficitur varius.</p>

<p>Sed et velit ac magna egestas hendrerit at ut dolor. Proin placerat sem ut posuere sollicitudin. Praesent suscipit arcu a eros gravida ornare. Pellentesque vehicula, neque nec mollis ultrices, mauris ante condimentum magna, vitae viverra lorem dolor vitae ex. Donec dui nunc, auctor vel elit id, mattis ultrices libero. Quisque mattis massa nisl, vitae ornare justo accumsan sit amet. Quisque quis consectetur urna. Duis ut arcu nisi. Donec finibus ante consequat, mollis enim non, pharetra quam.</p>

<p>Proin vitae massa nec felis auctor sodales. Praesent nec libero tempus nulla rutrum fermentum ac in lorem. Mauris tempus nec enim nec elementum. Aenean sagittis rutrum nunc at porttitor. Nunc maximus urna et justo convallis rutrum. Proin volutpat nibh ut sem rhoncus, at pretium elit pharetra. Nulla a pulvinar odio, at fringilla justo. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Suspendisse potenti.</p>',
        ],
    ];
    
    foreach ($order as $type) {
        if ($type == 'gallery') {
            $blocks[] = $galleries[rand(0, count($galleries) - 1)];
        } else if ($type == 'title') {
            $blocks[] = $titles[rand(0, count($titles) - 1)];
        } else if ($type == 'text') {
            $blocks[] = $texts[rand(0, count($texts) - 1)];
        }
    }
    
    return $blocks;
}

function toist_getBlocksPlainText($blocks) {
    $plainText = "";
    
    foreach ($blocks as $block) {
        if ($block['type'] == 'text') {
            $plainText .= strip_tags($block['text']);
        }
    }
    
    return $plainText;
}

function translate ($key) {
    $lang = new \Toist\Lang();
    
    return $lang->$key;
}

