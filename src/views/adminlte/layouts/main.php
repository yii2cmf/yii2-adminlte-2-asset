<?php
use yii2cmf\adminlte\AdminLTEAsset;
use yii\helpers\Html;

/* @var $content mixed */

//If necessary, uncomment and change to another skin
Yii::$app->params['skin'] = 'skin-black-light';
//If necessary, uncomment, and change layout_options
Yii::$app->params['layout_options'] = 'sidebar-mini';
//If necessary, uncomment, and change control-sidebar class
Yii::$app->params['control_sidebar'] = 'control-sidebar-light';

$bundle = AdminLTEAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <?php $this->head() ?>
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition <?= Yii::$app->params['skin'] ?? 'skin-blue' ?> <?= Yii::$app->params['layout_options'] ?? 'sidebar-mini' ?>">
<?php $this->beginBody() ?>
<div class="wrapper">

    <!-- Main Header -->
    <?= $this->render('_header', ['bundle' => $bundle]) ?>
    <!-- Left side column. contains the logo and sidebar -->
    <?= $this->render('_sidebar', ['bundle' => $bundle]) ?>
    <!-- Content Wrapper. Contains page content -->
    <?= $this->render('_content', ['content' => $content]) ?>

    <!-- Main Footer -->
    <?= $this->render('_footer') ?>

    <!-- Control Sidebar -->
    <?= $this->render('_control_sidebar') ?>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
