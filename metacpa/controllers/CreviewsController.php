<?php

namespace app\modules\admin\controllers;



use common\models\admin\Search\MetacpaSearch;
use common\models\admin\technical\DependencesDoc;
use common\models\admin\technical\PostalPay;
use common\models\admin\technical\TypeEducation;
use common\models\backup\Backupcreviewsdev;
use common\models\User;
use frontend\components\Common;
use http\Exception;
use Symfony\Component\Debug\ExceptionHandler;
use Yii;
use common\models\admin\Creviews;
use common\models\admin\Search\Creviews as CreviewsSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use ZipArchive;
use common\models\admin\Students;


/**
 * CreviewsController implements the CRUD actions for Creviews model.
 */
class CreviewsController extends Controller
{

    public function actionMetaCpaTest()
    {


        try {
//            `domain_name`, `traffic_source_name` Отдельно
            //Адрес для API
            $url = 'http://209.97.133.143/tz/api.php?key=20e62b46af322affca0d9bccb7a';
//Сохраняем массив в переменную
            $array = @json_decode(file_get_contents($url), TRUE);
//Создаём SQL запрос со значениями
            $sql='INSERT INTO {{%metacpa}}
 (`campaign_name`, `clicks`, `leads`, `conversion_rate`, `id_compain`)
            VALUES ';

            foreach ($array as $arr):
//Вычисляем конверсию, для примера клики - лиды
                if (!empty($arr['clicks'])) {
                    if (!empty($arr['leads'])) {
                        $conversion=intval($arr['clicks'])-intval($arr['leads']);
                    }
                }
                else {
                    $conversion='0';
                }
                $sql=$sql. ' ('
                    . '"'.$arr['name']. '"' . ', '
                    . '"'. $arr['clicks']. '"' . ', '
                    . '"'. $arr['leads']. '"' . ', '
                    . '"'. $conversion. '"' . ', '
                    . '"'. $arr['id']. '"'
                    . '),';
            endforeach;

            //Удаляем последнюю запятую, т.к цикл закончен
            $sql=trim($sql,',');

            //Записываем в БД

            Yii::$app->db->createCommand(
                'TRUNCATE TABLE {{%metacpa}}')->execute();

            Yii::$app->db->createCommand(
                $sql)
//                ->bindValue(':sql', $sql)
                ->execute();


            $searchModel = new MetacpaSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);




            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);

        } catch (Exception $e) {
        }

    }



}
