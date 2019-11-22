<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'CakePHP BoilerPlate';
?>
<!DOCTYPE html>
<head>
 
    <!-- Metadata -->
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $cakeDescription ?>: <?= $this->fetch('title') ?></title>
    <?= $this->Html->meta('icon') ?>

    <!-- CSS Files -->
    <?= $this->Html->css('admin/bootstrap.min.css') ?>
    <?= $this->Html->css('admin/font-awesome/css/font-awesome.css') ?>
    <?= $this->Html->css('admin/animate.css') ?>
    <?= $this->Html->css('admin/style.css') ?>
    <?= $this->Html->script('admin/jquery-3.3.1.js');?>
</head>

<body class="gray-bg">
<?= $this->Flash->render() ?>
    <div class="middle-box text-center loginscreen animated fadeInDown">