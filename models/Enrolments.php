<?php

namespace app\models;

/**
 * This is the model class for table "enrolments".
 *
 * @property int $id
 * @property string $code
 * @property string $school_name
 * @property string $y2004
 * @property string $y2005
 * @property string $y2006
 * @property string $y2007
 * @property string $y2008
 * @property string $y2009
 * @property string $y2010
 * @property string $y2011
 * @property string $y2012
 * @property string $y2013
 * @property string $y2014
 * @property string $y2015
 * @property string $y2016
 * @property string $y2017
 * @property string $y2018
 */
class Enrolments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'enrolments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['code'], 'required'],
            [['y2004', 'y2005', 'y2006', 'y2007', 'y2008', 'y2009', 'y2010', 'y2011', 'y2012', 'y2013', 'y2014', 'y2015', 'y2016', 'y2017', 'y2018'], 'string'],
            [['code', 'school_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'school_name' => 'School Name',
            'y2004' => '2004',
            'y2005' => '2005',
            'y2006' => '2006',
            'y2007' => '2007',
            'y2008' => '2008',
            'y2009' => '2009',
            'y2010' => '2010',
            'y2011' => '2011',
            'y2012' => '2012',
            'y2013' => '2013',
            'y2014' => '2014',
            'y2015' => '2015',
            'y2016' => '2016',
            'y2017' => '2017',
            'y2018' => '2018',
        ];
    }
}
