<?php
use \kartik\date\DatePicker;
?>

<?= $form->field($model, 'customer_group_id',['labelOptions' => [ 'class' => 'display-none']])->textInput(['class' => 'display-none']) ?>

<?= $form->field($model, 'default_address_id',['labelOptions' => [ 'class' => 'display-none']])->textInput(['class' => 'display-none']) ?>

<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'email_canonical',['labelOptions' => [ 'class' => 'display-none']])->textInput(['maxlength' => true,'class' => 'display-none']) ?>

<?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

<div class="form-group field-syliuscustomer-birthday">

<?php
echo $form->field($model, 'birthday')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Wybierz datę...'],
    'convertFormat' => true,
    'pluginOptions' => [
        'format' => 'dd-M-yyyy',
        // 'startDate' => '01-Mar-2014 12:00 AM',
        'todayHighlight' => true,
    ]
]);
?>
</div>


<?= $form->field($model, 'gender',['labelOptions' => [ 'class' => 'display-none']])->textInput(['maxlength' => true,'class' => 'display-none']) ?>

<?= $form->field($model, 'created_at',['labelOptions' => [ 'class' => 'display-none']])->textInput(['class' => 'display-none']) ?>

<?= $form->field($model, 'updated_at',['labelOptions' => [ 'class' => 'display-none']])->textInput([ 'class' => 'display-none']) ?>

<?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'subscribed_to_newsletter',['labelOptions' => [ 'class' => 'display-none']])->textInput(['class' => 'display-none']) ?>
