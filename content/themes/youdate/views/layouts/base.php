<?php

/* @var $this \app\base\View */
/* @var $content string */

use yii\helpers\Html;

\youdate\assets\Asset::register($this);
$bodyClass = isset($this->params['body.cssClass']) ? $this->params['body.cssClass'] : 'body-default';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta name="baseUrl" content="<?= \app\helpers\Url::to(['/'], true) ?>">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Language" content="en" />
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="theme-color" content="#4188c9">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="description" content="<?= $this->frontendSetting('siteMetaDescription') ?>">
    <meta name="keywords" content="<?= $this->frontendSetting('siteMetaKeywords') ?>">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Montserrat:400,700">
    <title><?= Html::encode($this->title) ?></title>
    <?= Html::csrfMetaTags() ?>
    <?php $this->head() ?>
    <?php $this->customHeaderCode() ?>
</head>
<body class="<?= $bodyClass ?>">
<?php $this->beginBody() ?>
<?= $this->render('//partials/user-confirmation') ?>
<?= $content ?>
<?php $this->endBody() ?>
<?php $this->customFooterCode() ?>
</body>
</html>
<?php $this->endPage() ?>
