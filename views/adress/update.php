<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SyliusAddress */

$this->title = 'Update Sylius Address: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Sylius Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sylius-address-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
