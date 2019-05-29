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
            'link' => 'the href for the image',
            'description' => 'the description for the image',
            'id' => $imageId,
        ];
    }
    
    return $images;
}

function toist_getContentLists($fromSection = false)
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
        
        $contents['latest'][$index] = [
            'publication_date' => $publicationDateInt,
            'id' => $index,
            'title' => 'The title for the content #'.$index,
            'description' => 'This is the description for the content #'.$index,
            'url_title' => 'the-title-for-content-'.$index,
            'author_id' => 1,
            'published' => 1,
            'ready' => 1,
            'created_at' => $publicationDateInt - (3600 * 5),
            'image_square_id' => $image1,
            'image_wide_id' => $image2,
            'plain_text' => 'The plain text of content (all blocks and galleries)',
            'allow_comments' => 1,
            'blocks' => [
                [
                    'type' => 'title',
                    'text' => 'titulo 1 del contenido ' . $index,
                ],
                [
                    'type' => 'gallery',
                    'images' => toist_buildBlockImages($index),
                    'display_option' => [
                        'slideshow' => 1,
                        'float_left' => false,
                        'float_right' => false,
                    ]
                ],
                [
                    'type' => 'text',
                    'text' => 'Texto para el bloque 1 del contenido ' . $index,
                ],
            ],
            'is_page' => false,
            'site_id' => 1,
            'permanent_url' => 'content.php?id='.$index,
            'comments_count' => $index,
            'featured' => rand(1, 100) % 5 == 0,
            'body' => '',
            'keyword' => '',
            'views_count' => rand(1, 100) % 25 == 0 ? rand(1200, 1500) : $index,
            'source' => 'http://www.example.com/the-permanent-url-where-original-content-was-published/',
            'via' => 'algun-valor-valido-para-via',
        ];
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

