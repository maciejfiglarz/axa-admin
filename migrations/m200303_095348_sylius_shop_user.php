<?php

use yii\db\Migration;

/**
 * Class m200303_095348_sylius_shop_user
 */
class m200303_095348_sylius_shop_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200303_095348_sylius_shop_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200303_095348_sylius_shop_user cannot be reverted.\n";

        return false;
    }
    */
}
