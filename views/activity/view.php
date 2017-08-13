<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use vendor\gamantha\pao\project\models\Activity;
use vendor\gamantha\pao\project\models\ActivityMeta;
use common\modules\profile\models\Profile;


/* @var $this yii\web\View */
/* @var $model vendor\gamantha\pao\project\models\Activity */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Activities'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="activity-view">

    <h1><?= Html::encode($this->title) ?></h1>
    should include assessee information for this activity & any other activity_meta
    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'project_id',
            'name',
            [
                'label' => 'Assessee Name [FROM ACTIVITY_META]',
                'value' => function($data){
                    $activity_assessee_model = ActivityMeta::find()
                    ->andWhere(['activity_id' => $data->id])
                    ->andWhere(['type' => 'general'])
                    ->andWhere(['key' => 'assessee'])->One();
                    $assessee_model = Profile::findOne($activity_assessee_model->value);
                    return $assessee_model->first_name;
                }
            ],
            [
                'label' => 'SCHEDULE [FROM ACTIVITY_META]',
                'value' => 'sasa',
            ],
            'status',
            'created_at',
            'modified_at',
        ],
    ]) ?>

</div>