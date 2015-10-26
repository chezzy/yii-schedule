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

    /**
     * Returns a model, or throws an exception if it is not found
     * @param  int            $id    The ID of the model to find
     * @return Events::model
     */
    private function loadModel($id)
    {
        if ($id == NULL)
            throw new CHttpException(400, 'Bad Request');

        $model = Events::model()->findByPk($id);

        if ($model == NULL)
            throw new CHttpException(404, 'No model with that ID was found');

        return $model;
    }
}