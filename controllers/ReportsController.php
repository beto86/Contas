<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Bills;


class ReportsController extends Controller
{
    public function actionIndex()
    {
    	/** @var Bills[] $allBills */
    	$allBills = Bills::find()
    		->orderBy('date ASC')
    		->all();
            
    	$result = [];

    	foreach ($allBills as $Bills) {
    	 	$result[$Bills->date][] = $Bills;
    	 } 
    	return $this->render('index', [
    		'data' => $result
    	]);
    }
}
