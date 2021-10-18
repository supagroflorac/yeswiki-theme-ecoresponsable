<?php

const ECO_COLORS = array("social", "energy", "nature", "water");

function eco_color_from_title(string $title): string {

    $hash = hash("crc32", $title);
    $digit_val = hexdec($hash);
    $index = $digit_val % count(ECO_COLORS);

    $color = ECO_COLORS[$index];
    return $color;
}

function eco_resize_image_and_cached(mixed $image, int $width, int $height, string $default_image): string {
    if (!isset($image) or empty($image)) {
        return $default_image;
    }

    $resized_image = redimensionner_image(
        "files/{$image}",
        "cache/image_{$width}_{$height}_{$image}",
        $width, 
        $height,
        'crop'
    );

    if (empty($resized_image) === true) {
      return $default_image;
    }

    return $resized_image;
}

function eco_format_date(string $datetime): string {
    setlocale(LC_TIME, 'fr_FR.UTF-8');
    $dateFormat = "%e %B %G";
    return strftime($dateFormat, strtotime($datetime));
}

function eco_date_string(array $fiche): string {
    $date = 'Créé le ' . eco_format_date($fiche['date_creation_fiche']);
    if ($fiche['date_creation_fiche'] !== $fiche['date_maj_fiche']) {
      $date .= ' / Mis à jour le ' . eco_format_date($fiche['date_maj_fiche']);
    }

    return $date;
}

function eco_get_theme_path(): string {
    $themePath = "themes/ecoresponsables/";
    $altThemePath = "custom/{$themePath}";
    if (is_dir($altThemePath) === true) {
        $themePath = $altThemePath;
    }
    return $themePath;
}

