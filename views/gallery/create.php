<?php

    use yii\helpers\Html;

    $this->title = 'Create Catalog'
?>

<div class="gallery-catalog-create">

    <h1><?=Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $galleryModel,
    ]) ?>

</div>
