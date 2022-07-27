<?php

use Breakdance\DynamicData\ImageData;
use \Breakdance\DynamicData\ImageField;

class BreakdanceImage extends ImageField
{

    /**
     * @inheritDoc
     */
    public function label()
    {
        return 'Breakdance Image';
    }

    /**
     * @inheritDoc
     */
    public function category()
    {
        return 'Breakdance Field';
    }

    /**
     * @inheritDoc
     */
    public function slug()
    {
        return 'breakdance_image';
    }

    /**
     * @inheritDoc
     */
    public function handler($attributes): ImageData
    {
        $breakdancingImage = $this->getBreakdancingImage();
        $imageData = new ImageData();
        $imageData->url = $breakdancingImage['url'];
        $imageData->sizes = $breakdancingImage['sizes'];

        return $imageData;
    }

    /**
     * Returns a random image from unsplash with the keyword
     * breakdance for every available WordPress size
     *
     * @return array
     */
    private function getBreakdancingImage() {
        $url = 'https://source.unsplash.com/random/?breakdance';
        $sizes = [];
        $sizes['full'] = [
            'url' => "https://source.unsplash.com/random/?breakdance",
            'height' => 1200,
            'width' => 900,
            'orientation' => 'portrait',
        ];
        foreach ($this->getAllImageSizes() as $sizeKey => $size) {
            $sizes[$sizeKey] = [
                'url' => "https://source.unsplash.com/random/{$size['height']}x{$size['width']}/?breakdance",
                'height' => $size['height'],
                'width' => $size['width'],
                'orientation' => $size['height'] > $size['width'] ? 'portrait' : 'landscape',
            ];
        }

        return compact('url', 'sizes');
    }

    /**
     * Get all available image sizes from WordPress
     *
     * @return array
     */
    private function getAllImageSizes()
    {
        global $_wp_additional_image_sizes;

        $default_image_sizes = get_intermediate_image_sizes();

        foreach ($default_image_sizes as $size) {
            $image_sizes[$size]['width'] = (int)get_option("{$size}_size_w");
            $image_sizes[$size]['height'] = (int)get_option("{$size}_size_h");
            $image_sizes[$size]['crop'] = get_option("{$size}_crop") ? get_option("{$size}_crop") : false;
        }

        if (isset($_wp_additional_image_sizes) && count($_wp_additional_image_sizes)) {
            $image_sizes = array_merge($image_sizes, $_wp_additional_image_sizes);
        }

        return $image_sizes;
    }
}
