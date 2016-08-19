<?php
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;

    /** @var yii\grsolutions\Gallery\models\GalleryModel $model */
?>

<div class="row">
    <div class="col-sm-12 col-md-8 col-lg-8">
        <?php $form = ActiveForm::begin() ?>
        <div class="panel panel-info">
            <div class="panel-heading">
                <?php
                    /** @var bool $add_image если добавление в каталог не отображать */
                    if(!$add_image){
                        echo $form->field($model->catalog, 'title');
                    }
                    foreach($model->catalog->galleryItems as $item):?>
                        <div class="row">
                            <div class="col-lg-3">
                                <?= \yii\helpers\Html::img($item->picture) ?>
                            </div>
                            <div class="col-lg-6">
                                <?= $item->description ?>
                            </div>
                            <div class="col-lg-3">
                                <?= Html::a('delete', ['delete-item', 'itemId' => $item->id]) ?>
                            </div>
                        </div>
                    <?php endforeach; ?>

                <?= $form->field($model, 'atachItems[0][picture]')
                         ->label('picture') ?>
                <?= $form->field($model, 'atachItems[0][description]')
                         ->label('description') ?>
                <?= $form->field($model, 'atachItems[1][picture]')
                         ->label('picture') ?>
                <?= $form->field($model, 'atachItems[1][description]')
                         ->label('description') ?>
                <?= \yii\helpers\Html::submitButton('Save') ?>
            </div>
        </div>
        <?php ActiveForm::end() ?>
    </div>
</div>

