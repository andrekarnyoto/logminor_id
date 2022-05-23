<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tableknowledge;

/**
 * TableknowledgeSearch represents the model behind the search form of `app\models\Tableknowledge`.
 */
class TableknowledgeSearch extends Tableknowledge
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kode', 'judul', 'isiinya', 'keywords', 'tanggalupload', 'linkasli', 'kategori'], 'safe'],
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
        $query = Tableknowledge::find();

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
            ->andFilterWhere(['like', 'isiinya', $this->isiinya])
            ->andFilterWhere(['like', 'keywords', $this->keywords])
            ->andFilterWhere(['like', 'linkasli', $this->linkasli])
            ->andFilterWhere(['like', 'kategori', $this->kategori]);

        return $dataProvider;
    }
}
