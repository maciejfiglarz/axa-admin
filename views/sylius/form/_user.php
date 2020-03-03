<?= $form->field($model, 'customer_id',['labelOptions' => [ 'class' => '' ]])->textInput(['class'=>'']) ?>

<?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'username_canonical')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'enabled')->checkBox() ?>

<?= $form->field($model, 'salt')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

<?= $form->field($model, 'last_login')->textInput() ?>

<?= $form->field($model, 'password_reset_token')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'password_requested_at')->textInput() ?>

<?= $form->field($model, 'email_verification_token')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'verified_at')->textInput() ?>

<?= $form->field($model, 'locked')->checkBox() ?>

<?= $form->field($model, 'expires_at')->textInput() ?>

<?= $form->field($model, 'credentials_expire_at')->textInput() ?>

<?= $form->field($model, 'roles')->textarea(['rows' => 6]) ?>

<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'email_canonical')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'created_at')->textInput() ?>

<?= $form->field($model, 'updated_at')->textInput() ?>

<?= $form->field($model, 'encoder_name')->textInput(['value'=>'argon2i']) ?>
