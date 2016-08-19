<?php

    namespace yii\grsolutions\gallery\models;

    use Yii;
    use yii\base\Model;
    use yii\db\Exception;

    class GalleryModel extends Model{
        /**
         * @var GalleryCategory
         */
        public $catalog;
        public $atachItems;

        public function scenarios(){
            return [
                'default' => ['category', 'atachItems']
            ];
        }

        public function __construct(array $config){
            $this->catalog = $config['category'];
            parent::__construct($config);
        }

        public function load($data){
            return $this->catalog->load($data) && parent::load($data);
        }

        public function create(){
            $transaction = Yii::$app->db->beginTransaction();
            try{
                if(!$this->catalog->save()){
                    throw new Exception('category not save');
                }
                foreach($this->atachItems as $item){
                    $galleryItem = new GalleryItem($item);
                    $galleryItem->categoryId = $this->catalog->id;
                    if(!$galleryItem->save()){
                        throw new Exception('item '.$item['picture'].' not save');
                    }
                }$transaction->commit();

            }catch(Exception $e){
                $transaction->rollBack();
            }
        }

        public function delete(){
            $transaction = Yii::$app->db->beginTransaction();
            try{
                foreach($this->catalog->galleryItems as $item){
                if(!$item->delete()){
                    throw new Exception('item '.$item['picture'].' not delete');
                }
                if(!$this->catalog->delete()){
                    throw new Exception('category not delete');
                }

                }$transaction->commit();

            }catch(Exception $e){
                $transaction->rollBack();
            }
        }
    }