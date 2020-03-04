<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $shopUserModel app\models\SyliusShopUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sylius-shop-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <h1>User</h1>
    <?= $this->render('form/_user.php', array('model' => $shopUserModel, 'form' => $form)); ?>
    <br><br>
    <h1>Customer</h1>
    <?= $this->render('form/_customer.php', array('model' => $customerModel, 'form' => $form)); ?>

    <h1>Adres</h1>
    <?= $this->render('form/_address.php', array('model' => $addressModel, 'form' => $form)); ?>

    <h1>Customer Group</h1>
    <?= $this->render('form/_customer-group.php', array('model' => $customerGroupModel, 'form' => $form)); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>