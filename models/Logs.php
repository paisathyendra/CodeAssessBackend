<?php

namespace app\models;

/**
 * This is the model class for table "logs".
 *
 * @property int $id
 * @property string $import_date
 * @property string $number_of_records
 * @property string $comments
 */
class Logs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'logs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['import_date'], 'safe'],
            [['comments'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'import_date' => 'Import Date',
            'number_of_records' => 'Number of Records',
            'comments' => 'Comments',
        ];
    }
}
