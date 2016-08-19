<?php

    /** @var yii\grsolutions\gallery\models\GalleryCategory[] $galleryCategoryModel */
    /** @var yii\grsolutions\gallery\models\SearchGalleryItem $searchModel */
    /** @var \yii\data\ActiveDataProvider $dataProvider */
    use yii\helpers\Html;
    use yii\widgets\ListView;
    use yii\widgets\Pjax;

    $this->title = 'Gallery';
?>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <?= Html::a('Create Catalog', ['create-catalog'],['class'=>'navbar-brand'])?>
            <?= Html::a('Add Image', ['add-image', 'catalogId' =>$searchModel->categoryId],['class'=>'navbar-brand'])?>
            <?= Html::a('Edit Catalog', ['update-catalog', 'catalogId' =>$searchModel->categoryId],['class'=>'navbar-brand'])?>
            <?= Html::a('Delete Catalog', ['delete-catalog', 'catalogId' =>$searchModel->categoryId],['class'=>'navbar-brand'])?>
        </div>
    </div>
</nav>
<div class="row">
    <div class="col-lg-2">
        <?php foreach($galleryCategoryModel as $category){
            echo '<p>'.Html::a($category->title, ['gallery/index', 'SearchGalleryItem[categoryId]' => $category->id]).'</p>';
        } ?>
    </div>
    <div class="col-lg-10">
        <?php Pjax::begin() ?>
        <?= ListView::widget([
                                 'dataProvider' => $dataProvider,
                                 'itemView'     => '_list',
                             ]) ?>
        <?php Pjax::end() ?>
    </div>
</div>