<?php
use yii\helpers\Html;
use yii\helpers\Url;

/** @var $this \yii\web\View */
/** @var $model \common\models\Video */

$this->title = $model->title . ' | ' . Yii::$app->name;

?>
<div class="row">
    <div class="col-sm-8">
        <div class="embed-responsive embed-responsive-16by9">
            <video class="embed-responsive-item"
                   poster="<?php echo $model->getThumbnailLink() ?>"
                   src="<?php echo $model->getVideoLink()?>"controls></video>
        </div>
        <h6 class="mt-2"><?php echo $model->title ?></h6>
        <div class="d-flex justify-content-between align-items-center">
        <p class="text-muted card-text m-0"><?php echo $model->createdBy->username ?></p>
        <p class="text-muted card-text m-0"> 140 views . <?php echo Yii::$app->formatter->asRelativeTime($model->created_at) ?></p>
    </div>
</div>

