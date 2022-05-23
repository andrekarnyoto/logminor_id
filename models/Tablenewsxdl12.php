<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tablenewsxdl12".
 *
 * @property string $kode
 * @property string $judul
 * @property string $isinya
 * @property string $keywords
 * @property string $tanggalupload
 * @property string $linkasli
 * @property string $gambar
 * @property string $kategori
 */
class Tablenewsxdl12 extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tablenewsxdl12';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['judul','isinya', 'keywords', 'linkasli','kategori'], 'required'],
            [['isinya', 'keywords', 'linkasli'], 'string'],
            [['tanggalupload'], 'safe'],
            [['kode'], 'string', 'max' => 255],
            [['gambar'], 'string', 'max' => 500],
            [['kategori'], 'string', 'max' => 100],
            [['judul'], 'string', 'max' => 500],
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
            'isinya' => 'Isinya',
            'keywords' => 'Keywords',
            'tanggalupload' => 'Tanggal Upload',
            'linkasli' => 'Laman Asli',
            'gambar' => 'Gambar',
            'kategori' => 'Kategori',
        ];
    }
}
