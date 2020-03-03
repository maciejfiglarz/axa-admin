<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sylius Addresses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sylius-address-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Sylius Address', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'customer_id',
            'first_name',
            'last_name',
            'phone_number',
            //'street',
            //'company',
            //'city',
            //'postcode',
            //'created_at',
            //'updated_at',
            //'country_code',
            //'province_code',
            //'province_name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
