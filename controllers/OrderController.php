<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\OrderModel;

class OrderController extends Controller
{
    public function actionProcess()
    {
        
        $post = Yii::$app->request->post();
        
        $model = new OrderModel(['scenario' => $post['scenario']]);
        
        if ($model->load($post) && $model->validate()) {
            return "success";
        }
        \yii::$app->getResponse()->setStatusCode("422", "Validation Failed.");
        return json_encode($model->getErrors());
    }
}