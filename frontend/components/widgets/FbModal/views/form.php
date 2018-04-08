<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<div class="site-contact">
    <div class="row">
        <div class="col-lg-5">
            <div class="form-message">
                <div style="display: none" class="message-success">Сообшение отправлено!</div>
                <div style="display: none" class="message-error">Сообшение не отправлено!</div>
            </div>
            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
                <?= $form->field($model, 'email') ?>
                <?= $form->field($model, 'subject')->textInput(['disabled' => true]) ?>
                <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>
                <div class="form-group">
                    <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
<?php
$js = <<<JS
    $('#contact-form').on('beforeSubmit', function(){
     var data = $(this).serialize();
    $.ajax({
     url: '/frontend/web/site/feedback',
     type: 'POST',
     data: data,
     success: function(res){
         if(res == true){
              $('.message-success').css('display','block');
              $('#contact-form').css('display','none');
         }else{
              $('.message-error').css('display','block');
              $('#contact-form').css('display','none');
         } 
     },
     error: function(){
        alert('Error!');
     }
     });
        return false;
     });
JS;

$this->registerJs($js);

?>