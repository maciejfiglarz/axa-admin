<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sylius_customer_group".
 *
 * @property int $id
 * @property string $code
 * @property string $name
 *
 * @property SyliusCustomer[] $syliusCustomers
 */
class SyliusCustomerGroup extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sylius_customer_group';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('dbSylius');
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code', 'name'], 'required','message' => 'To pole jest wymagane'],
            [['code', 'name'], 'string', 'max' => 255],
            [['code'], 'unique','message' => 'Ten kod jest już w bazie'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Kod',
            'name' => 'Nazwa',
        ];
    }

    /**
     * Gets query for [[SyliusCustomers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSyliusCustomers()
    {
        return $this->hasMany(SyliusCustomer::className(), ['customer_group_id' => 'id']);
    }
}
