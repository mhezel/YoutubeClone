<?php
use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
$this->beginContent('@backend/views/layouts/base.php');
?>
<main class="d-flex">
    <div class="content-wrapper p-3">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>
<?php $this->endContent() ?>
