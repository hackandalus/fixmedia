<!DOCTYPE html>
<html lang="es">
<head>
    <link href='http://fonts.googleapis.com/css?family=Asap:400,700' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=1024" />
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?=$page_title?> - Fixmedia</title>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>/images/favicon.png">
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="<?= isset($description) ? $description : ''; ?>" />
    <meta name="keywords" content="" />
    <meta name="robots" content="index, follow" />
    <meta name="contact_addr" content="" />
    <meta name="distribution" content="Global" />
    <meta name="resource-type" content="document" />
    <meta http-equiv="content-language" content="es" />
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-ui-1.8.23.custom.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-scrolltofixed-min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.colorbox-min.js"></script>
    <script type="text/javascript" src="<?php echo base_url(); ?>js/default.js"></script>
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/styles.css" />
</head>
<body>
    <header id="header">
        <div class="wrap clearfix">
            <p class="main_title"><a href="<?php echo base_url(); ?>" title="Fixmedia.org, arregla las noticias"><img src="<?= base_url('images/logo-fixmedia.png'); ?>"/" alt="Fixmedia.org, arregla las noticias" title="Fixmedia.org, arregla las noticias"/></a></p>
            <nav class="top-menu">
                <ul class="menu clearfix">
                    <li><a href="<?= site_url($this->router->reverseRoute('statics', array('page' => 'que-es-fixmedia'))); ?>">¿Qué es fixmedia?</a></li>
                    <li><a href="<?= site_url($this->router->reverseRoute('statics', array('page' => 'problemas'))); ?>">Ayúdanos a mejorar</a></li>
                </ul>
            </nav>
            <? if (!$logged_in) : ?>
                <a class="log_in" href="<?= site_url($this->router->reverseRoute('login')); ?>">Iniciar sesión</a>
            <? else :?>
                <section class="user">
                    <a class="welcome" href="#"><span class="user_name"><?= $the_user->name; ?></span> <?=gravatar( $the_user->email, 40, true, base_url('static/avatar-user-40.jpg'), 'x', array('title' => 'Reputación ' . $the_user->karma) )?></a>
                    <div class="user_info">
                        <span class="indicator"></span>
                        <div class="clearfix">
                            <div class="user_avatar">
                                <?=gravatar( $the_user->email, 100, true, base_url('static/avatar-user-100.jpg'), 'x', array('title' => 'Reputación ' . $the_user->karma) )?>
                                <a href="<?= site_url($this->router->reverseRoute('user-profile', array('username' => $the_user->username))); ?>">Ver perfil</a>
                            </div>

                            <div class="user_data">
                                <h2 class="name"><?= $the_user->name; ?></h2>
                                <p class="counters">
                                    <span class="fix_count"><?= count($the_user->fixes); ?></span> fixes
                                    <span class="report_count"><?= count($the_user->subreports); ?></span> reportes
                                </p>
                                <p class="karma">Reputación: <?= $the_user->karma; ?></p>
                            </div>
                        </div>
                        <a class="log_out" href="<?= site_url($this->router->reverseRoute('logout')); ?>">Cerrar sesión</a>
                    </div>
                </section>
            <? endif; ?>
        </div>
    </header>
    <nav class="main-menu">
        <ul class="menu clearfix">
            <li><a href="<?= site_url($this->router->reverseRoute('reports-create')); ?>" class="button icon fixit">FIX</a></li>
            <li class="<?= is_cur_page($this, 'reports','index') ? 'current' : ''; ?>"><a class="link" href="<?= site_url(); ?>">Más urgentes</a></li>
            <li class="<?= is_cur_page($this, 'reports','recents') ? 'current' : ''; ?>"><a class="link" href="<?= site_url($this->router->reverseRoute('home-recents')); ?>">Recientes</a></li>
            <li class="<?= is_cur_page($this, 'reports','pendings') ? 'current' : ''; ?>"><a class="link" href="<?= site_url($this->router->reverseRoute('home-pending')); ?>">Pendientes</a></li>
            <li><a class="link" href="<?= site_url($this->router->reverseRoute('statics', array('page' => 'top-usuarios'))); ?>">Top usuarios</a></li>
            <li><a class="link" href="<?= site_url($this->router->reverseRoute('statics', array('page' => 'top-fuentes'))); ?>">Top fuentes</a></li>
            <li><a class="link" href="<?= site_url($this->router->reverseRoute('statics', array('page' => 'estadisticas'))); ?>">Estadísticas</a></li>
            <li class="search">
                <form action="#">
                    <input type="text" placeholder="no disponible"/>
                </form>
            </li>
        </ul>
    </nav>
    <? if (!$logged_in) : ?>
    <div class="banner">
        <a href="<?= site_url($this->router->reverseRoute('statics', array('page' => 'que-es-fixmedia'))); ?>"><img src="<?= base_url('images/banner.png'); ?>" alt="Qué es fixmedia.org" /></a>
    </div>
    <? endif; ?>