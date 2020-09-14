<?
use frontend\components\Common;
use yii\helpers\Html;
use yii\grid\GridView;

$this->title = 'Таблица METACPA';
$this->params['breadcrumbs'][] = $this->title;

echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'campaign_name',
            'clicks',
            'leads',
            'conversion_rate',
            'id_compain',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


?>