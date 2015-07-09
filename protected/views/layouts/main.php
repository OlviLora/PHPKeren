<?php /* @var $this Controller */ ?>
<?php Yii::app()->bootstrap->register(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

        <title><?php echo "Welcome"; ?></title>
    </head>

    <body>

        <div class="container" id="page">

            <div id="header">
                <div id="logo"><?php echo "this is Header"; ?></div>
            </div><!-- header -->

            <div id="mainmenu">
                <?php
                //$this->widget('zii.widgets.CMenu',array(
//			'items'=>array(
//				array('label'=>'Home', 'url'=>array('/site/index'), 'visible'=>!Yii::app()->user->isGuest),
//				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about'), 'visible'=>!Yii::app()->user->isGuest),
//				array('label'=>'Contact', 'url'=>array('/site/contact'), 'visible'=>!Yii::app()->user->isGuest),
//				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>!Yii::app()->user->isGuest),
//				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
//			),
//		)); 
                ?>


                <?php
                $this->widget('bootstrap.widgets.TbNavbar', array(
                    'brandLabel' => 'Title',
                    'display' => null, // default is static to top
                    'items' => array(
                        array(
                            'class' => 'bootstrap.widgets.TbNav',
                            'items' => array(
                                array('label' => 'Home', 'url' => array('/site/index'), 'active' => true),
                            //array('label' => 'Link', 'url' => '#'),
                            //array('label' => 'Link', 'url' => '#'),
                            //TbHtml::navbarSearchForm('#'),
                            ),
                        ),
                    ),
                ));
                ?>

            </div><!-- mainmenu -->
            <?php //if(isset($this->breadcrumbs)): ?>
            <?php //$this->widget('zii.widgets.CBreadcrumbs', array('links'=>$this->breadcrumbs,)); ?>
            <!-- breadcrumbs -->
            <?php //endif ?>

            <?php echo $content; ?>

            <div class="clear"></div>

            <div id="footer">
                Copyright &copy; <?php echo date('Y'); ?> by TI-1SYP_01<br/>
                All Rights Reserved.<br/>
                <?php echo "Powered by Yiistrap" ?>
            </div><!-- footer -->

        </div><!-- page -->

    </body>
</html>