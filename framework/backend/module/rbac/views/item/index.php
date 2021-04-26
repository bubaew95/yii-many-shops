<?php

use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $dataProvider \yii\data\ArrayDataProvider */
/* @var $searchModel \backend\module\rbac\models\search\AuthItemSearch */

$labels = $this->context->getLabels();
$this->title = Yii::t('yii2mod.rbac', $labels['Items']);
$this->params['breadcrumbs'][] = $this->title;
$this->render('/layouts/_sidebar');
?>

<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="card ">

            <div class="card-header header-elements-inline d-flex justify-content-between">
                <h5 class="card-title"><?= $this->title?></h5>
                <div class="header-elements">
                    <?php echo Html::a(Yii::t('yii2mod.rbac', 'Create ' . $labels['Item']), ['create'], ['class' => 'btn btn-success btn-small']); ?>
                </div>
            </div>

            <div class="card-body"></div>

            <div class="card-body">

                <div class="item-index table-responsive">
                    <?php Pjax::begin(['timeout' => 5000, 'enablePushState' => false]); ?>

                    <?php echo GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'summary' =>false,
                        'tableOptions' => [
                            'class' => 'table datatable-html dataTable no-footer'
                        ],
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            [
                                'attribute' => 'name',
                                'label' => Yii::t('yii2mod.rbac', 'Name'),
                            ],
                            [
                                'attribute' => 'ruleName',
                                'label' => Yii::t('yii2mod.rbac', 'Rule Name'),
                                'filter' => ArrayHelper::map(Yii::$app->getAuthManager()->getRules(), 'name', 'name'),
                                'filterInputOptions' => ['class' => 'form-control', 'prompt' => Yii::t('yii2mod.rbac', 'Select Rule')],
                            ],
                            [
                                'attribute' => 'description',
                                'format' => 'ntext',
                                'label' => Yii::t('yii2mod.rbac', 'Description'),
                            ],
                            [
                                'header' => Yii::t('yii2mod.rbac', 'Action'),
                                'class' => 'yii\grid\ActionColumn',
                                'buttonOptions' => [
                                    'class' => 'btn'
                                ],
                                'contentOptions' => [
                                    'width' => '20%',
                                    'class' => 'text-center',
                                ],
                                'headerOptions' => [
                                    'class' => 'text-center'
                                ],
                            ],
                        ],
                    ]); ?>

                    <?php Pjax::end(); ?>
                </div>

            </div>
        </div>
    </div>
</div>

