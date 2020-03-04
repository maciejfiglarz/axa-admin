<?= $form->field($model, 'customer_id',['labelOptions' => [ 'class' => 'display-none']])->textInput([ 'class' => 'display-none']) ?>

<?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'street')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'company')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'postcode')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'created_at',['labelOptions' => [ 'class' => 'display-none']])->textInput([ 'class' => 'display-none']) ?>

<?= $form->field($model, 'updated_at',['labelOptions' => [ 'class' => 'display-none']])->textInput([ 'class' => 'display-none']) ?>

<?= $form->field($model, 'country_code',['labelOptions' => [ 'class' => 'display-none']])->textInput(['maxlength' => true,'class' => 'display-none']) ?>

<?= $form->field($model, 'province_code',['labelOptions' => [ 'class' => 'display-none']])->textInput(['maxlength' => true,'class' => 'display-none']) ?>

<?= $form->field($model, 'province_name')->textInput(['maxlength' => true]) ?>