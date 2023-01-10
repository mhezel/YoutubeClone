<?php

use common\models\Video;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Videos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Video', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'video_id',
            'title',
            'tags',
            'description',
            'status',
            //'has_thumbnail',
            //'video_name',
            //'created_at',
            //'updated_at',
            //'created_by',
            [
                'class' => ActionColumn::className(),
                'contentOptions' => [
                     'style'=>'width: 100px;text-align:center'
                ],
                'urlCreator' => function ($action, Video $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->video_id]);
                 }
            ],
        ],
    ]); ?>


</div>