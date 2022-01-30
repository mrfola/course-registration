<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property int $level_id
 * @property int $department_id
 * @property int $school_id
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Department $department
 * @property Level $level
 * @property School $school
 * @property UserCourse[] $userCourses
 */
class User extends ActiveRecord implements IdentityInterface
{
    public $faculty_id;
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
            [['name', 'email', 'password', 'level_id', 'department_id', 'school_id'], 'required'],
            [['level_id', 'department_id', 'school_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'email', 'password'], 'string', 'max' => 100],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'id']],
            [['level_id'], 'exist', 'skipOnError' => true, 'targetClass' => Level::className(), 'targetAttribute' => ['level_id' => 'id']],
            [['school_id'], 'exist', 'skipOnError' => true, 'targetClass' => School::className(), 'targetAttribute' => ['school_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'level_id' => 'Level ID',
            'department_id' => 'Department ID',
            'school_id' => 'School ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }



    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($auth_key)
    {
        return $this->auth_key === $auth_key;
    }


    /**
     * Gets query for [[Department]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'department_id']);
    }

    /**
     * Gets query for [[Level]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLevel()
    {
        return $this->hasOne(Level::className(), ['id' => 'level_id']);
    }

    /**
     * Gets query for [[School]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSchool()
    {
        return $this->hasOne(School::className(), ['id' => 'school_id']);
    }

    /**
     * Gets query for [[UserCourses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserCourses()
    {
        return $this->hasMany(UserCourse::className(), ['user_id' => 'id']);
    }

    public function getCourses()
    {
        return $this->hasMany(Course::className(), ['id' => 'course_id'])
                    ->viaTable('user_courses', ['user_id' => 'id']);
    }

    public static function findByEmail($email)
    {
        return self::findOne(['email' => $email]);
    }

       /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->getSecurity()->validatePassword($this->password, $password);
    }

    public function login()
    {
        $user = $this->findByEmail($this->email);
        if($user && $this->validatePassword($user->password))
        {
            return Yii::$app->user->login($user);
        }

        return false;
    }

    public static function getAuthUser()
    {
        return User::findOne(Yii::$app->user->id);
        
    }

}
