<?php

    namespace yii\grsolutions\gallery\controllers;

    use yii\grsolutions\gallery\models\GalleryCategory;
    use yii\grsolutions\gallery\models\GalleryItem;
    use yii\grsolutions\gallery\models\GalleryModel;
    use yii\grsolutions\gallery\models\SearchGalleryItem;
    use Yii;
    use yii\web\Controller;

    class GalleryController extends Controller{

        public function actionIndex(){
            $galleryCategoryModel = GalleryCategory::find()
                                                   ->all();
            $searchModel = new SearchGalleryItem();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'galleryCategoryModel' => $galleryCategoryModel,
                'searchModel'          => $searchModel,
                'dataProvider'         => $dataProvider
            ]);
        }

        public function actionCreateCatalog(){
            $galleryModel = new GalleryModel(['catalog' => new GalleryCategory()]);
            if($galleryModel->load(Yii::$app->request->post()) && $galleryModel->create()){
                return $this->redirect('index');
            }

            return $this->render('create', ['galleryModel' => $galleryModel]);
        }
        public function actionUpdateCatalog($catalogId){
            $galleryModel = new GalleryModel(['catalog' => GalleryCategory::findOne($catalogId)]);
            if($galleryModel->load(Yii::$app->request->post()) && $galleryModel->create()){
                return $this->redirect(['index','SearchGalleryItem[categoryId]' => $catalogId]);
            }

            return $this->render('update', ['galleryModel' => $galleryModel]);
        }

        public function actionUpdateItem($itemId){
            $itemModel = GalleryItem::findOne($itemId);
            if($itemModel->load(Yii::$app->request->post()) && $itemModel->save()){
                return $this->redirect(['index','SearchGalleryItem[categoryId]' => $itemModel->categoryId]);
            }

            return $this->render('update_item', ['itemModel' => $itemModel]);
        }

        public function actionAddImage($catalogId){
            $galleryModel = new GalleryModel(['catalog' => GalleryCategory::findOne($catalogId)]);

            if($galleryModel->load(Yii::$app->request->post()) && $galleryModel->create()){
                return $this->goBack();
            }

            return $this->render('add_image', ['galleryModel' => $galleryModel]);
        }

        public function actionDeleteItem($itemId){
            GalleryItem::findOne($itemId)->delete();
            return $this->redirect(['index']);
        }

        public function actionDeleteCatalog($catalogId){
            $galleryModel = new GalleryModel(['catalog' => GalleryCategory::findOne($catalogId)]);
            $galleryModel->delete();
            return $this->redirect(['index']);
        }
    }