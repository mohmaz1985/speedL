<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Settings;

/**
 * SettingsSearch represents the model behind the search form about `app\models\Settings`.
 */
class SettingsSearch extends Settings
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'dataPerPageEN', 'dataPerPageAR', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['titleEN', 'titleAR', 'modelName', 'modelTableName'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Settings::find()->where(['status'=>1]);

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
            'id' => $this->id,
            'dataPerPageEN' => $this->dataPerPageEN,
            'dataPerPageAR' => $this->dataPerPageAR,
            'created_at' => $this->created_at,
            'created_by' => $this->created_by,
            'updated_at' => $this->updated_at,
            'updated_by' => $this->updated_by,
        ]);

        $query->andFilterWhere(['like', 'titleEN', $this->titleEN])
            ->andFilterWhere(['like', 'titleAR', $this->titleAR])
            ->andFilterWhere(['like', 'modelName', $this->modelName])
            ->andFilterWhere(['like', 'modelTableName', $this->modelTableName]);

        return $dataProvider;
    }
}
