<?php
/* @var $this AgendaController */
/* @var $model Agenda */
/* @var $form CActiveForm */
?>

<script type="text/javascript">
    var form_pertanyaanGenerated = 0;
    function tambah_pilihan_jawaban(nomor_pertanyaan) {
        var table_pertanyaan = document.getElementById('tabel_pertanyaan@' + nomor_pertanyaan); //get table pertanyaan sesuai no_pertanyaan
        var row_pilihan = document.createElement('tr'); //create row baru untuk pilihan yang baru

        //set text html untuk row yang baru dicreate
        row_pilihan.innerHTML = "\
                <td><input type='radio' name='pilihan' value='pilihan'/</td>\n\
                <td><input type='text' style='width : 400px;' name='isi_pilihan'/></td>\n";
        table_pertanyaan.appendChild(row_pilihan);

    }

    function tambah_pertanyaan() {
        var no_pertanyaan = (++form_pertanyaanGenerated);
        var area_pertanyaan = document.createElement('div');
        area_pertanyaan.id = 'area_pertanyaan@' + no_pertanyaan;

        area_pertanyaan.innerHTML = "\n\
        <FORM method='POST' action='index.php'>\n\
        <table id='tabel_pertanyaan@" + no_pertanyaan + "'>\n\
        <tr>\n\
               <td colspan='3'>\n\
                    Pertanyaan-" + (no_pertanyaan) + "\
                    <input type='button' value='Tambah Pilihan' onclick='tambah_pilihan_jawaban(" + no_pertanyaan + ")'/>\n\
               </td>\n\
        </tr>\n\
        <tr>\n\
               <td>" + (no_pertanyaan) + ".</td>\n\
                           <td><input type='text' style='width : 450px;' name='pertanyaan'/></td>\n\
                           <td><input type='reset' value='Reset'/></td>\n\
                           <td></td>\n\
        </tr>\n\
        <tr>\n\
               <td><input type='radio' name='pilihan' value='pilihan'/</td>\n\
               <td><input type='text' style='width : 400px;' name='isi_pilihan'/></td>\n\
        </tr>\n\
        </tr>\n\
</table></FORM>";

        document.body.app
        endChild(area_pertanyaan);
    }
</script>

<div class="form">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'agenda-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'topik'); ?>
        <?php echo $form->textField($model, 'topik', array('size' => 50, 'maxlength' => 50, 'style'=>'height:30px;')); ?>
        <?php echo $form->error($model, 'topik'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'deskripsi'); ?>
        <?php echo $form->textField($model, 'deskripsi', array('size' => 60, 'maxlength' => 100, 'style'=>'height:30px;')); ?>
        <?php echo $form->error($model, 'deskripsi'); ?>
    </div>

    <!--<div class="row">
    <?php echo $form->labelEx($model, 'pic[]'); ?>
    <?php echo $form->dropDownList($model, 'pic[]', $this->getMembers(), array('empty' => '-Pilih-')); ?>
    <?php echo $form->error($model, 'pic[]'); ?>
    </div>-->


    <!-- PIC -->
    <br><b>Daftar PIC</b><br>
    <table>
        <tr>
            <td>
                <?php $this->drawPICListBox('x', $this->getMembers(), true) ?>
            </td>
            <td width="10"></td>
            <td>
                <?php $this->drawPICListBox('y', null, true, 'PIC[]') ?>
            </td>
        </tr>
        <tr>
            <td align="right">
                <input class="btn" id="button3" type="button" value="Add" />
            </td>
            <td width="10"></td>
            <td align="right">
                <input class="btn" id="button4" type="button" value="Remove" />
            </td>
        </tr>
    </table>

    <button onclick="tambah_pertanyaan();">Tambah Pertanyaan</button>

    <div class="row buttons">
        <?php echo CHtml::submitButton('Create', array(
            'class'=>'btn',
        )); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->

<!-- script -->
<?php
$js_addPIC = 'function byValue(a, b) {
            return a.value > b.value ? 1 : -1;
        };

        function rearrangeList(list) {
            $(list).find("option").sort(byValue).appendTo(list);
        }

        $(function () {
            $("#button3").click(function () {
                $("#x > option:selected").each(function () {
                    $(this).remove().appendTo("#y");
                    rearrangeList("#y");
                });
            });

            $("#button4").click(function () {
                $("#y > option:selected").each(function () {
                    $(this).remove().appendTo("#x");
                    rearrangeList("#x");
                });
            });
        });';

Yii::app()->clientScript->registerScript('addPIC', $js_addPIC, CClientScript::POS_READY);
?>