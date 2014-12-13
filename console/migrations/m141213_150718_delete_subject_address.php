<?php
/**
 * Drops or creates subject_address table
 */
use yii\db\Migration;

class m141213_150718_delete_subject_address extends Migration
{
    public function safeUp()
    {
        $this->dropIndex('subject_address_index', 'subject_address');
        $this->dropTable('subject_address');
    }

    public function safeDown()
    {
        $this->createTable(
            'subject_address',
            [
                'subject_id' => 'integer',
                'address_id' => 'integer'
            ]
        );
        $this->createIndex('subject_address_index', 'subject_address', ['subject_id', 'address_id'], true);
    }
}