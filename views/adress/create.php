<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SyliusAddress */

$this->title = 'Create Sylius Address';
$this->params['breadcrumbs'][] = ['label' => 'Sylius Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sylius-address-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
