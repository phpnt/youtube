<?php
/**
 * User: Vladimir Baranov <phpnt@yandex.ru>
 * Git: <https://github.com/phpnt>
 * VK: <https://vk.com/phpnt>
 * Date: 09.12.2018
 * Time: 13:50
 */

namespace phpnt\youtube\assets;

use yii\web\AssetBundle;

class YouTubeAssets extends AssetBundle
{
    /**
     * @inherit
     */
    public $sourcePath = '@phpnt/youtube';
    /**
     * @inherit
     */
    public $css = [
        'css/style.css'
    ];
}