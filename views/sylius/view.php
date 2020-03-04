<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $shopUserModel app\models\SyliusShopUser */

$this->title =  $customerModel->first_name .' '. $customerModel->last_name;
$this->params['breadcrumbs'][] = ['label' => 'Użytkownicy', 'url' => ['index']];
$this->params['breadcrumbs'][] = $customerModel->first_name .' '.  $customerModel->last_name;
\yii\web\YiiAsset::register($this);
?>

<div class="sylius-shop-user-view">

    <p>
        <?= Html::a('Zmień', ['update', 'id' => $shopUserModel->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Usuń', ['delete', 'id' => $shopUserModel->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Jesteś pewny, że chcesz to usunąć?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

<h3>Dane użytkownika:</h3>

    <?= DetailView::widget([
        'model' => $shopUserModel,
        'attributes' => [
            // 'id',
            // 'customer_id',
            'username',
            // 'username_canonical',
            [
                'attribute' => 'enabled',
                'value' => function ($data) {
                    if ($data['enabled'] == '1') {
                        return 'tak';
                    } else {
                        return 'nie';
                    }
                }, 'format' => 'raw'
            ],
            // 'salt',
            // 'password',
            // 'last_login',
            // 'password_reset_token',
            // 'password_requested_at',
            // 'email_verification_token:email',
            // 'verified_at',
            [
                'attribute' => 'locked',
                'value' => function ($data) {
                    if ($data['locked'] == '1') {
                        return 'tak';
                    } else {
                        return 'nie';
                    }
                }, 'format' => 'raw'
            ],
            // 'expires_at',
            // 'credentials_expire_at',
            // 'roles:ntext',
            'email:email',
            // 'email_canonical:email',
            // 'created_at',
            // 'updated_at',
            // 'encoder_name',
            
        ],
    ]) ?>

<h3>Dane klienta:</h3>
    <?= DetailView::widget([
        'model' => $customerModel,
        'attributes' => [
            // 'id',
            // 'customer_group_id',
            // 'default_address_id',
            'email:email',
            // 'email_canonical:email',
            'first_name',
            'last_name',
            'birthday:date',
            // 'gender',
            // 'created_at',
            // 'updated_at',
            'phone_number',
            
            // 'subscribed_to_newsletter',
        ],
    ]) ?>

<h3>Dane adresowe:</h3>
<?= DetailView::widget([
        'model' => $addressModel,
        'attributes' => [
            // 'id',
            // 'customer_id',
            'first_name',
            'last_name',
            'phone_number',
            'street',
            // 'company',
            'city',
            'postcode',
            // 'created_at',
            // 'updated_at',
            // 'country_code',
            // 'province_code',
            'province_name',
        ],
    ]) ?>


</div>