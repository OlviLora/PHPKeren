<?php
/* @var $meetingForm MeetingForm */
/* @var $agenda Agenda */
?>

<script type="text/javascript">
    function updateNote() {
        var url = "/syp/aplikasirapat/index.php?r=site/updateRealTemp&id=<?php echo $agenda->id; ?>&column=catatan&updated=" + $("#note").val();
        $.ajax({
            url: url
        });
    }
    function updateDecision() {
        var url = "/syp/aplikasirapat/index.php?r=site/updateRealTemp&id=<?php echo $agenda->id; ?>&column=keputusan&updated=" + $("#nextTarget").val();
        $.ajax({
            url: url
        });
    }
</script>

<div class="row-fluid">
    <div class="conts">
        <!-- form --> 
        <div class="form">
            <h1>What are you talking about?</h1>

            <?php
            //echo DeadlineForm::$currentAgenda_id;
            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'notulenForm',
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
                <?php
                if ($tempAgenda) {
                    echo $form->textArea($meetingForm, 'catatan', array('value' => $tempAgenda->catatan, 'rows' => '13', 'id' => 'note', 'onkeyup'=>'updateNote()', 'onchange'=>'updateNote()'));
                }
                else {
                    echo $form->textArea($meetingForm, 'catatan', array('placeholder' => 'let\'s take a note..', 'rows' => '13', 'id' => 'note', 'onkeyup' => 'updateNote()'));
                }
                ?>
                <?php echo $form->error($meetingForm, 'catatan'); ?>
            </div> 

            <div class="row">
                <?php echo $form->labelEx($meetingForm, 'keputusan'); ?>
                <?php
                if ($tempAgenda) {
                    echo $form->textArea($meetingForm, 'keputusan', array('value' => $tempAgenda->keputusan, 'rows' => '6', 'id' => 'nextTarget', 'onkeyup' => 'updateDecision()'));
                }
                else {
                    echo $form->textArea($meetingForm, 'keputusan', array('placeholder' => 'decision here..', 'rows' => '6', 'id' => 'nextTarget', 'onkeyup' => 'updateDecision()'));
                }
                ?>
                <?php echo $form->error($meetingForm, 'keputusan'); ?> 
            </div>  

            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>