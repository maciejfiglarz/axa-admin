<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $shopUserModel app\models\SyliusShopUser */

$this->title = $shopUserModel->id;
$this->params['breadcrumbs'][] = ['label' => 'Użytkownicy', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="sylius-shop-user-view">

    <h1><?= Html::encode($this->title) ?></h1>

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

    <?= DetailView::widget([
        'model' => $shopUserModel,
        'attributes' => [
            'id',
            'customer_id',
            'username',
            'username_canonical',
            'enabled',
            'salt',
            'password',
            'last_login',
            'password_reset_token',
            'password_requested_at',
            'email_verification_token:email',
            'verified_at',
            'locked',
            'expires_at',
            'credentials_expire_at',
            'roles:ntext',
            'email:email',
            'email_canonical:email',
            'created_at',
            'updated_at',
            'encoder_name',
        ],
    ]) ?>

</div>
