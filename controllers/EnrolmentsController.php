<?php

namespace app\controllers;

use app\models\Enrolments;
use app\models\EnrolmentsSearch;
use app\models\Logs;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * EnrolmentsController implements the CRUD actions for Enrolments model.
 */
class EnrolmentsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Enrolments models.
     * @return mixed
     */
    public function actionIndex()
    {
        // Fetch data from NSW API
        list($numberOfRecords, $records) = $this->importData();

        // Get count of last imported records count
        $logs = Logs::find()
            ->where(['id' => Logs::find()->max('id')])
            ->one();

        // Check if there is any difference in the number of records imported
        if ($numberOfRecords <> $logs['number_of_records']) {
            $model = new Enrolments();
            // Delete existing data from table
            $model->deleteAll();

            // Add new data
            foreach ($records as $record) {
                $enrolment = new Enrolments();
                $enrolment->id = $record['_id'];
                $enrolment->code = $record['School Code'];
                $enrolment->school_name = $record['School Name'];
                $enrolment->y2004 = $record['HC_2004'];
                $enrolment->y2005 = $record['HC_2005'];
                $enrolment->y2006 = $record['HC_2006'];
                $enrolment->y2007 = $record['HC_2007'];
                $enrolment->y2008 = $record['HC_2008'];
                $enrolment->y2009 = $record['HC_2009'];
                $enrolment->y2010 = $record['HC_2010'];
                $enrolment->y2011 = $record['HC_2011'];
                $enrolment->y2012 = $record['HC_2012'];
                $enrolment->y2013 = $record['HC_2013'];
                $enrolment->y2014 = $record['HC_2014'];
                $enrolment->y2015 = $record['HC_2015'];
                $enrolment->y2016 = $record['HC_2016'];
                $enrolment->y2017 = $record['HC_2017'];
                $enrolment->y2018 = $record['HC_2018'];
                $enrolment->save();
            }

            // Log imported data details
            $logs = new Logs();
            // ToDo: Log time in Australia Timezone
            $logs->import_date = date('Y-m-d H:i:s');
            $logs->number_of_records = $numberOfRecords;
            $logs->comments = '';
            $logs->save();

        }

        $searchModel = new EnrolmentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Enrolments model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Enrolments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Enrolments();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Enrolments model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Enrolments model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Enrolments model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Enrolments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Enrolments::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     *
     * Call NSW API to get latest data
     * @return array
     * ToDo: Move this functionality to a import data controller
     */
    public function importData()
    {
        $output = file_get_contents('https://data.cese.nsw.gov.au/data/api/3/action/datastore_search?resource_id=da0fd2ec-6024-3206-98d4-81a2c663664b&limit=5000');
        $response = json_decode($output, true);
        $numberOfRecords = $response['result']['total'];
        $records = $response['result']['records'];
        return array($numberOfRecords, $records);
    }
}
