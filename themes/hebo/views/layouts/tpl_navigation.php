<section id="navigation-main">  
    <div class="navbar">
        <div class="navbar-inner">
            <div class="container">
                <div class="span8">
                    <a href="index.php" class="logos logo"></a>
                </div><!--/.span8 -->

                <div class="nav-collapse">
                    <?php
                    $this->widget('zii.widgets.CMenu', array(
                        'htmlOptions' => array('class' => 'nav'),
                        'submenuHtmlOptions' => array('class' => 'dropdown-menu'),
                        'itemCssClass' => 'item-test',
                        'encodeLabel' => false,
                        'items' => array(
                            //array('label' => 'Home', 'url' => array('/site/index'), 'linkOptions' => array("data-description" => "our home page")),
                            //array('label' => 'Login', 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest, 'linkOptions' => array("data-description" => "member area")),
                            array('label' => 'Logout', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest, 'linkOptions' => array("data-description" => "(" . Yii::app()->user->name . ")")),
                        ),
                    ));
                    ?>
                </div>
                
                
                    <?php
                    if ($this->route != 'site/meeting') {
                        $temp = Yii::app()->createController('site');
                        $siteController = $temp[0];
                    ?>
                <div class="logos garisM"></div>
                <div class="span1">
                <?php

                        $meeting = $siteController->meetingToday();
                        if ($meeting) {
                            echo CHtml::link('<div class="logos startM"></div>', 'index.php?r=site/meeting&idRapat=' . $meeting);
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section><!-- /#navigation-main -->