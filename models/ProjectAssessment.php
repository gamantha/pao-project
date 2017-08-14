<?php

namespace vendor\gamantha\pao\project\models;

use Yii;

/**
 * This is the model class for table "project_assessment".
 *
 * @property integer $id
 * @property integer $profile_id
 * @property integer $project_id
 * @property string $status
 * @property string $created_at
 * @property string $modified_at
 *
 * @property Profile $profile
 * @property Project $project
 * @property ProjectAssessmentMeta[] $projectAssessmentMetas
 */
class ProjectAssessment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project_assessment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['profile_id', 'project_id'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['status'], 'string', 'max' => 255],
            [['profile_id'], 'exist', 'skipOnError' => true, 'targetClass' => Profile::className(), 'targetAttribute' => ['profile_id' => 'id']],
            [['project_id'], 'exist', 'skipOnError' => true, 'targetClass' => Project::className(), 'targetAttribute' => ['project_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'profile_id' => Yii::t('app', 'Profile ID'),
            'project_id' => Yii::t('app', 'Project ID'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'modified_at' => Yii::t('app', 'Modified At'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfile()
    {
        return $this->hasOne(Profile::className(), ['id' => 'profile_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProject()
    {
        return $this->hasOne(Project::className(), ['id' => 'project_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProjectAssessmentMetas()
    {
        return $this->hasMany(ProjectAssessmentMeta::className(), ['project_assessment_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return ProjectAssessmentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProjectAssessmentQuery(get_called_class());
    }
}
