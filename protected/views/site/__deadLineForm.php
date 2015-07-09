<?php
/* @var $deadlineForm DeadlineForm */
?>

<div class="conts">
    <div class="form">
        <h1>Anything about deadline?</h1>
        <?php
        //echo DeadlineForm::$currentAgenda_id;
        $form = $this->beginWidget('CActiveForm', array(
            'id' => 'meeting',
            'enableAjaxValidation' => false,
        ));
        ?>
        <div class="row"> 
            <?php echo $form->textField($deadlineForm, 'penanggungjawab', array('placeholder' => 'Who is the PIC?', 'id' => 'penanggungJawab')); ?> 
            <?php echo $form->error($deadlineForm, 'penanggungjawab'); ?> 
        </div> 
        <div class="row"> 
            <?php echo $form->textField($deadlineForm, 'deadline', array('placeholder' => 'What should you do?', 'id' => 'deadline'/* ,'readonly'=>'readonly' */)); ?> 
            <?php echo $form->error($deadlineForm, 'deadline'); ?> 
        </div> 
        <div class="row"> 
            <?php echo $form->textField($deadlineForm, 'tgl_deadline', array('placeholder' => 'When is the deadline?', 'id' => 'tanggalDeadline')); ?> 
            <?php echo $form->error($deadlineForm, 'tgl_deadline'); ?> 
        </div>      
        <div class="row buttons"> 
            <?php
            //echo Chtml::ajaxSubmitButton('Add Deadline', array("reloadDeadlineForm"), array('update' => '#deadline_form'), array('id' => 'ajax'));

            echo Chtml::ajaxSubmitButton('Add Deadline', array("saveDeadline&id=".DeadlineForm::$currentAgenda_id), array(
                'update' => '#deadline_form',
                'success' => 'function() {'
                . 'var penanggungJawab = $("#penanggungJawab").val();
                var deadline = $("#deadline").val();
                var tanggalDeadline = $("#tanggalDeadline").val();

                var text = "Penanggungjawab : " + penanggungJawab + "\n";
                text += "Deadline : " + deadline + "\n";
                text += "Tanggal : " + tanggalDeadline + "\n";
                before = $("#nextTarget").html();

                    if (before) {
                        text = before + "\n" + text;
                    }
                    $("#nextTarget").html(text);'
                . 'alert("data terkirim");'
                //. 'alert("'.DeadlineForm::$currentAgenda_id.'");'
                . '}'
            ));
            ?>
        </div>

        <?php $this->endWidget(); ?>
    </div><!-- form -->
</div>

<script>
    $(document).ready(function() {
        $('#ajax').click(function() {
            var penanggungJawab = $('#penanggungJawab').val();
            var deadline = $('#deadline').val();
            var tanggalDeadline = $('#tanggalDeadline').val();

            var text = "Penanggungjawab : " + penanggungJawab + "\n";
            text += "Deadline : " + deadline + "\n";
            text += "Tanggal : " + tanggalDeadline + "\n";

            $.ajax({
                //type: "POST",
                cache: false,
                //url: "site/deadlineAjax&id=7",
                //data: data, // multiple data sent using ajax
                success: function(html) {
                    $('#ajax').val('data sent');

                    before = $('#nextTarget').html();

                    if (before) {
                        text = before + "\n" + text;
                    }
                    $('#nextTarget').html(text);
                }
            });
            return false;
        });
    });
</script>