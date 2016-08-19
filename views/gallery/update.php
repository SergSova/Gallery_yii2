<?php
    use yii\helpers\Html;
    /** @var \yii\grsolutions\Gallery\models\GalleryModel $galleryModel */

    $this->title = 'Update Catalog '.$galleryModel->catalog->title
?>

<div class="gallery-catalog-create">

    <h1><?=Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $galleryModel,
    ]) ?>

</div>
