<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Sistema financeiro Pessoal';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Sistema financeiro Pessoal</h1>

        <p class="lead">Organozação de suas finançãs pessoais.</p>

        <p>
            <?= Html::a('Criar um lançamento', ['bills/create'], ['class' => 'btn btn-success']) ?>
           <!-- <a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Criar um lançamento</a>-->
        </p>
       
        <p>
            <?= Html::a('Ver relatórios', ['reports/index'], [
                'title' => 'Ver meus relatórios',
                'class' => 'btn btn-sm btn-link'
            ]) ?>
        </p>
    </div>

</div>
