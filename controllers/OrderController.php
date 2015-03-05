<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\TicketModel;

class OrderController extends Controller
{
    public function actionProcess()
    {
        $post = Yii::$app->request->post();

        $model = new TicketModel();
        $model->scenario = 'step1';

        if($model->load($post) && $model->validate()) {
            return "success";
        }
        return json_encode($model->getErrors());
    }
}