<?php

use yii\db\Migration;

/**
 * Handles the creation of table `subjects`.
 * Has foreign keys to the tables:
 *
 * - `departments`
 */
class m181029_070139_create_subjects_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('subjects', [
            'id' => $this->primaryKey(),
            'department_id' => $this->integer(),
            'subject_name' => $this->string(255),
        ]);

        // creates index for column `department_id`
        $this->createIndex(
            'idx-subjects-department_id',
            'subjects',
            'department_id'
        );

        // add foreign key for table `departments`
        $this->addForeignKey(
            'fk-subjects-department_id',
            'subjects',
            'department_id',
            'departments',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `departments`
        $this->dropForeignKey(
            'fk-subjects-department_id',
            'subjects'
        );

        // drops index for column `department_id`
        $this->dropIndex(
            'idx-subjects-department_id',
            'subjects'
        );

        $this->dropTable('subjects');
    }
}
