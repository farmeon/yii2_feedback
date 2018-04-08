<?php

namespace frontend\components\widgets\FbModal;

use frontend\components\models\FeedbackForm;
use yii\base\Widget;
use frontend\components\widgets\FbAssets;

class FbModal extends Widget
{

    public function init() {
        //FbAssets::register( $this->getView() );
        parent::init();
    }

    /**
     * @return string
     */
    public function run(){
        $fBForm =  new FeedbackForm();
        return $this->render('form', ['model' => $fBForm]);

    }
}