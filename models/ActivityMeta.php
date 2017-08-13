<?php

namespace vendor\gamantha\pao\project\models;

use Yii;

/**
 * This is the model class for table "activity_meta".
 *
 * @property integer $activity_id
 * @property string $type
 * @property string $key
 * @property string $value
 * @property string $attribute_1
 * @property string $attribute_2
 * @property string $attribute_3
 *
 * @property Activity $activity
 */
class ActivityMeta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'activity_meta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['activity_id', 'type', 'key', 'value'], 'required'],
            [['activity_id'], 'integer'],
            [['type', 'key', 'value', 'attribute_1', 'attribute_2', 'attribute_3'], 'string', 'max' => 255],
            [['activity_id'], 'exist', 'skipOnError' => true, 'targetClass' => Activity::className(), 'targetAttribute' => ['activity_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'activity_id' => Yii::t('app', 'Activity ID'),
            'type' => Yii::t('app', 'Type'),
            'key' => Yii::t('app', 'Key'),
            'value' => Yii::t('app', 'Value'),
            'attribute_1' => Yii::t('app', 'Attribute 1'),
            'attribute_2' => Yii::t('app', 'Attribute 2'),
            'attribute_3' => Yii::t('app', 'Attribute 3'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getActivity()
    {
        return $this->hasOne(Activity::className(), ['id' => 'activity_id']);
    }

    /**
     * @inheritdoc
     * @return ActivityMetaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ActivityMetaQuery(get_called_class());
    }
}
