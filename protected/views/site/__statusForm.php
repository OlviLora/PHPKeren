<div class="row-fluid">
    <div style="padding: 10px;"></div>
    <div class="conts">
        <!-- form --> 
        <div class="form">
            <?php
            $statusForm = new StatusForm;
            //echo $currentAgenda->topik.' '.$currentAgenda->id;

            $form = $this->beginWidget('CActiveForm', array(
                'id' => 'statusForm',
                'enableAjaxValidation' => false,
            ));
            ?>

            <div class="row">
                <?php echo $form->labelEx($statusForm, 'status'); ?>
                <?php echo $form->dropDownList($statusForm, 'status', $this->getAgendaStatus(), ($currentAgenda->status) != 'NEW' ? array('options' => array($currentAgenda->status => array('selected' => true))) : array('empty' => '-Pilih-')); ?>
                <?php echo $form->error($statusForm, 'status'); ?>
            </div>

            <div class="row buttons">
                <?php
                echo Chtml::ajaxSubmitButton('Give Status', array("saveAgenda&id=$currentAgenda->id"), array(
                    'update' => '#agenda_menu',
                    'success' => 'function() {'
                    . 'alert("status agenda telah di-update, silahkan refresh halaman");'
                    . '}'
                ));
                //echo Chtml::ajaxSubmitButton('Give Status', "saveAgenda&id=$currentAgenda->id&idRapat=$rapat->id");
                ?>
            </div>

            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>