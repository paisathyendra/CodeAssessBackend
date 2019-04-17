<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Import Logs';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="logs-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'import_date',
            'number_of_records',
            'comments:ntext',
        ],
    ]); ?>


</div>
