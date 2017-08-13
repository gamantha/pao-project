<?php

namespace vendor\gamantha\pao\project\controllers;

use vendor\gamantha\pao\project\models\Project;
use vendor\gamantha\pao\project\models\ProjectMeta;
use vendor\gamantha\pao\project\models\Activity;
use vendor\gamantha\pao\project\models\ActivityMeta;
use common\modules\profile\models\Profile;
use common\modules\profile\models\ProfileMeta;

use Yii;
use Yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;

class ProjectController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionDashboard($id)
    {
    	$profile_model = Profile::find()->andWhere(['user_id' => Yii::$app->user->id])->One();


    	if (null !== $profile_model) {
    		$project_meta_model = ProfileMeta::find()
    			->andWhere(['type' => 'project'])
    			->andWhere(['attribute_1' => $id])
    			->All();

        	return $this->render('dashboard',[
        			'project_meta_model' => $project_meta_model,
                    //'assessor_activity_ids' => $assessor_activity_ids,
        		]);
                
    	} else {
    		echo 'NO PROFILE YET ASSOCIATED WITH THIS USER';
    	}
    }

    public function actionSelect()
    {
            $profile_model = Profile::find()->andWhere(['user_id' => Yii::$app->user->id])->One();

            $project_meta_models = ProfileMeta::find()
            ->andWhere(['type' => 'project'])
            ->andWhere(['profile_id' => $profile_model->id])->groupBy(['attribute_1'])->asArray()->All();

            $projects_ids = ArrayHelper::getColumn($project_meta_models, 'attribute_1');

            $project_query = Project::find()
            ->andWhere(['in','id',$projects_ids]);

            $projectDataProvider = new ActiveDataProvider([
                'query' => $project_query,
                'pagination' => [
                    'pageSize' => 10,
                ],
                'sort' => [
                    'defaultOrder' => [
            //            'created_at' => SORT_DESC,
              //          'title' => SORT_ASC, 
                    ]
                ],
            ]);


//echo '<pre>';
            //print_r($project_models);
    	return $this->render('select',[
    			'projectDataProvider' => $projectDataProvider,
    		]);	
            
    }

}
