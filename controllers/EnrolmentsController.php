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
        list($numberOfRecords, $records) = $this->fetchData();

        // Get count of last imported records count
        $logs = Logs::find()
            ->where(['id' => Logs::find()->max('id')])
            ->one();

        // ToDo: Add additional condition to check if its a fresh import
        // Check if there is any difference in the number of records imported
        if ($numberOfRecords <> $logs['number_of_records']) {
            $model = new Enrolments();
            // Delete existing data from table
            $model->deleteAll();

            // Add new data
            foreach ($records as $record) {
                $enrolment = new Enrolments();

                $data = $this->mapEnrolmentFields($record);

                $enrolment->attributes = $data;
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
     * @param $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
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
     * Call NSW API to get latest data
     * @return array
     * ToDo: Move this functionality to a import data controller
     * ToDo: Use HTTP Client (like Guzzle) for GET request
     */
    public function fetchData()
    {
        $numberOfRecords = 0;
        $records = array();

        // fetch data from NSW Site
        $output = $this->getDataFromAPI();

        if (!empty($output)) {
            $response = json_decode($output, true);

            $numberOfRecords = isset($response['result']['total']) ? $response['result']['total'] : 0;
            $records = $response['result']['records'];
        }

        return array($numberOfRecords, $records);
    }

    /**
     * Map Enrolment Fields
     * @param $record
     * @return array
     */
    private function mapEnrolmentFields($record)
    {
        $data = array();

        $data['id'] = $record['_id'];
        $data['code'] = $record['School Code'];
        $data['school_name'] = $record['School Name'];
        $data['y2004'] = $record['HC_2004'];
        $data['y2005'] = $record['HC_2005'];
        $data['y2006'] = $record['HC_2006'];
        $data['y2007'] = $record['HC_2007'];
        $data['y2008'] = $record['HC_2008'];
        $data['y2009'] = $record['HC_2009'];
        $data['y2010'] = $record['HC_2010'];
        $data['y2011'] = $record['HC_2011'];
        $data['y2012'] = $record['HC_2012'];
        $data['y2013'] = $record['HC_2013'];
        $data['y2014'] = $record['HC_2014'];
        $data['y2015'] = $record['HC_2015'];
        $data['y2016'] = $record['HC_2016'];
        $data['y2017'] = $record['HC_2017'];
        $data['y2018'] = $record['HC_2018'];
        return $data;
    }

    /**
     * Get Data from API
     * @return false|string
     */
    public function getDataFromAPI()
    {
        $output = file_get_contents('https://data.cese.nsw.gov.au/data/api/3/action/datastore_search?resource_id=da0fd2ec-6024-3206-98d4-81a2c663664b&limit=5000');
        return $output;
    }
}
