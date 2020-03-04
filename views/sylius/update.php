<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SyliusShopUser */

$this->title = 'Zmień dane użytkownika: ' . $customerModel->first_name .' '.  $customerModel->last_name;
$this->params['breadcrumbs'][] = ['label' => 'Użytkownicy', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $customerModel->first_name .' '.  $customerModel->last_name, 'url' => ['view', 'id' => $shopUserModel->id]];
$this->params['breadcrumbs'][] = 'Zmień';
?>
<div class="sylius-shop-user-update">

    <?= $this->render('_form', [
        'shopUserModel' => $shopUserModel,
        'customerModel' => $customerModel,
        'addressModel' => $addressModel,
        'customerGroupModel' => $customerGroupModel,
        'isEdit' => false 
    ]) ?>

</div>