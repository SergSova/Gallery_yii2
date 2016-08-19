<?php
    use yii\helpers\Html;

    /** @var yii\grsolutions\Gallery\models\GalleryModel $galleryModel */

    $this->title = 'Add image to '.$galleryModel->catalog->title
?>

<div class="gallery-add-image">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model'     => $galleryModel,
        'add_image' => true
    ]) ?>

</div>
