<?php

use PHPImageWorkshop\Core\ImageWorkshopLayer;
use PHPImageWorkshop\ImageWorkshop;

require __DIR__.'/includes/init.php';
require __DIR__.'/includes/class/PHPImageWorkshop/ImageWorkshop.php';

$id        = $request->query->getInt('id');
$width     = $request->query->getInt('w');
$height    = $request->query->getInt('h');
$maxWidth  = $request->query->getInt('mw');
$maxHeight = $request->query->getInt('mh');

$cachedFilepath = _getImageCachedFilePath([
    'id' => $id,
    'w' => $width,
    'h' => $height,
    'mw' => $maxWidth,
    'mh' => $maxHeight,
]);

if (!file_exists($cachedFilepath)) {
    if ( ! $id) {
        exit('no image id');
    }
    
    $imagePath = __DIR__.'/images/'.$id.'.jpg';
    
    if ( ! file_exists($imagePath)) {
        exit('image file not found');
    }
    
    $layer = ImageWorkshop::initFromPath($imagePath);
    
    if ($width || $height) {
        $layer->resize(ImageWorkshopLayer::UNIT_PIXEL, $width ?: null, $height ?: null, !$width || !$height);
    } else {
        if ($maxWidth || $maxHeight) {
            if ($maxWidth && $layer->getWidth() > $maxWidth) {
                $layer->resize(ImageWorkshopLayer::UNIT_PIXEL, $maxWidth);
            }
            
            if ($maxHeight && $layer->getHeight() > $maxHeight) {
                $layer->resize(
                    ImageWorkshopLayer::UNIT_PIXEL,
                    null,
                    $maxHeight
                );
            }
        }
    }
    
    $layer->save(dirname($cachedFilepath), basename($cachedFilepath));
}

$binary = file_get_contents($cachedFilepath);

header('Content-Type: image/jpeg');
header('ETag: ' . md5($binary));

echo $binary;

function _getImageCachedFilePath ($imageData) {
    $imageName = '';
    foreach ($imageData as $attr => $value) {
        $imageName .= $attr.$value.'_';
    }
    $imageName = trim($imageName, '_');
    $imageName .= '.jpg';
    
    return sys_get_temp_dir() . '/' . $imageName;
}