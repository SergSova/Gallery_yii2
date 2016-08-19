<?php
    /** @var yii\grsolutions\Gallery\models\GalleryItem $model */
    use yii\helpers\Html;

?>


<div class="row">
    <div class="col-lg-3">
        <?= $model->id?>
    </div>
    <div class="col-lg-4">
        <?=\yii\helpers\Html::img($model->picture)?>
    </div>
    <div class="col-lg-4">
        <?=$model->description?>
    </div>
    <div class="col-lg-1">
        <?=Html::a('delete',['delete-item','itemId'=>$model->id])?>
    </div>
</div>