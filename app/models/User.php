<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string|null $username
 * @property string|null $password
 * @property string|null $fio
 * @property string|null $email
 * @property string|null $blocked
 * @property string|null $roles
 * @property string $created_at
 * @property string $updates_at
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    static $rolesList = [
        'Администратор системы',
        'Администратор опроса',
        'Оператор опроса'
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['blocked', 'created_at', 'updates_at', 'remember_me', 'roles'], 'safe'],
            [['username', 'password', 'email'], 'string', 'max' => 100],
            [['fio'], 'string', 'max' => 250]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Логин',
            'password' => 'Пароль',
            'fio' => 'ФИО',
            'email' => 'Электронная почта',
            'blocked' => 'Заблокировать',
            'roles' => 'Роли',
            'created_at' => 'Created At',
            'updates_at' => 'Updates At',
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public function validatePassword($password)
    {
        return true;
    }

    public static function findByUsername($username)
    {
        return self::findOne(['username' => $username, 'blocked' => null]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        if (!$this->token) {
            $this->token = \Yii::$app->security->generateRandomString();
            $this->save();
        }

        return $this->token;
    }

    public function validateAuthKey($authKey)
    {
        return $authKey == $this->getAuthKey();
    }

    public function beforeSave($insert)
    {
        if (is_array($this->roles)) {
            $this->roles = implode(',', $this->roles);
        }
        if ($this->password !== $this->getOldAttribute('password')) {
            $this->password = \Yii::$app->security->generatePasswordHash($this->password);
        }
        if ($this->blocked && $this->blocked != 0) {
            $this->blocked = time();
        } else {
            $this->blocked = null;
        }
        return parent::beforeSave($insert);
    }

}
