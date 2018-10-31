<?php

use yii\db\Migration;

/**
 * Handles the creation of table `departments`.
 */
class m181029_065655_create_departments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('departments', [
            'id' => $this->primaryKey(),
            'department_name' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('departments');
    }
}
