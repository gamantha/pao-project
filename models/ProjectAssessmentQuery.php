<?php

namespace vendor\gamantha\pao\project\models;

/**
 * This is the ActiveQuery class for [[ProjectAssessment]].
 *
 * @see ProjectAssessment
 */
class ProjectAssessmentQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ProjectAssessment[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ProjectAssessment|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
