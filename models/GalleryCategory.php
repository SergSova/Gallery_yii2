<?php
    namespace yii\grsolutions\gallery\models;

    use yii\db\ActiveRecord;

    /**
     * This is the model class for table "{{%gallery_category}}".
     *
     * @property integer       $id
     * @property string        $title
     *
     * @property GalleryItem[] $galleryItems
     */
    class GalleryCategory extends ActiveRecord{
        public $atachItems;

        /**
         * @inheritdoc
         */
        public static function tableName(){
            return '{{%gallery_category}}';
        }

        public function scenarios(){
            return [
                'default' => ['title','atachItems']
            ];
        }

        /**
         * @inheritdoc
         */
        public function rules(){
            return [
                [['title'], 'string', 'max' => 255],
                ['atachItems', 'safe']
            ];
        }

        /**
         * @inheritdoc
         */
        public function attributeLabels(){
            return [
                'id'    => 'ID',
                'title' => 'Title',
            ];
        }

        /**
         * @return \yii\db\ActiveQuery
         */
        public function getGalleryItems(){
            return $this->hasMany(GalleryItem::className(), ['categoryId' => 'id']);
        }
    }
