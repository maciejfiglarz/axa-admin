<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\search\SyliusCustomerGroupSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Grupy dla użytkowników';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sylius-customer-group-index">
<br>
    <p>
        <?= Html::a('Create Sylius Customer Group', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <br>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'code',
            'name',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
