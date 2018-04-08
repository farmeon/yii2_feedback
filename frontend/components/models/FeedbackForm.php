<?php

namespace frontend\components\models;

use yii\base\Model;
use Yii;

class FeedbackForm extends Model
{
    public $name;
    public $email;
    public $subject = "Значение по умолчанию, прописан в модели";
    public $body;
    protected $emailFrom = 'bsuirstudent@yandex.by';

    public function rules() {
        return [
            [['name', 'email', 'subject', 'body'], 'required', 'message'=>'"{attribute}" обязательно для заполнения.'],
            ['email', 'email'],
        ];
    }

    public function attributeLabels() {
        return [
            'name' => 'Имя',
            'email' => 'E-mail',
            'subject' => 'Тема письма',
            'body' => 'Текст обращения',
        ];
    }

    public function sendEmail($email)
    {
        return Yii::$app->mailer->compose()
            ->setTo($email)
            ->setFrom($this->emailFrom)
            ->setSubject($this->subject)
            ->setTextBody($this->body)
            ->send();
    }

}