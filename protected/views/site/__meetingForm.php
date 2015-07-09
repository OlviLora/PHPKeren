<?php
/* @var $meetingForm MeetingForm */
/* @var $agenda Agenda */
?>

<?php Yii::app()->clientScript->registerCoreScript("jquery") ?>

<div class="row-fluid">
    <div class="conts">
        <!-- form --> 
        <div class="form">
            <h1>What are you talking about?</h1>

            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'meetingForm',
                'enableAjaxValidation' => false,
            ));
            ?> 

            <div class="row">  
                <?php echo 'Topik : ' . $agenda->topik; ?> 
            </div> 

            <div class="row"> 
                <?php echo 'Deskripsi : ' . $agenda->deskripsi; ?> 
            </div> 

            <div class="row"> 
                <?php echo 'PIC : ' . $agenda->pIC->nama; ?> 
            </div> 

            <div class="row">   
                <?php echo $form->labelEx($meetingForm, 'catatan'); ?>
                <?php echo $form->textArea($meetingForm, 'catatan', array('rows' => '13', 'id' => 'note', 'readonly' => true)); ?>
                <?php echo $form->error($meetingForm, 'catatan'); ?> 
            </div> 

            <div class="row">
                <?php echo $form->labelEx($meetingForm, 'keputusan'); ?>
                <?php echo $form->textArea($meetingForm, 'keputusan', array('rows' => '6', 'id' => 'nextTarget', 'readonly' => true)); ?> 
                <?php echo $form->error($meetingForm, 'keputusan'); ?> 
            </div>  

            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    jQuery(function($) {
        var note = $('#note');
        function updateNote() {
            $.ajax({
                url: "<?php echo $this->createUrl('data&idAgenda=' . $agenda->id) ?>",
                dataType: 'json',
                cache: false,
                success: function(data) {
                    var out = "";
                    $(data).each(function() {
                        out = this.catatan;
                    });
                    note.html(out);
                }
            });
        }
        var decision = $('#nextTarget');
        function updateDecision() {
            $.ajax({
                url: "<?php echo $this->createUrl('data&idAgenda=' . $agenda->id) ?>",
                dataType: 'json',
                cache: false,
                success: function(data) {
                    var out = "";

                    $(data).each(function() {
                        if (this.keputusan === null) {
                            var keputusan = "";
                        }
                        else {
                            var keputusan = this.keputusan + "\n";
                        }
                        if (this.deadline === null) {
                            var deadline = "";
                        }
                        else {
                            var deadline = this.deadline;

                            while (deadline.search("#") > 0) {
                                deadline = deadline.replace("#", "\n");
                            }
                        }

                        out = keputusan + "" + deadline;
                    });
                    decision.html(out);
                }
            });
        }

        updateNote();
        updateDecision();

        setInterval(function() {
            updateNote();
        }, 1000);
        setInterval(function() {
            updateDecision();
        }, 1000);
    });
</script>