<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sylius_address".
 *
 * @property int $id
 * @property int|null $customer_id
 * @property string $first_name
 * @property string $last_name
 * @property string|null $phone_number
 * @property string $street
 * @property string|null $company
 * @property string $city
 * @property string $postcode
 * @property string $created_at
 * @property string|null $updated_at
 * @property string $country_code
 * @property string|null $province_code
 * @property string|null $province_name
 *
 * @property SyliusCustomer $customer
 * @property SyliusCustomer $syliusCustomer
 * @property SyliusOrder $syliusOrder
 * @property SyliusOrder $syliusOrder0
 */
class SyliusAddress extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sylius_address';
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
            // [['customer_id'], 'integer'],
            [['first_name', 'last_name', 'street', 'city', 'postcode', 'created_at', 'country_code'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['first_name', 'last_name', 'phone_number', 'street', 'company', 'city', 'postcode', 'country_code', 'province_code', 'province_name'], 'string', 'max' => 255],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => SyliusCustomer::className(), 'targetAttribute' => ['customer_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'phone_number' => 'Phone Number',
            'street' => 'Street',
            'company' => 'Company',
            'city' => 'City',
            'postcode' => 'Postcode',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'country_code' => 'Country Code',
            'province_code' => 'Province Code',
            'province_name' => 'Province Name',
        ];
    }

    /**
     * Gets query for [[Customer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(SyliusCustomer::className(), ['id' => 'customer_id']);
    }

    /**
     * Gets query for [[SyliusCustomer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSyliusCustomer()
    {
        return $this->hasOne(SyliusCustomer::className(), ['default_address_id' => 'id']);
    }

    /**
     * Gets query for [[SyliusOrder]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSyliusOrder()
    {
        return $this->hasOne(SyliusOrder::className(), ['shipping_address_id' => 'id']);
    }

    /**
     * Gets query for [[SyliusOrder0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSyliusOrder0()
    {
        return $this->hasOne(SyliusOrder::className(), ['billing_address_id' => 'id']);
    }
}
