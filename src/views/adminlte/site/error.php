<?php
use yii\web\NotFoundHttpException;

$this->title = $exception->statusCode.' '.$exception->getMessage();

$statusCode = ''.$exception->statusCode;
$statusCode = $statusCode[0];

$errors[403] = 'Access to the requested resource is denied. The user may not have enough permissions.';
$errors[404] = 'The requested resource does not exist.';
$errors[405] = 'The HTTP method in the request is not valid for the resource.';
$errors[413] = 'The request size exceeds the maximum value.';
$errors[500] = 'An internal server error occurred while processing the request.';
$errors[501] = 'The requested function is not implemented.';
?>
<!-- Main content -->
<section class="content">

    <div class="error-page">
        <h2 class="headline <?= $statusCode == 4 ? 'text-yellow' : 'text-red' ?>"><?= $exception->statusCode ?></h2>

        <div class="error-content">
            <h3><i class="fa fa-warning <?= $statusCode == 4 ? 'text-yellow' : 'text-red' ?>"></i> <?= $exception->getMessage() ?></h3>

            <p>
                <?= array_key_exists($exception->statusCode,$errors) ? $errors[$exception->statusCode] : 'We will work on fixing that right away.' ?>
            </p>

        </div>
    </div>
    <!-- /.error-page -->

</section>
<!-- /.content -->