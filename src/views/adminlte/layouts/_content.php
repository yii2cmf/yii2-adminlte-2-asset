<?php
/* @var $content */
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        <?php if(isset(Yii::$app->params['page_header'])):?>
            <?= Yii::$app->params['page_header'] ?? 'Page Header' ?>
            <small><?= Yii::$app->params['page_header_description'] ?? 'Optional description' ?></small>
        <?php elseif (isset($this->blocks['content-header'])):?>
            <?= $this->blocks['content-header'] ?>
        <?php else:?>
            <?= ucfirst($this->context->module->id) ?> <span class="badge badge-light">Module</span>
        <?php endif;?>
        </h1>
        <?= \yii\widgets\Breadcrumbs::widget([
            'itemTemplate' => "<li>{link}</li>\n",
            'activeItemTemplate' => "<li class=\"active\">{link}</li>\n",
            'tag' => 'ol',
            'homeLink' => ['label' => '<i class="fa fa-home"></i> Home', 'url' => '/', 'encode' => false],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]);?>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <!--------------------------
          | Your Page Content Here |
          -------------------------->
        <?= $content ?>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->