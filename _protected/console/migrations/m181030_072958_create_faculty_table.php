<?php

use yii\db\Migration;

/**
 * Handles the creation of table `faculty`.
 */
class m181030_072958_create_faculty_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('faculty', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'email' => $this->string(255),
            'Contact_no' => $this->string(255),
            'profile_img' => $this->string(255),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('faculty');
    }
}
