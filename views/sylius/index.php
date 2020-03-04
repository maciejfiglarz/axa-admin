<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista użytkowników';
$this->params['breadcrumbs'][] = $this->title;
// dd($dataProvider->setDa);
?>
<div class="sylius-shop-user-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <br>
    <p>
        <?= Html::a('Stwórz użytkownika', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <br>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            'id',
            // 'customer_id',
            'username',
            'username_canonical',
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
            ['class' => 'yii\grid\ActionColumn'],
       

        ],
    ]); ?>


</div>