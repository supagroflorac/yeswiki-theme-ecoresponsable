<?php

function eco_color_from_title(string $title): string {
    $list_colors = array("social", "energy", "nature", "water");

    $hash = hash("crc32", $title);
    $digit_val = hexdec($hash);
    $index = $digit_val % count($list_colors);

    $color = $list_colors[$index];
    return $color;
}

function eco_resize_image_and_cached(string $image_file, int $with, int $height, string $default_result): string {
    if (isset($fiche['imagethumbs']) and !empty($fiche['imagethumbs'])) {
        $imageUri = redimensionner_image(
          "files/{$fiche['imagethumbs']}",
          "cache/image_{$thumb_size}_{$thumb_size}_{$fiche['imagethumbs']}",
          $thumb_size, $thumb_size, 'crop'
        ); 
        if (empty($imageUri) !== true) {
          $image = "<img src='{$imageUri}'/>\n";
        }
    }
}
