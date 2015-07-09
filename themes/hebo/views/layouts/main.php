<?php Yii::app()->bootstrap->register(); ?>

<?php
if (Yii::app()->user->isGuest) {
    ?>
    <div class="gridMove">
        <!-- Require the header -->
        <?php require_once('tpl_header.php') ?>

        <!-- Include content pages -->
        <?php echo $content; ?>
    </div>
    <?php
} else {
    ?>
    <div class="grid">
        <!-- Require the header -->
        <?php require_once('tpl_header.php') ?>

        <!-- Require the navigation -->
        <?php require_once('tpl_navigation.php') ?>

        <!-- Include content pages -->
        <?php echo $content; ?>

        <!-- Require the footer -->
        <?php require_once('tpl_footer.php') ?>
    </div>
    <?php
}
?>