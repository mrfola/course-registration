<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "courses".
 *
 * @property int $id
 * @property string $name
 * @property string $course_code
 * @property int $level_id
 * @property int $department_id
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Department $department
 * @property Level $level
 * @property UserCourse[] $userCourses
 */
class Course extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'courses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'course_code', 'level_id', 'department_id'], 'required'],
            [['level_id', 'department_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'course_code'], 'string', 'max' => 100],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'id']],
            [['level_id'], 'exist', 'skipOnError' => true, 'targetClass' => Level::className(), 'targetAttribute' => ['level_id' => 'id']],
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
            'course_code' => 'Course Code',
            'level_id' => 'Level ID',
            'department_id' => 'Department ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
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
     * Gets query for [[UserCourse]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserCourses()
    {
        return $this->hasMany(UserCourse::className(), ['course_id' => 'id']);
    }
}
