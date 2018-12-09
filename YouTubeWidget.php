<?php
/**
 * User: Vladimir Baranov <phpnt@yandex.ru>
 * Git: <https://github.com/phpnt>
 * VK: <https://vk.com/phpnt>
 * Date: 09.12.2018
 * Time: 10:59
 */

namespace phpnt\youtube;

use Yii;
use yii\base\UserException;
use yii\base\Widget;
use phpnt\youtube\assets\YouTubeAssets;
use phpnt\youtube\components\YouTubeData;

class YouTubeWidget extends Widget
{
    public $video_link;
    public $video_id;

    public function init()
    {
        parent::init();
    }

    /**
     * @throws UserException
     */
    public function run()
    {
        /* @var $youTubeData YouTubeData */
        $youTubeData = Yii::$app->youTubeData;
        $this->video_id = $youTubeData->getVideoID($this->video_link, $this->video_id);

        $view = $this->getView();
        YouTubeAssets::register($view);

        return $this->render('index', [
            'widget' => $this,
        ]);
    }
}