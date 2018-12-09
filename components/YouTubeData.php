<?php
/**
 * User: Vladimir Baranov <phpnt@yandex.ru>
 * Git: <https://github.com/phpnt>
 * VK: <https://vk.com/phpnt>
 * Date: 09.12.2018
 * Time: 11:49
 */

namespace phpnt\youtube\components;

use Yii;
use yii\base\Object;
use yii\base\UserException;
use yii\helpers\Json;

class YouTubeData extends Object
{
    public $key;

    public function init()
    {
        parent::init();
    }


    /* Получить ID видео. */
    public function getVideoID($video_link = null, $video_id = null) {
        $result = $this->checkVideo($video_link, $video_id, $part = 'snippet');
        return $result['items'][0]['id'];
    }

    /* Общая информация о видео. */
    public function getFullData($video_link = null, $video_id = null) {
        return $this->checkVideo($video_link, $video_id, $part = 'snippet');
    }

    /* Общая превью видео. $size может быть: default, medium, high, standard, maxres */
    public function getPreview($video_link = null, $video_id = null, $size = 'default') {
        $result = $this->checkVideo($video_link, $video_id, $part = 'snippet');
        return $result['items'][0]['snippet']['thumbnails'][$size];
    }

    /* Статистика видео. */
    public function getStatistics($video_link = null, $video_id = null) {
        $result = $this->checkVideo($video_link, $video_id, $part = 'statistics');
        return $result;
    }

    /**
     * Проверка существования видео
     *
     * @param string $video_link
     * @param string $video_id
     * @param string $part
     * @throws UserException
     */
    private function checkVideo($video_link = null, $video_id = null, $part) {
        if (!$video_link && !$video_id) {
            throw new UserException(Yii::t('app', 'Не отправлено свойство video_link или video_id.'));
        }
        if ($video_link && !$video_id) {
            $array = explode('/', $video_link);
            $video_id = array_pop($array);
            $video_id = str_replace('watch?v=', '', $video_id);
        }

        $json_result = file_get_contents ("https://www.googleapis.com/youtube/v3/videos?part=$part&id=$video_id&key=$this->key");
        $result = Json::decode($json_result);

        if (!$result['items']) {
            throw new UserException(Yii::t('app', 'Видео не найдено.'));
        }

        return $result;
    }
}