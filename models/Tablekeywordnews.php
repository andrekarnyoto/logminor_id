<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tablekeywordnews".
 *
 * @property int $id
 * @property string $keywordnya
 */
class Tablekeywordnews extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tablekeywordnews';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['keywordnya'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'keywordnya' => 'Keywordnya',
        ];
    }
}
