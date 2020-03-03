<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SyliusShopUser */

$this->title = 'Update Sylius Shop User: ' . $shopUserModel->id;
$this->params['breadcrumbs'][] = ['label' => 'Sylius Shop Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $shopUserModel->id, 'url' => ['view', 'id' => $shopUserModel->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sylius-shop-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'shopUserModel' => $shopUserModel,
        'customerModel' => $customerModel,
        'addressModel' => $addressModel 
    ]) ?>

</div>
