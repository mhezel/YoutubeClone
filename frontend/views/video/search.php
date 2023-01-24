<?php

use common\models\Video;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var yii\web\View $this */
?>

<h1>Found Videos</h1>

<?php echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    'pager' => [
        'class' => \yii\bootstrap4\LinkPager::class,
    ],
    'itemView' => '_video_item',
    'layout' => '<div class="d-flex flex-wrap">{items}</div>{pager}',
    'itemOptions' => [
        'tag' => false
    ]
]) ?>


