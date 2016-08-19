<?php

    use yii\db\Migration;

    /**
     * Handles the creation for table `gallery_item`.
     */
    class m160810_095701_create_gallery_item_table extends Migration{
        /**
         * @inheritdoc
         */
        public
        function up(){
            $this->createTable(
                '{{%gallery_item}}',
                [
                    'id' => $this->primaryKey(),
                    'categoryId' => $this->integer(),
                    'picture' => $this->string(),
                    'description' => $this->text()
                ]
            );

            $this->createIndex('categoryId', '{{%gallery_item}}', 'categoryId');
            $this->addForeignKey(
                'categoryId_FK', '{{%gallery_item}}', 'categoryId', '{{%gallery_category}}', 'id', 'SET NULL', 'CASCADE'
            );
        }

        /**
         * @inheritdoc
         */
        public
        function down(){
            $this->dropForeignKey('categoryId_FK', '{{%gallery_item}}');
            $this->dropTable('{{%gallery_item}}');
        }
    }
