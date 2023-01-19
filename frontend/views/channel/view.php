<?php

/** @var $channel \common\models\User */
/** @var $this \yii\web\view  */
/** @var $dataProvider \yii\data\ActiveDataProvider */

use yii\helpers\Url;
?>

<div class="jumbotron">
    <h1 class="display-4"><?php echo $channel->username ?></h1>
    <hr class="my-4">
    <?php yii\widgets\Pjax::begin()?>
        <?php echo $this->render('_subscribe',[
                'channel' => $channel
        ])?>
    <?php yii\widgets\Pjax::end()?>

    <?php echo \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'pager' => [
            'class' => \yii\bootstrap4\LinkPager::class,
        ],
        'itemView' => '@frontend/views/video/_video_item',
        'layout' => '<div class="d-flex flex-wrap">{items}</div>{pager}',
        'itemOptions' => [
            'tag' => false
        ]
    ]) ?>
</div>
