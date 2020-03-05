<?php
use \kartik\date\DatePicker;
use yii\web\View;
?>


<?php 
 echo $form->field($model, 'customer_group_id',['labelOptions' => [ 'label' => 'Grupa dla klienta']])->dropDownList(
    $customerGroupList
 );

?>

<?= $form->field($model, 'default_address_id',['labelOptions' => [ 'class' => 'display-none']])->textInput(['class' => 'display-none']) ?>

<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'email_canonical',['labelOptions' => [ 'class' => 'display-none']])->textInput(['maxlength' => true,'class' => 'display-none']) ?>

<?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

<div class="form-group field-syliuscustomer-birthday">

<?php
$model->birthday = substr($model->birthday,0,10);

echo $form->field($model, 'birthday')->widget(DatePicker::classname(), [
    'options' => ['placeholder' => 'Wybierz datę...'],
    'convertFormat' => true,
    'pluginOptions' => [
        // 'format' => 'dd-M-yyyy',
        'format' => 'yyyy-M-dd',
        // 'startDate' => date("Y-m-d"),
        'todayHighlight' => true,
    ]
]);
?>
</div>

<?php 
 echo $form->field($model, 'gender')
 ->dropDownList(
     ['0'=>'Mężczyzna',
      '1'=> 'Kobieta'
     ]  
 );

?>


<?= $form->field($model, 'created_at',['labelOptions' => [ 'class' => 'display-none']])->textInput(['class' => 'display-none']) ?>

<?= $form->field($model, 'updated_at',['labelOptions' => [ 'class' => 'display-none']])->textInput([ 'class' => 'display-none']) ?>

<?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'subscribed_to_newsletter',['labelOptions' => [ 'class' => 'display-none']])->textInput(['class' => 'display-none']) ?>
