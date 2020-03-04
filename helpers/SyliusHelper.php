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
            
            $birthday = $customerModel->birthday;
            $s = $birthday;
            $date = strtotime($s);
            $birthday = date('Y-m-d H:i:s', $date);
      
            $customerModelFromDB->birthday = $birthday;
          // dd($customerModelFromDB);
            $email = $customerModel->email;
            $customerModelFromDB->email_canonical = $email;
            $customerModelFromDB->created_at = $this->today;

            $customerModelFromDB->first_name = $customerModel->first_name;
            $customerModelFromDB->last_name = $customerModel->last_name;

    
            $customerModelFromDB->update();
            return $customerModelFromDB;
        }



        $email = $customerModel->email;
        $customerModel->email_canonical = $email;
        $customerModel->subscribed_to_newsletter = 0;
        $customerModel->created_at = $this->today;
        $customerModel->customer_group_id = $customerGroupId;

        $birthday = $customerModel->birthday;
        $s = $birthday. ' 19:00:02';
        $date = strtotime($s);
        $birthday = date('Y-m-d H:i:s', $date);
        $customerModel->birthday = $birthday;
     
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

    public function prepareUserShopModel($userShopModel, $customerModelId,$plainPassword)
    {
        
        $userShopModelFromDB = $this->findUserShopByCustomerlId($customerModelId);

        if ($userShopModelFromDB) {

            $username = $userShopModel->username;
            $userShopModelFromDB->username = $username;
            $userShopModelFromDB->username_canonical = $username;

            $salt = $userShopModel->salt;

            $password = $userShopModel->password;
    

            if(strlen($plainPassword)>0){
         
                $options = [
                    'salt' => $salt,  //write your own code to generate a suitable salt
                    'cost' => 12 // the default cost is 10
                ];
                $password = password_hash($plainPassword, PASSWORD_ARGON2I, $options);
                $userShopModelFromDB->password = $password; 
              
            }

            $email = $userShopModel->email;
            $userShopModelFromDB->email = $email;
            $userShopModelFromDB->email_canonical = $email;           

            $userShopModelFromDB->update();
            return $userShopModelFromDB;
        }

        $salt = md5($this->today);

        if(strlen($plainPassword)>0){
         
            $options = [
                'salt' => $salt, 
                'cost' => 12
            ];
            $password = password_hash($plainPassword, PASSWORD_ARGON2I, $options);
            $userShopModel->password = $password; 
          
        }
        $userShopModel->salt = $salt;
        $username = $userShopModel->username;
        $userShopModel->username_canonical = $username;
        $userShopModel->customer_id = $customerModelId;
        $userShopModel->created_at = $this->today;
        $userShopModel->roles = 'a:1:{i:0;s:9:"ROLE_USER";}';
        $userShopModel->save();
        return $userShopModel;
    }

    public function findUserShopByCustomerlId($customerModelId)
    {

        if (($model = SyliusShopUser::find()->where(['customer_id' => $customerModelId])->one()) !== null) {
            return $model;
        }

        return null;

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
