<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tablegambarnews".
 *
 * @property int $id
 * @property string $filegambar
 * @property string $keterangan
 */
class Tablegambarnews extends \yii\db\ActiveRecord
{
    public $filegambaruplaod;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tablegambarnews';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['filegambaruplaod'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg'],
            [['filegambar'], 'string', 'max' => 255],
            [['keterangan'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'filegambar' => 'File Gambar',
            'keterangan' => 'Keterangan',
        ];
    }
}
