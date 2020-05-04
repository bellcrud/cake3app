<!DOCTYPE html>
<html lang="ja">
<head>
    <?= $this->Html->charset() ?>
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->css('cake.hello') ?>
    <?= $this->Html->script('cake.hellos') ?>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>

<body>
<div id="container">
    <div id="header">
        <?= $this->element('Hello/header') ?>
    </div>
    <div id="content">
        <?= $this->fetch('content') ?>
    </div>
    <div id="footer">
        <?= $this->element('Hello/footer1')?>
    </div>
</div>
</body>