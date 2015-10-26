<?php

class EventController extends CController
{
    /**
     * Handles displaying and searching of events
     */
    public function actionIndex()
    {
        $model = new Events('search');
        $model->unsetAttributes();

        if (isset($_GET['Events']))
            $model->attributes = $_GET['Events'];

        // Only search for events belonging to this user
        $model->user_id = Yii::app()->user->id;

        $this->render('index', array('model' => $model));
    }
}