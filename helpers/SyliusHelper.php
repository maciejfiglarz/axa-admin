<?php

namespace app\helpers;

use Yii;
use app\models\SyliusShopUser;
use app\models\SyliusCustomer;
use app\models\SyliusCustomerGroup;
use app\models\SyliusAddress;

use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use kartik\form\ActiveForm;

/**
 * SyliusController implements the CRUD actions for SyliusShopUser model.
 */
class SyliusHelper
{

    public function __construct()
    {
        $this->today = date('Y-m-d H:i:s');
    }

    // public function prepareUserShop($shopUserModel, $customerModelId)
    // {
    //     $username = $shopUserModel->username;
    //     $shopUserModel->username_canonical = $username;
    //     $shopUserModel->customer_id = $customerModelId;
    //     $shopUserModel->created_at = $this->today;
    //     $shopUserModel->roles = 'a:1:{i:0;s:9:"ROLE_USER";}';
    //     $shopUserModel->save();
    //     return $shopUserModel;
    // }


    public function prepareAddressModel($addressModel, $customerModelId)
    {

        $addressModelFromDB = $this->findAddressModelByCustomerId($customerModelId);

        if ($addressModelFromDB) {
            $addressModelFromDB->created_at = $this->today;
            $addressModelFromDB->updated_at = $this->today;
            $addressModel->update();
            return $addressModelFromDB;
        }

        $addressModel->created_at = $this->today;
        $addressModel->updated_at = $this->today;
        $addressModel->country_code = 'PL';
        $addressModel->customer_id = $customerModelId;
        $addressModel->save();
        return $addressModel;
    }

    public function prepareCustomerModel($customerModel, $customerGroupId)
    {

        $customerEmail = $customerModel->email;
        $customerModelFromDB = $this->findCustomerByEmailModel($customerEmail);

        if ($customerModelFromDB) {
            $email = $customerModel->email;
            $customerModel->email_canonical = $email;
            $customerModel->created_at = $this->today;
            $customerModel->update();
            return $customerModelFromDB;
        }

        $email = $customerModel->email;
        $customerModel->email_canonical = $email;
        $customerModel->subscribed_to_newsletter = 0;
        $customerModel->created_at = $this->today;
        $customerModel->customer_group_id = $customerGroupId;
        $customerModel->save();
        return $customerModel;
    }

    public function prepareCustomerGroupModel($customerGroupModel)
    {

        $customerGroupCode = $customerGroupModel->code;
        $customerModelFromDB = $this->findCustomerGroupByCodeModel($customerGroupCode);

        if ($customerModelFromDB) {
            $customerModelFromDB->name = $customerGroupModel->name;
            $customerGroupModel->update();
            return $customerModelFromDB;
        }
        $customerGroupModel->save();
        return $customerGroupModel;
    }

    public function prepareUserShopModel($userShopModel, $customerModelId)
    {

        $userShopModelFromDB = $this->findUserModelByCustomerModelId($customerModelId);

        if ($userShopModelFromDB) {
            $username = $userShopModelFromDB->username;
            $userShopModelFromDB->username_canonical = $username;
            $userShopModelFromDB->update();
            return $userShopModelFromDB;
        }
        $username = $userShopModel->username;
        $userShopModel->username_canonical = $username;
        $userShopModel->customer_id = $customerModelId;
        $userShopModel->created_at = $this->today;
        $userShopModel->roles = 'a:1:{i:0;s:9:"ROLE_USER";}';
        $userShopModel->save();
        return $userShopModel;
    }

    public function setCustomerGroupForCustomerModel($customerModel, $customerGroupId)
    {
        $customerModel->customer_group_id = $customerGroupId;
        $customerModel->update();
        return $customerModel;
    }


    public function findUserModelByCustomerModelId($customerId)
    {

        if (($model = SyliusShopUser::find()->where(['customer_id' => $customerId])->one()) !== null) {
            return $model;
        }

        return null;
    }


    public function findCustomerGroupByCodeModel($code)
    {

        if (($model = SyliusCustomerGroup::find()->where(['code' => $code])->one()) !== null) {
            return $model;
        }

        return null;
    }

    public function findCustomerByEmailModel($email)
    {

        if (($model = SyliusCustomer::find()->where(['email' => $email])->one()) !== null) {
            return $model;
        }

        return null;
    }

    public function findAddressModelByCustomerId($id)
    {

        if (($model = SyliusAddress::find()->where(['id' => $id])->one()) !== null) {
            return $model;
        }

        return null;
    }
}
