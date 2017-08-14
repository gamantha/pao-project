<?php

namespace vendor\gamantha\pao\project\models;

use Yii;

/**
 * This is the model class for table "project_activity".
 *
 * @property integer $id
 * @property integer $project_id
 * @property string $name
 * @property string $status
 * @property string $created_at
 * @property string $modified_at
 *
 * @property Project $project
 * @property ProjectActivityMeta[] $projectActivityMetas
 */
class ProjectActivity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'project_activity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id'], 'integer'],
            [['created_at', 'modified_at'], 'safe'],
            [['name', 'status'], 'string', 'max' => 255],
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
            'project_id' => Yii::t('app', 'Project ID'),
            'name' => Yii::t('app', 'Name'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'modified_at' => Yii::t('app', 'Modified At'),
        ];
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
    public function getProjectActivityMetas()
    {
        return $this->hasMany(ProjectActivityMeta::className(), ['project_activity_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return ProjectActivityQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProjectActivityQuery(get_called_class());
    }
}
