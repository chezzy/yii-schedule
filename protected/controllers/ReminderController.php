<?php

class ReminderController extends CController
{
    /**
     * BeforeAction, verifies that the request in an Ajaxy one.
     * @param  CAction $action The Action
     * @see CController::beforeAction($action)
     */
    public function beforeAction($action)
    {
        if (!Yii::app()->request->isPostRequest)
            throw new CHttpException(400, 'Bad Request');

        return parent::beforeAction($action);
    }
}