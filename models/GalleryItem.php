<?php
    namespace yii\grsolutions\gallery\models;

    use yii\db\ActiveRecord;

    /**
     * This is the model class for table "{{%gallery_item}}".
     *
     * @property integer         $id
     * @property integer         $categoryId
     * @property string          $picture
     * @property string          $description
     *
     * @property GalleryCategory $category
     */
    class GalleryItem extends ActiveRecord{
        /**
         * @inheritdoc
         */
        public static function tableName(){
            return '{{%gallery_item}}';
        }

        /**
         * @inheritdoc
         */
        public function rules(){
            return [
                [['categoryId'], 'integer'],
                [['description'], 'string'],
                [['picture'], 'string', 'max' => 255],
                [
                    ['categoryId'],
                    'exist',
                    'skipOnError'     => true,
                    'targetClass'     => GalleryCategory::className(),
                    'targetAttribute' => ['categoryId' => 'id']
                ],
            ];
        }

        public function scenarios(){
            return [
                'default' => ['categoryId', 'description', 'picture']
            ];
        }

        /**
         * @inheritdoc
         */
        public function attributeLabels(){
            return [
                'id'          => 'ID',
                'categoryId'  => 'Category ID',
                'picture'     => 'Picture',
                'description' => 'Description',
            ];
        }

        /**
         * @return \yii\db\ActiveQuery
         */
        public function getCategory(){
            return $this->hasOne(GalleryCategory::className(), ['id' => 'categoryId']);
        }
    }
