<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_m_users".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $data_key
 * @property string $email
 */
class MasterUsers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_m_users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'email'], 'required'],
            [['username'], 'string', 'max' => 100],
            [['password', 'data_key', 'email'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'data_key' => 'Data Key',
            'email' => 'Email',
        ];
    }
}
