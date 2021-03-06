<!-- sidebar template page -->

<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<section class="main-body">
    <!-- left menu -->
    <div class="menu">
        <div class="m">
            <a href="index.php">
                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/icons/menu/home1.png" alt="" class="" />
            </a>
            <div class="warnaH">
            </div>
        </div>
        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/icons/menu/garis.png" alt="" class="" style="padding-top: 55px; padding-bottom: 10px; padding-right: 15px;" />

        <div class="m1">
            <a href="index.php?r=agenda/index">
                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/icons/menu/book.png" alt="" class="" />
            </a>
            <div class="warnaA">
            </div>
        </div>
        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/icons/menu/garis.png" alt="" class="" style="padding-top: 70px; padding-bottom: 20px; padding-right: 15px;" />

        <div class="m2">
            <a href="index.php?r=rapat/index">
                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/icons/menu/meeting.png" alt="" class="" />
            </a>
            <div class="warnaM">
            </div>
        </div>
        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/icons/menu/garis.png" alt="" class="" style="padding-top: 65px; padding-bottom: 10px; padding-right: 15px;" />

        <div class="m3">
            <a href="index.php?r=request/index">
                <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/icons/menu/request.png" alt="" class="" />
            </a>
            <div class="warnaR">
            </div>
        </div>

        <div class="mh mcss">
            Home
        </div>
        <div class="ma mcss">
            Agenda
        </div>
        <div class="mm mcss">
            Meeting
        </div>
        <div class="mr mcss">
            Request
        </div>
    </div>

    <!-- right menu for admin -->
    <?php
    $auth = Yii::app()->db->createCommand()
            ->select('itemname')
            ->from('authassignment')
            ->where('userid = :temp_id', array(':temp_id' => Yii::app()->user->id))
            ->queryRow();
    if ($auth['itemname'] === 'admin') {
        ?>

        <div class="menuA">
            <div class="r">
                <a href="index.php?r=Account/index">
                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/icons/right/accounts.png" alt="" class="" />
                </a>
                <div class="warna1">
                </div>
            </div>
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/icons/menu/garis.png" alt="" class="" style="padding-top: 55px; padding-bottom: 10px; padding-right: 30px;" />

            <div class="r1">
                <a href="index.php?r=Member/index">
                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/icons/right/member.png" alt="" class="" />
                </a>
                <div class="warna2">
                </div>
            </div>
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/icons/menu/garis.png" alt="" class="" style="padding-top: 70px; padding-bottom: 20px; padding-right: 30px;" />

            <div class="r2">
                <a href="index.php?r=GrupRapat/index">
                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/icons/right/Status.png" alt="" class="" />
                </a>
                <div class="warna3">
                </div>
            </div>
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/icons/menu/garis.png" alt="" class="" style="padding-top: 65px; padding-bottom: 10px; padding-right: 30px;" />

            <div class="r3">
                <a href="index.php?r=kategoriRapat/index">
                    <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/icons/right/jabatan.png" alt="" class="" />
                </a>
                <div class="warna4">
                </div>
            </div>

            <div class="mh mcssr">
                Accounts
            </div>
            <div class="ma mcssr">
                Members
            </div>
            <div class="mm mcssr">
                Group
            </div>
            <div class="mr mcssr">
                Type
            </div>
        </div>
    <?php } ?>

    <!-- Menu Search -->
    <div class="menuS">
        <a href="index.php?r=site/search">
            <img src="<?php echo Yii::app()->theme->baseUrl; ?>/img/icons/search.png" height="30" width="30" alt="" class="sear" style="padding-top: 17px; padding-left: 10px;" />
        </a>
    </div>

    <!-- layout content -->
    <div class="container">
        <div class="row-fluid">

            <div class="span4">
                <div class="sidepage">
                    <?php include_once('tpl_sidebar.php'); ?>
                </div>
            </div><!--/span-->

            <div class="span8">

                <?php if (isset($this->breadcrumbs)): ?>
                    <?php
                    $this->widget('zii.widgets.CBreadcrumbs', array(
                        'links' => $this->breadcrumbs,
                        'homeLink' => CHtml::link('Dashboard'),
                        'htmlOptions' => array('class' => 'breadcrumb')
                    ));
                    ?><!-- breadcrumbs -->
                <?php endif ?>

                <!-- Include content pages -->
                <div class="sidecontent">
                    <?php echo $content; ?>

                </div><!--/span-->
            </div>
        </div><!--/row-->
    </div>
</section>


<?php $this->endContent(); ?>