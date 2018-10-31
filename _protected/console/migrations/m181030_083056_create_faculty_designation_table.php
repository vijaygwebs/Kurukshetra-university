<?php

use yii\db\Migration;

/**
 * Handles the creation of table `faculty_designation`.
 * Has foreign keys to the tables:
 *
 * - `faculty`
 * - `departments`
 * - `subjects`
 * - `designations`
 */
class m181030_083056_create_faculty_designation_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('faculty_designation', [
            'id' => $this->primaryKey(),
            'faculty_id' => $this->integer(),
            'department_id' => $this->integer(),
            'subject_id' => $this->integer(),
            'designation_id' => $this->integer(),
        ]);

        // creates index for column `faculty_id`
        $this->createIndex(
            'idx-faculty_designation-faculty_id',
            'faculty_designation',
            'faculty_id'
        );

        // add foreign key for table `faculty`
        $this->addForeignKey(
            'fk-faculty_designation-faculty_id',
            'faculty_designation',
            'faculty_id',
            'faculty',
            'id',
            'CASCADE'
        );

        // creates index for column `department_id`
        $this->createIndex(
            'idx-faculty_designation-department_id',
            'faculty_designation',
            'department_id'
        );

        // add foreign key for table `departments`
        $this->addForeignKey(
            'fk-faculty_designation-department_id',
            'faculty_designation',
            'department_id',
            'departments',
            'id',
            'CASCADE'
        );

        // creates index for column `subject_id`
        $this->createIndex(
            'idx-faculty_designation-subject_id',
            'faculty_designation',
            'subject_id'
        );

        // add foreign key for table `subjects`
        $this->addForeignKey(
            'fk-faculty_designation-subject_id',
            'faculty_designation',
            'subject_id',
            'subjects',
            'id',
            'CASCADE'
        );

        // creates index for column `designation_id`
        $this->createIndex(
            'idx-faculty_designation-designation_id',
            'faculty_designation',
            'designation_id'
        );

        // add foreign key for table `designations`
        $this->addForeignKey(
            'fk-faculty_designation-designation_id',
            'faculty_designation',
            'designation_id',
            'designations',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `faculty`
        $this->dropForeignKey(
            'fk-faculty_designation-faculty_id',
            'faculty_designation'
        );

        // drops index for column `faculty_id`
        $this->dropIndex(
            'idx-faculty_designation-faculty_id',
            'faculty_designation'
        );

        // drops foreign key for table `departments`
        $this->dropForeignKey(
            'fk-faculty_designation-department_id',
            'faculty_designation'
        );

        // drops index for column `department_id`
        $this->dropIndex(
            'idx-faculty_designation-department_id',
            'faculty_designation'
        );

        // drops foreign key for table `subjects`
        $this->dropForeignKey(
            'fk-faculty_designation-subject_id',
            'faculty_designation'
        );

        // drops index for column `subject_id`
        $this->dropIndex(
            'idx-faculty_designation-subject_id',
            'faculty_designation'
        );

        // drops foreign key for table `designations`
        $this->dropForeignKey(
            'fk-faculty_designation-designation_id',
            'faculty_designation'
        );

        // drops index for column `designation_id`
        $this->dropIndex(
            'idx-faculty_designation-designation_id',
            'faculty_designation'
        );

        $this->dropTable('faculty_designation');
    }
}
