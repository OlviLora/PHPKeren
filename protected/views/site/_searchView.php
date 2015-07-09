<?php
/* @var $this AgendaController */
/* @var $data Agenda */
?>

<div class="searchR">
    <div class="searchResult">
        <?php
        $tempAgenda = TempAgenda::model()->findByAttributes(array(
            'id_agenda' => $data->id
        ));

        if ($tempAgenda) {
            $tamp = $tempAgenda->deadline;
            while ($tamp != null) {
                $i = 0;
                $content = '';
                while ($i < 3) {
                    $pos = strpos($tamp, '#');
                    $temp = substr($tamp, 0, $pos);
                    $tamp = substr($tamp, $pos + 1, strlen($tamp) - $pos + 1);

                    $content .= $temp . ' ';
                    $i++;
                }
            }
        }

        $this->widget('bootstrap.widgets.TbDetailView', array(
            'data' => $data,
            'attributes' => array(
                'id',
                array(
                    // the field name to be shown on the table header 
                    'name' => 'PIC',
                    // $data is an alias that refers to a single row data 
                    'value' => $data->pIC->nama,
                    // disable the searchbox for this field 
                    'filter' => false
                ),
                'topik',
                'deskripsi',
                'status',
                array(
                    // the field name to be shown on the table header 
                    'name' => 'Deadline',
                    // $data is an alias that refers to a single row data 
                    'value' => $tempAgenda ? (str_word_count($tempAgenda->deadline,0, '#')!=0 ? $content : 'belum dibahas') : 'belum dibahas',
                    // disable the searchbox for this field 
                    'filter' => false
                ),
            ),
        ));
        ?>

    </div>
</div>