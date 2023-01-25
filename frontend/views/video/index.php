<?php

use common\models\Video;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */?>
<?php echo
    $this->render('_list',['dataProvider'=>$dataProvider]);
?>