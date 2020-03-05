<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SyliusCustomerGroup */

$this->title = 'Create Sylius Customer Group';
$this->params['breadcrumbs'][] = ['label' => 'Sylius Customer Groups', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sylius-customer-group-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
