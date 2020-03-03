<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\search\SyliusCustomerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sylius-customer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'customer_group_id') ?>

    <?= $form->field($model, 'default_address_id') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'email_canonical') ?>

    <?php // echo $form->field($model, 'first_name') ?>

    <?php // echo $form->field($model, 'last_name') ?>

    <?php // echo $form->field($model, 'birthday') ?>

    <?php // echo $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'phone_number') ?>

    <?php // echo $form->field($model, 'subscribed_to_newsletter') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
