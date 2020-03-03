<?= $form->field($model, 'customer_id')->textInput() ?>

<?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'street')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'company')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'postcode')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'created_at')->textInput() ?>

<?= $form->field($model, 'updated_at')->textInput() ?>

<?= $form->field($model, 'country_code')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'province_code')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'province_name')->textInput(['maxlength' => true]) ?>