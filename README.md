phpNT - Yii2 YouTube Widget
================================
[![Latest Stable Version](https://poser.pugx.org/phpnt/youtube/v/stable)](https://packagist.org/packages/phpnt/youtube) [![Total Downloads](https://poser.pugx.org/phpnt/youtube/downloads)](https://packagist.org/packages/phpnt/youtube) [![Latest Unstable Version](https://poser.pugx.org/phpnt/youtube/v/unstable)](https://packagist.org/packages/phpnt/youtube) [![License](https://poser.pugx.org/phpnt/youtube/license)](https://packagist.org/packages/phpnt/youtube)
### Описание:
### Yii2 YouTube - Виджет для получения YouTube видео и информации о нем

### Социальные сети:
 - [Канал YouTube](https://www.youtube.com/c/phpnt)
 - [Группа VK](https://vk.com/phpnt)
 - [Группа facebook](https://www.facebook.com/Phpnt-595851240515413/)

------------

Установка:

------------

```
php composer.phar require "phpnt/youtube" "*"
```
или

```
composer require phpnt/youtube
```

или добавить в composer.json файл

```
"phpnt/youtube": "*"

```

### Настройка:
------------
```php
// добавить компонент
    'components' => [
        ...
        'youTubeData' => [
            'class' => \phpnt\youtube\components\YouTubeData::class,
            'key' => '<ключ YouTube Data API v3>',
        ],
    ],
    ...
```
### Представление:
------------
```php
// Подключение виджета
use phpnt\youtube\YouTubeWidget;
// Подключение компонента
/* @var $youTubeData \phpnt\youtube\components\YouTubeData */
$youTubeData = Yii::$app->youTubeData;
```
```php
// вывод видео
echo YouTubeWidget::widget(['video_link' => <ссылка на видео>]);
// или
echo YouTubeWidget::widget(['video_id' => <ID видео>]);

// Работа с компонентом
// Получение ID видео из ссылки или проверка его (строка)
$videoID = $youTubeData->getVideoID(<Ссылка на видео>);
// или
$videoID = $youTubeData->getVideoID(null, <ID видео>);

// Получение данных о видео (массив)
$videoData = $youTubeData->getFullData(<Ссылка на видео>);
// или
$videoData = $youTubeData->getFullData(null, <ID видео>);

// Получение превью видео (массив). $size может быть: default, medium, high, standard, maxres (по умолчанию 'default').
$videoPreview = $youTubeData->getPreview(<Ссылка на видео>);
// или
$videoPreview = $youTubeData->getPreview(<Ссылка на видео>, null, $size = 'standard');
// или
$videoPreview = $youTubeData->getPreview(null, <ID видео>, $size = 'standard');

// Получение статистики видео (массив)
$videoStat = $youTubeData->getStatistics(<Ссылка на видео>);
// или
$videoStat = $youTubeData->getStatistics(null, <ID видео>);
``` 
------------
### Лицензия:
### [MIT](https://ru.wikipedia.org/wiki/%D0%9B%D0%B8%D1%86%D0%B5%D0%BD%D0%B7%D0%B8%D1%8F_MIT)
------------
