<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sylius_customer".
 *
 * @property int $id
 * @property int|null $customer_group_id
 * @property int|null $default_address_id
 * @property string $email
 * @property string $email_canonical
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $birthday
 * @property string $gender
 * @property string $created_at
 * @property string|null $updated_at
 * @property string|null $phone_number
 * @property int $subscribed_to_newsletter
 *
 * @property SyliusAddress[] $syliusAddresses
 * @property SyliusAddress $defaultAddress
 * @property SyliusCustomerGroup $customerGroup
 * @property SyliusOrder[] $syliusOrders
 * @property SyliusProductReview[] $syliusProductReviews
 * @property SyliusShopUser $syliusShopUser
 */
class SyliusCustomer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sylius_customer';
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
            [['default_address_id'], 'integer'],
            [['email'], 'required','message' => 'To pole jest wymagane'],
            [['birthday'], 'safe'],
            [['email', 'email_canonical', 'first_name', 'last_name', 'phone_number'], 'string', 'max' => 255],
            [['gender'], 'string', 'max' => 100],
            [['email'], 'unique','message' => 'Użytkownik o takim adresie email istnieje już w bazie danych'],
            // [['email_canonical'], 'unique','message' => 'Użytkownik o takim adresie email istnieje już w bazie danych'],
            [['default_address_id'], 'unique','message' => 'Uniqu'],
            [['default_address_id'], 'exist', 'skipOnError' => true, 'targetClass' => SyliusAddress::className(), 'targetAttribute' => ['default_address_id' => 'id']],
            [['customer_group_id'], 'exist', 'skipOnError' => true, 'targetClass' => SyliusCustomerGroup::className(), 'targetAttribute' => ['customer_group_id' => 'id'],'message'=>'valid'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_group_id' => 'Customer Group ID',
            'default_address_id' => 'Default Address ID',
            'email' => 'Email',
            'email_canonical' => 'Email Canonical',
            'first_name' => 'Imię',
            'last_name' => 'Nazwisko',
            'birthday' => 'Urodziny',
            'gender' => 'Płeć',
            'created_at' => 'Stworzono',
            'updated_at' => 'Updated At',
            'phone_number' => 'Numer telefonu',
            'subscribed_to_newsletter' => 'Subscribed To Newsletter',
        ];
    }

    /**
     * Gets query for [[SyliusAddresses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSyliusAddresses()
    {
        return $this->hasMany(SyliusAddress::className(), ['customer_id' => 'id']);
    }

    /**
     * Gets query for [[DefaultAddress]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDefaultAddress()
    {
        return $this->hasOne(SyliusAddress::className(), ['id' => 'default_address_id']);
    }

    /**
     * Gets query for [[CustomerGroup]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomerGroup()
    {
        return $this->hasOne(SyliusCustomerGroup::className(), ['id' => 'customer_group_id']);
    }

    /**
     * Gets query for [[SyliusOrders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSyliusOrders()
    {
        return $this->hasMany(SyliusOrder::className(), ['customer_id' => 'id']);
    }

    /**
     * Gets query for [[SyliusProductReviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSyliusProductReviews()
    {
        return $this->hasMany(SyliusProductReview::className(), ['author_id' => 'id']);
    }

    /**
     * Gets query for [[SyliusShopUser]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSyliusShopUser()
    {
        return $this->hasOne(SyliusShopUser::className(), ['customer_id' => 'id']);
    }
}
