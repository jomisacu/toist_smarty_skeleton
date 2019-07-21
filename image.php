<?php

use PHPImageWorkshop\Core\ImageWorkshopLayer;
use PHPImageWorkshop\ImageWorkshop;

require __DIR__.'/includes/init.php';
require __DIR__.'/includes/class/PHPImageWorkshop/ImageWorkshop.php';

$id     = $request->query->getInt('key');
$width  = $request->query->getInt('w', null);
$height = $request->query->getInt('h', null);
$fit    = $request->query->get('fit', 'crop');

$cachedFilepath = _getImageCachedFilePath([
    'key' => $id,
    'w' => $width,
    'h' => $height,
    'fit' => $fit,
]);

if ( ! file_exists($cachedFilepath)) {
    if ( ! $id) {
        exit('no image id');
    }
    
    $imagePath = __DIR__.'/images/'.$id.'.jpg';
    
    if ( ! file_exists($imagePath)) {
        exit('image file not found');
    }
    
    $layer = ImageWorkshop::initFromPath($imagePath);
    
    if ($width || $height) {
        if ($fit == 'crop') {
            $layer->resize(ImageWorkshopLayer::UNIT_PIXEL, $width, $height, ! $width || ! $height);
        } else { // fit == clip
            if ($width && $layer->getWidth() > $width) {
                $layer->resize(ImageWorkshopLayer::UNIT_PIXEL, $width, null, true);
            }
            
            if ($height && $layer->getHeight() > $height) {
                $layer->resize(ImageWorkshopLayer::UNIT_PIXEL, null, $height, true
                );
            }
        }
    }
    
    $folder    = dirname($cachedFilepath);
    $imageName = basename($cachedFilepath);
    
    $layer->save($folder, $imageName);
}

$binary = file_get_contents($cachedFilepath);

header('Content-Type: image/jpeg');
header('ETag: '.md5($binary));

echo $binary;

function _getImageCachedFilePath ($imageData)
{
    $imageName = '';
    foreach ($imageData as $attr => $value) {
        $imageName .= $attr.$value.'_';
    }
    $imageName = trim($imageName, '_');
    $imageName .= '.jpg';
    
    return sys_get_temp_dir().'/'.$imageName;
}