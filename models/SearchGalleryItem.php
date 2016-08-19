<?php

    namespace yii\grsolutions\gallery\models;

    use yii\base\Model;
    use yii\data\ActiveDataProvider;

    class SearchGalleryItem extends GalleryItem{
        /**
         * @inheritdoc
         */
        public function rules(){
            return [
                [['id', 'categoryId'], 'integer'],
                [[ 'description'], 'safe'],
            ];
        }

        /**
         * @inheritdoc
         */
        public function scenarios(){
            // bypass scenarios() implementation in the parent class
            return Model::scenarios();
        }

        /**
         * Creates data provider instance with search query applied
         *
         * @param array $params
         *
         * @return ActiveDataProvider
         */
        public function search($params){
            $query = GalleryItem::find();
            if(!isset($this->categoryId)){
                $this->categoryId = GalleryCategory::find()
                                                   ->all()[0]->id;
            }
            // add conditions that should always apply here

            $dataProvider = new ActiveDataProvider([
                                                       'query' => $query,
                                                   ]);

            $this->load($params);

            if(!$this->validate()){
                // uncomment the following line if you do not want to return any records when validation fails
                // $query->where('0=1');
                return $dataProvider;
            }

            // grid filtering conditions
            $query->andFilterWhere([
                                       'id'         => $this->id,
                                       'categoryId' => $this->categoryId,
                                   ]);

            $query->andFilterWhere(['like', 'description', $this->description]);

            return $dataProvider;
        }
    }