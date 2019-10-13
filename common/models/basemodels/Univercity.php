<?php

namespace common\models\basemodels;

use Yii;

/**
 * This is the model class for table "univercity".
 *
 * @property int $univercity_id
 * @property string $univercity_name
 * @property string $univercity_description
 * @property int $created_by
 * @property int $created_at
 * @property int $updated_at
 * @property int $status
 */
class Univercity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'univercity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['univercity_name', 'created_by', 'created_at', 'updated_at'], 'required'],
            [['univercity_description'], 'string'],
            [['created_by', 'created_at', 'updated_at', 'status'], 'integer'],
            [['univercity_name'], 'string', 'max' => 255],
            [['univercity_name'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'univercity_id' => 'Univercity ID',
            'univercity_name' => 'Univercity Name',
            'univercity_description' => 'Univercity Description',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'status' => 'Status',
        ];
    }
}
