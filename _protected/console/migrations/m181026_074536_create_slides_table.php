<?php

use yii\db\Migration;

/**
 * Handles the creation of table `slides`.
 * Has foreign keys to the tables:
 *
 * - `frontend_sliders`
 */
class m181026_074536_create_slides_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('slides', [
            'id' => $this->primaryKey(),
            'slider_id' => $this->integer()->notNull(),
            'title' => $this->string(255),
            'description' => $this->string(255),
            'image' => $this->string(255),
            'status' => $this->integer(),
        ]);

        // creates index for column `slider_id`
        $this->createIndex(
            'idx-slides-slider_id',
            'slides',
            'slider_id'
        );

        // add foreign key for table `frontend_sliders`
        $this->addForeignKey(
            'fk-slides-slider_id',
            'slides',
            'slider_id',
            'frontend_sliders',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `frontend_sliders`
        $this->dropForeignKey(
            'fk-slides-slider_id',
            'slides'
        );

        // drops index for column `slider_id`
        $this->dropIndex(
            'idx-slides-slider_id',
            'slides'
        );

        $this->dropTable('slides');
    }
}
