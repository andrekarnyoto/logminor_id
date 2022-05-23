<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tableknowledge".
 *
 * @property string $kode
 * @property string $judul
 * @property string $isiinya
 * @property string $keywords
 * @property string $tanggalupload
 * @property string $linkasli
 * @property string $kategori
 * @property int $keyextract
 */
class Tableknowledge extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $totalx;
    public static function tableName()
    {
        return 'tableknowledge';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode'], 'required'],
            [['isiinya', 'keywords'], 'string'],
            [['tanggalupload'], 'safe'],
            [['keyextract'], 'integer'],
            [['kode', 'judul', 'linkasli'], 'string', 'max' => 500],
            [['kategori'], 'string', 'max' => 100],
            [['kode'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'kode' => 'Kode',
            'judul' => 'Judul',
            'isiinya' => 'Abstrak',
            'keywords' => 'Kata Kunci',
            'tanggalupload' => 'Tanggal Upload',
            'linkasli' => 'Laman Asal',
            'kategori' => 'Kategori',
            'keyextract' => 'Keyextract',
        ];
    }
    
    public function writetotalsbl($dataz){
        $this->totalx = $dataz;
    }
    
    public function readtotalsbl(){
        return  $this->totalx;
    }
    
}
