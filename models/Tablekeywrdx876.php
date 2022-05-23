<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tablekeywrdx876".
 *
 * @property int $id
 * @property string $keywordsx
 */
class Tablekeywrdx876 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tablekeywrdx876';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['keywordsx'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'keywordsx' => 'Keywordsx',
        ];
    }
}
