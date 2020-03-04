<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $shopUserModel app\models\SyliusShopUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sylius-shop-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <h3 class="form__partial">Dane użytkownik</h1>
    <?= $this->render('form/_user.php', array('model' => $shopUserModel, 'form' => $form)); ?>

    <h1 class="form__partial">Dane klienta</h1>
    <?= $this->render('form/_customer.php', array('model' => $customerModel, 'form' => $form)); ?>

    <h1 class="form__partial">Dane adresowe</h1>
    <?= $this->render('form/_address.php', array('model' => $addressModel, 'form' => $form)); ?>

    <h1 class="form__partial">Grupa dla klienta</h1>
    <?= $this->render('form/_customer-group.php', array('model' => $customerGroupModel, 'form' => $form)); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>