<?php

use yii\db\Migration;

class m170824_192832_inser_super_user_to_user_table extends Migration
{
    public function safeUp()
    {
        $this->insert('user', [
            'name' => 'admin',
            'surname' => 'ivanov',
            'email' => 'admin@gmail.com',
            'password' => '123',
            'isAdmin' => '1'
        ]);
    }
}
