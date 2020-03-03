<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SyliusCustomer */

$this->title = 'Create Sylius Customer';
$this->params['breadcrumbs'][] = ['label' => 'Sylius Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sylius-customer-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
