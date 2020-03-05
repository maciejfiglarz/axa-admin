<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\models\SyliusShopUser */

// $this->params['breadcrumbs'][] = ['label' => 'Stwórz', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>

<div class="sylius-shop-user-create">

<?php 
$this->title = trim('Stwórz użytkownika');
?>
    <?= $this->render('_form', [
        'shopUserModel' => $shopUserModel,
        'customerModel' => $customerModel,
        'addressModel' => $addressModel,
        // 'customerGroupModel' => $customerGroupModel,
        'isEdit' => false ,
        'customerGroupList' => $customerGroupList
    ]) ?>

</div>
