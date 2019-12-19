<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_m_userkey".
 *
 * @property int $id
 * @property string $user_id
 * @property string $data_key
 */
class MasterUserKey extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_m_userkey';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'data_key'], 'required'],
            [['user_id'], 'string', 'max' => 10],
            [['data_key'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'data_key' => 'Data Key',
        ];
    }
}
