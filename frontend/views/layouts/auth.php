<?php

/** @var \yii\web\View $this */
/** @var string $content */

use frontend\assets\AppAsset;
use common\widgets\Alert;

$this->beginContent('@frontend/views/layouts/base.php');

?>
<main class="d-flex">
    <div class="content-wrapper p-3">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>
<?php $this->endContent() ?>


