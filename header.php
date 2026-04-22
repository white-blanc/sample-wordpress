<?php
if (! defined('ABSPATH')) exit;

?>
<!DOCTYPE html>
<html lang="ja">

<head prefix="og: http://ogp.me/ns#">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <?php wp_head(); ?>
</head>

<body>
    <?php include dirname(__FILE__) . '/parts/header.php'; ?>
    <main class="l-main <?php if (is_front_page()) echo 'l-main--front'; ?>" id="l-main">
        <?php
        if (!is_front_page()) {
            include_once dirname(__FILE__) . '/parts/page-head.php';
            include_once dirname(__FILE__) . '/parts/breadcrumb.php';
        }
