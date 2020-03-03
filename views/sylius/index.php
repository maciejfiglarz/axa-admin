<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sylius Shop Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sylius-shop-user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Sylius Shop User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'customer_id',
            'username',
            'username_canonical',
            'enabled',
            //'salt',
            //'password',
            //'last_login',
            //'password_reset_token',
            //'password_requested_at',
            //'email_verification_token:email',
            //'verified_at',
            //'locked',
            //'expires_at',
            //'credentials_expire_at',
            //'roles:ntext',
            //'email:email',
            //'email_canonical:email',
            //'created_at',
            //'updated_at',
            //'encoder_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
