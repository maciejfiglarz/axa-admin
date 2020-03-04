<?php
use \kartik\datetime\DatePicker;
?>

<?= $form->field($model, 'customer_group_id',['labelOptions' => [ 'class' => 'display-none']])->textInput(['class' => 'display-none']) ?>

<?= $form->field($model, 'default_address_id',['labelOptions' => [ 'class' => 'display-none']])->textInput(['class' => 'display-none']) ?>

<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'email_canonical',['labelOptions' => [ 'class' => 'display-none']])->textInput(['maxlength' => true,'class' => 'display-none']) ?>

<?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

<div class="form-group field-syliuscustomer-birthday">
<label class="control-label" for="w1">Urodziny</label>
<?php
echo DatePicker::widget([
    'name' => 'birthday',
    'options' => ['placeholder' => 'Wybierz datę...'],
    'convertFormat' => true,
    'pluginOptions' => [
        'format' => 'd-M-Y',
        // 'startDate' => '01-Mar-2014 12:00 AM',
        'todayHighlight' => true,
    ]
]);
?>
</div>


<?= $form->field($model, 'gender')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'created_at',['labelOptions' => [ 'class' => 'display-none']])->textInput(['class' => 'display-none']) ?>

<?= $form->field($model, 'updated_at',['labelOptions' => [ 'class' => 'display-none']])->textInput([ 'class' => 'display-none']) ?>

<?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'subscribed_to_newsletter',['labelOptions' => [ 'class' => 'display-none']])->textInput(['class' => 'display-none']) ?>
