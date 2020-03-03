<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sylius_shop_user".
 *
 * @property int $id
 * @property int $customer_id
 * @property string|null $username
 * @property string|null $username_canonical
 * @property int $enabled
 * @property string $salt
 * @property string $password
 * @property string|null $last_login
 * @property string|null $password_reset_token
 * @property string|null $password_requested_at
 * @property string|null $email_verification_token
 * @property string|null $verified_at
 * @property int $locked
 * @property string|null $expires_at
 * @property string|null $credentials_expire_at
 * @property string $roles (DC2Type:array)
 * @property string|null $email
 * @property string|null $email_canonical
 * @property string $created_at
 * @property string|null $updated_at
 * @property string|null $encoder_name
 *
 * @property SyliusCustomer $customer
 * @property SyliusUserOauth[] $syliusUserOauths
 */
class SyliusShopUser extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sylius_shop_user';
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
            [['enabled', 'salt', 'password', 'locked', 'roles', 'created_at'], 'required'],
            [['enabled', 'locked'], 'integer'],
            [['last_login', 'password_requested_at', 'verified_at', 'expires_at', 'credentials_expire_at', 'created_at', 'updated_at'], 'safe'],
            [['roles'], 'string'],
            [['username', 'username_canonical', 'salt', 'password', 'password_reset_token', 'email_verification_token', 'email', 'email_canonical', 'encoder_name'], 'string', 'max' => 255],
            [['customer_id'], 'unique'],
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
            'username' => 'Nazwa użytkownika',
            'username_canonical' => 'Username Canonical',
            'enabled' => 'Enabled',
            'salt' => 'Salt',
            'password' => 'Password',
            'last_login' => 'Last Login',
            'password_reset_token' => 'Password Reset Token',
            'password_requested_at' => 'Password Requested At',
            'email_verification_token' => 'Email Verification Token',
            'verified_at' => 'Verified At',
            'locked' => 'Locked',
            'expires_at' => 'Expires At',
            'credentials_expire_at' => 'Credentials Expire At',
            'roles' => 'Roles',
            'email' => 'Email',
            'email_canonical' => 'Email Canonical',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'encoder_name' => 'Encoder Name',
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
     * Gets query for [[SyliusUserOauths]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSyliusUserOauths()
    {
        return $this->hasMany(SyliusUserOauth::className(), ['user_id' => 'id']);
    }
}
