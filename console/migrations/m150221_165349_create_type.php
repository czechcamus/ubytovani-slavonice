<?php
/**
 * TODO: Migration explanation.
 */
use yii\db\Migration;

class m150221_165349_create_type extends Migration
{
    public function safeUp()
    {
        $this->createTable('type', [
	        'id' => 'pk',
	        'title' => 'string(45)',
	        'model_type' => 'smallint'
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('type');
    }
}