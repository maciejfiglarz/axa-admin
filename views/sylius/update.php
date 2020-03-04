<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SyliusShopUser */

$this->title = 'Zmień dane użytkownika: ' . $shopUserModel->id;
$this->params['breadcrumbs'][] = ['label' => 'Użytkownicy', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $shopUserModel->id, 'url' => ['view', 'id' => $shopUserModel->id]];
$this->params['breadcrumbs'][] = 'Zmień';
?>
<div class="sylius-shop-user-update">

    <?= $this->render('_form', [
        'shopUserModel' => $shopUserModel,
        'customerModel' => $customerModel,
        'addressModel' => $addressModel,
        'customerGroupModel' => $customerGroupModel 
    ]) ?>

</div>
