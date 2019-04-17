<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EnrolmentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Enrolments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="enrolments-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'code',
            'school_name',
            'y2004',
            'y2005',
            'y2006',
            'y2007',
            'y2008',
            'y2009',
            'y2010',
            'y2011',
            'y2012',
            'y2013',
            'y2014',
            'y2015',
            'y2016',
            'y2017',
            'y2018',
        ],
    ]); ?>


</div>
