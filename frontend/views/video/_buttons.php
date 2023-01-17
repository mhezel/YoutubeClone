<?php

/** @var $model \common\models\Video */
use yii\helpers\Url;

?>
<a href="<?php echo Url::to(['/video/like','id'=> $model->video_id])?>"class="btn btn-outline-primary" data-method="post" data-pjax="1">
    <i class="fa-solid fa-thumbs-up"></i>
</a>
<button class="btn btn-outline-secondary">
    <i class="fa-solid fa-thumbs-down"></i>
</button>
