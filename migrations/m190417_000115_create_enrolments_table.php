<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%enrolments}}`.
 */
class m190417_000115_create_enrolments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%enrolments}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string()->notNull(),
            'school_name' => $this->string(),
            'y2004' => $this->string(),
            'y2005' => $this->string(),
            'y2006' => $this->string(),
            'y2007' => $this->string(),
            'y2008' => $this->string(),
            'y2009' => $this->string(),
            'y2010' => $this->string(),
            'y2011' => $this->string(),
            'y2012' => $this->string(),
            'y2013' => $this->string(),
            'y2014' => $this->string(),
            'y2015' => $this->string(),
            'y2016' => $this->string(),
            'y2017' => $this->string(),
            'y2018' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%enrolments}}');
    }
}
