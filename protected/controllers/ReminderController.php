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

    /**
     * Loads an Event model associated to this reminder, and verifies that the current user has access to it
     * @param  int $event_id     The Event Id
     * @return boolean
     */
    private function loadEvent($event_id)
    {
        $event = Events::model()->findByPk($event_id);
        if ($event == NULL)
            return false;

        if ($event->user_id != Yii::app()->user->id)
            return false;

        return true;
    }

    /**
     * Returns a model, or throws an exception if it is not found
     * @param  int            $id    The ID of the model to find
     * @return Events::model
     */
    private function loadModel($id)
    {
        if ($id == NULL)
            throw new CHttpException(400, 'Bad Request');

        $model = Reminders::model()->findByPk($id);

        if ($model == NULL)
            throw new CHttpException(404, 'No model with that ID was found');

        return $model;
    }
}