<!DOCTYPE html>
<?php require_once "config.php";
/*
 * @Author: Elijah
 * @Date: 2022-02-08 21:00:37
 * @LastEditors: Elijah
 * @LastEditTime: 2022-02-08 21:00:37
 * @FilePath: /TimeMail/header.php
 * @Description: 
 * 山水一程，已是三生有幸！
 * Copyright (c) 2022 by Elijah, All Rights Reserved. 
 * @description: 
 * @param: 
 * @return: 
 */
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <meta name="description" content="TimeMail时光邮局 - 给未来写封信" />
    <meta name="keywords" content="TimeMail,时光邮局,给未来写封信,xcsoft,星辰日记,php,xc-blog,soxft" />
    <title><?php echo TITLE ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/soxft/cdn@latest/mdui/css/mdui.min.css">
    <script src="https://cdn.jsdelivr.net/gh/soxft/cdn@latest/mdui/js/mdui.min.js"></script>
    <link rel="shortcut icon" type="image/x-icon"
        href="https://cdn.jsdelivr.net/gh/soxft/cdn@latest/time/img/favicon.ico" media="screen" />
    <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }

    gtag('js', new Date());
    gtag('config', 'UA-159315608-3');
    </script>
    <style>
    a {
        text-decoration: none
    }

    a:hover {
        text-decoration: none
    }
    </style>
</head>
<!-- header baota-->
<header class="mdui-appbar mdui-appbar-fixed">
    <!-- oncontextmenu="return true" onselectstart="return true" oncopy="return true" 
    三个参数分别为右键菜单，左键选择，复制 -->

    <body oncontextmenu="return true" onselectstart="return true" oncopy="return true"
        background="https://cdn.jsdelivr.net/gh/soxft/cdn@latest/time/img/background.png"
        class="mdui-drawer-body-left mdui-appbar-with-toolbar">
        <div class="mdui-toolbar mdui-color-theme">
            <span class="mdui-btn mdui-btn-icon mdui-ripple" mdui-drawer="{target: '#main-drawer'}">
                <i class="mdui-icon material-icons">menu</i>
            </span>
            <a href="" class="mdui-typo-title">TimeMail</a>
</header>
<div class="mdui-drawer" id="main-drawer">
    <div class="mdui-list" mdui-collapse="{accordion: true}" style="margin-bottom: 68px;">
        <div class="mdui-list">
            <a href="/" class="mdui-list-item">
                <i class="mdui-list-item-icon mdui-icon material-icons">filter_none</i>
                &emsp;主页
            </a>
            <a href="./write.php" class="mdui-list-item">
                <i class="mdui-list-item-icon mdui-icon material-icons">mail_outline</i>
                &emsp;写信
            </a>
            <a href="./status.php" class="mdui-list-item">
                <i class="mdui-list-item-icon mdui-icon material-icons">settings</i>
                &emsp;状态
            </a>
            <a href="./about.php" class="mdui-list-item">
                <i class="mdui-list-item-icon mdui-icon material-icons">info_outline</i>
                &emsp;关于
            </a>
        </div>
        <div class="mdui-collapse-item ">
            <div class="mdui-collapse-item-header mdui-list-item mdui-ripple">
                <i class="mdui-list-item-icon mdui-icon material-icons">&#xe80d;</i>
                &emsp;友链
                <i class="mdui-collapse-item-arrow mdui-icon material-icons">keyboard_arrow_down</i>
            </div>
            <div class="mdui-collapse-item-body mdui-list">
                <a href="//ce1estial.tk" class="mdui-list-item mdui-ripple ">S-light</a>
            </div>
        </div>
    </div>
</div>
<br />