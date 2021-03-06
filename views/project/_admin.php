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
<?php 
echo '<h3>Admin Functions</h3>';
echo Html::a('File upload', ['/file/upload', 'id' => $_GET['id']], ['class' => 'btn btn btn-info']);
echo '   ';
echo Html::a('Scan data', ['/scan/data', 'id' => $_GET['id']], ['class' => 'btn btn btn-info']);
echo '<hr/>';
echo '<h3>Admin Dashboard</h3>';
?>
<br/>
apa yang mau dilihat admin disini?
<br/>

- ????


<?php

$profile_model = Profile::find()->andWhere(['user_id' => Yii::$app->user->id])->One();

            $distinct_assessor_activities_model = ProjectActivityMeta::find()
                ->andWhere(['type' => 'general'])
                ->andWhere(['key' => 'assessor'])
                ->andWhere(['value' => $profile_model->id])
                ->asArray()->All();

            $assessor_activity_ids = ArrayHelper::getColumn($distinct_assessor_activities_model, 'project_activity_id');


            $activityQuery = ProjectActivity::find()
            //->andWhere(['in','id',$assessor_activity_ids])
            ;

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