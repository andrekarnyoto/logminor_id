<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tablenewsxdl12;

/**
 * Tablenewsxdl12Search represents the model behind the search form of `app\models\Tablenewsxdl12`.
 */
class Tablenewsxdl12Search extends Tablenewsxdl12
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode', 'judul', 'isinya', 'keywords', 'tanggalupload', 'linkasli'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Tablenewsxdl12::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'tanggalupload' => $this->tanggalupload,
        ]);

        $query->andFilterWhere(['like', 'kode', $this->kode])
            ->andFilterWhere(['like', 'judul', $this->judul])
            ->andFilterWhere(['like', 'isinya', $this->isinya])
            ->andFilterWhere(['like', 'keywords', $this->keywords])
            ->andFilterWhere(['like', 'linkasli', $this->linkasli]);

        return $dataProvider;
    }
}
