<?php

namespace frontend\components\controllers;

use Yii;
use yii\web\Controller;
use frontend\components\models\FeedbackForm;


class FeedbackController extends Controller
{
    public function actionFeedback()
    {
        $model = new FeedbackForm();
        if (Yii::$app->request->isAjax){
            Yii::$app->response->format = yii\web\Response::FORMAT_JSON;
            if ($model->load(Yii::$app->request->post()) && $model->validate()) {
                if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                    return true;
                } else {
                    return false;
                }
            }
        } else {
            throw new HttpException(404 ,'Page not found');
        }
    }
}