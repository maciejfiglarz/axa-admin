<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SyliusShopUser */

$this->title = 'Create Sylius Shop User';
$this->params['breadcrumbs'][] = ['label' => 'Stwórz', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sylius-shop-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'shopUserModel' => $shopUserModel,
        'customerModel' => $customerModel,
        'addressModel' => $addressModel 
    ]) ?>

</div>
