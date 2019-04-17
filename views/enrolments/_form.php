<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Enrolments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="enrolments-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'school_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'y2004')->textInput() ?>

    <?= $form->field($model, 'y2006')->textInput() ?>

    <?= $form->field($model, 'y2007')->textInput() ?>

    <?= $form->field($model, 'y2008')->textInput() ?>

    <?= $form->field($model, 'y2009')->textInput() ?>

    <?= $form->field($model, 'y2010')->textInput() ?>

    <?= $form->field($model, 'y2011')->textInput() ?>

    <?= $form->field($model, 'y2012')->textInput() ?>

    <?= $form->field($model, 'y2013')->textInput() ?>

    <?= $form->field($model, 'y2014')->textInput() ?>

    <?= $form->field($model, 'y2015')->textInput() ?>

    <?= $form->field($model, 'y2016')->textInput() ?>

    <?= $form->field($model, 'y2017')->textInput() ?>

    <?= $form->field($model, 'y2018')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
