<?php 
use yii\helpers\Html;
?>
<?= $form->field($model, 'customer_id', ['labelOptions' => ['class' => 'display-none']])->textInput(['class' => 'display-none']) ?>

<?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'username_canonical', ['labelOptions' => ['class' => 'display-none']])->textInput(['maxlength' => true, 'class' => 'display-none']) ?>

<?= $form->field($model, 'salt', ['labelOptions' => ['class' => 'display-none']])->textInput(['maxlength' => true, 'class' => 'display-none']) ?>

<?= $form->field($model, 'password',['labelOptions' => ['class' => 'display-none']])->passwordInput(['maxlength' => true,'class' => 'display-none']) ?>

<div class="form-group field-syliusshopuser-email">
<label class="control-label" for="syliusshopuser-email">Nowe hasło</label>
<?= Html::input('text','plainPassword','', $options=['class'=>'form-control','maxlength'=>255]) ?>
</div>


<?= $form->field($model, 'enabled', ['labelOptions' => ['class' => 'custom-control-label']])->checkBox(['class' => 'form-check-input']) ?>

<?= $form->field($model, 'last_login', ['labelOptions' => ['class' => 'display-none']])->textInput(['class' => 'display-none']) ?>

<?= $form->field($model, 'password_reset_token', ['labelOptions' => ['class' => 'display-none']])->textInput(['maxlength' => true, 'class' => 'display-none']) ?>

<?= $form->field($model, 'password_requested_at', ['labelOptions' => ['class' => 'display-none']])->textInput(['class' => 'display-none']) ?>

<?= $form->field($model, 'email_verification_token', ['labelOptions' => ['class' => 'display-none']])->textInput(['maxlength' => true, 'class' => 'display-none']) ?>

<?= $form->field($model, 'verified_at', ['labelOptions' => ['class' => 'display-none']])->textInput(['class' => 'display-none']) ?>

<?= $form->field($model, 'locked')->checkBox() ?>

<?= $form->field($model, 'expires_at', ['labelOptions' => ['class' => 'display-none']])->textInput(['class' => 'display-none']) ?>

<?= $form->field($model, 'credentials_expire_at', ['labelOptions' => ['class' => 'display-none']])->textInput(['class' => 'display-none']) ?>

<?= $form->field($model, 'roles', ['labelOptions' => ['class' => 'display-none']])->textarea(['rows' => 6, 'class' => 'display-none']) ?>



<?= $form->field($model, 'email_canonical', ['labelOptions' => ['class' => 'display-none']])->textInput(['maxlength' => true, 'class' => 'display-none']) ?>

<?= $form->field($model, 'created_at', ['labelOptions' => ['class' => 'display-none']])->textInput(['class' => 'display-none']) ?>

<?= $form->field($model, 'updated_at', ['labelOptions' => ['class' => 'display-none']])->textInput(['class' => 'display-none']) ?>

<?= $form->field($model, 'encoder_name', ['labelOptions' => ['class' => 'display-none']])->textInput(['value' => 'argon2i', 'class' => 'display-none']) ?>