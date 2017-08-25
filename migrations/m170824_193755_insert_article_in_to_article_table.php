<?php

use yii\db\Migration;

class m170824_193755_insert_article_in_to_article_table extends Migration
{
    public function safeUp()
    {
        $this->insert('article', [
            'title' => 'THE HUFFINGTON POST',
            'date' => '2017-08-24',
            'text' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.
                Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit.',
            'author' => 'Admin',
        ]);
    }
}
