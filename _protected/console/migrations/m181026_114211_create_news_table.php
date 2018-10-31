<?php

use yii\db\Migration;

/**
 * Handles the creation of table `news`.
 */
class m181026_114211_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('news', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255),
            'description' => $this->string(255),
            'published_date' => $this->date(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('news');
    }
}
