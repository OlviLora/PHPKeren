<div class="row">
    <h3>Agenda</h3>
    <!-- Previous Minutes -->
    <b>Previous Minutes</b><br>
    <?php
    if ($prevMinutes) {
        foreach ($prevMinutes as $item) {
            echo "$item->topik<br>";
            //print_r($item);
        }
    } else
        echo 'tidak ada Previous Minutes untuk rapat jenis ini';
    ?>

    <!-- Agenda -->
    <br><b>Daftar Agenda</b><br>
    <table>
        <tr>
            <td>
                <?php $this->drawAgendaListBox('a', $undiscussedAgendas, true) ?>
            </td>
            <td width="10"></td>
            <td>
                <?php $this->drawAgendaListBox('b', null, true, 'destination[]') ?>
            </td>
        </tr>
        <tr>
            <td align="right">
                <input class="button1" type="button" value="Add" />
            </td>
            <td width="10"></td>
            <td align="right">
                <input class="button2" type="button" value="Remove" />
            </td>
        </tr>
    </table>

    <!-- script -->
    <?php
    $js_addListBox = 'function byValue(a, b) {
            return a.value > b.value ? 1 : -1;
        };

        function rearrangeList(list) {
            $(list).find("option").sort(byValue).appendTo(list);
        }

        $(function () {
            $(".button1").click(function () {
                $(".a > option:selected").each(function () {
                    $(this).remove().appendTo(".b");
                    rearrangeList(".b");
                });
            });

            $(".button2").click(function () {
                $(".b > option:selected").each(function () {
                    $(this).remove().appendTo(".a");
                    rearrangeList(".a");
                });
            });
        });';

    Yii::app()->clientScript->registerScript('addListBox', $js_addListBox, CClientScript::POS_READY);
    ?>
</div>