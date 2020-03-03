<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="sylius-customer-form">

    <?= $form->field($model, 'customer_group_id')->textInput() ?>

    <?= $form->field($model, 'default_address_id')->textInput() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email_canonical')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'birthday')->textInput() ?>

    <?= $form->field($model, 'gender')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subscribed_to_newsletter')->textInput() ?>

</div>
