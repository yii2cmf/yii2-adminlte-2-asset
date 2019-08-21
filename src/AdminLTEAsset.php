<?php
namespace yii2cmf\adminlte;

use Yii;
use yii\web\AssetBundle;

class AdminLTEAsset extends AssetBundle
{
    public $sourcePath = '@vendor/almasaeed2010/adminlte/';

    public $css = [
        'bower_components/bootstrap/dist/css/bootstrap.min.css',
        'bower_components/font-awesome/css/font-awesome.min.css',
        'bower_components/Ionicons/css/ionicons.min.css',
        'dist/css/AdminLTE.min.css',
    ];

    public $js = [
        //'bower_components/jquery/dist/jquery.min.js',
        'bower_components/bootstrap/dist/js/bootstrap.min.js',
        'dist/js/adminlte.min.js'
    ];

    public $jsOptions = ['position' => \yii\web\View::POS_END];


    public $depends = [
        'yii\web\JqueryAsset',
        'yii\web\YiiAsset',
    ];

    public function init()
    {
        if (YII_ENV_DEV) {
            $this->publishOptions = ['forceCopy' => true];
        }
        if (isset(Yii::$app->params['skin'])) {
            $skin = 'dist/css/skins/'.Yii::$app->params['skin'].'.min.css';
        } else {
            $skin = 'dist/css/skins/skin-blue.min.css';
        }
        $this->css[] = $skin;
        parent::init();
    }
}
