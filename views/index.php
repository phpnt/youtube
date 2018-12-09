<?php
/**
 * User: Vladimir Baranov <phpnt@yandex.ru>
 * Git: <https://github.com/phpnt>
 * VK: <https://vk.com/phpnt>
 * Date: 09.12.2018
 * Time: 11:01
 */

/* @var $this \yii\web\View */
/* @var $widget \phpnt\youtube\YouTubeWidget */
?>
<div class="video-container">
    <iframe src="//www.youtube.com/embed/<?= $widget->video_id ?>" allowfullscreen="" frameborder="0"></iframe>
</div>