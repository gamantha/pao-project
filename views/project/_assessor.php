<?php
use vendor\gamantha\pao\project\models\Project;
use vendor\gamantha\pao\project\models\ProjectMeta;
use vendor\gamantha\pao\project\models\ProjectActivity;
use vendor\gamantha\pao\project\models\ProjectActivityMeta;
use common\modules\profile\models\Profile;
use common\modules\profile\models\ProfileMeta;
use yii\data\ActiveDataProvider;
//use Yii;
use Yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;


?>
<hr/>
=== ASSESSOR PAGE ===
<br/>
apa yang mau dilihat asesor disini?
<br/>
- aktifitas yang berhubungan dengan dia sebagai assessor


<?php

$profile_model = Profile::find()->andWhere(['user_id' => Yii::$app->user->id])->One();

            $distinct_assessor_activities_model = ProjectActivityMeta::find()
                ->andWhere(['type' => 'general'])
                ->andWhere(['key' => 'assessor'])
                ->andWhere(['value' => $profile_model->id])
                ->asArray()->All();

            $assessor_activity_ids = ArrayHelper::getColumn($distinct_assessor_activities_model, 'project_activity_id');


            $activityQuery = ProjectActivity::find()
            ->andWhere(['project_id' => $_GET['id']])
            ->andWhere(['in','id',$assessor_activity_ids]);

			$activityDataProvider = new ActiveDataProvider([
			    'query' => $activityQuery,
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



			 echo GridView::widget([
			        'dataProvider' => $activityDataProvider,
			       // 'filterModel' => $searchModel,
			        'columns' => [
			            //['class' => 'yii\grid\SerialColumn'],

			            //'id',
			            [
			            	'label' => 'Activity',
			            	'attribute' => 'id',
			            	'format' => 'raw',
			            	'value' => function($data){
			            		$link = Html::a($data->id, ['activity/view', 'id' => $data->id], ['class' => 'profile-link']);
			            		return $link;
			            	}
			            ],
            	

			        ],
			    ]);


?>