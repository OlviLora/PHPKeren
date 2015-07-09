<style type="text/css">
    h1 {
        text-align: center;
    }
</style>

<?php
$today = getdate();
//var_dump($today);
$date = $today['mday'] . ' ' . $today['month'] . ' ' . $today['year'];
?>

<page>
    <h1>
        The Minutes of Faculty Meeting<br/>
        <h2><?php echo $date ?></h2>
    </h1>
    <br/>
    <table>
        <tr>
            <td>Chairperson</td>
            <td width='10'></td>
            <td><?php echo $rapat->chairperson0->nama ?></td>
        </tr>
        <tr>
            <td>Notulen</td>
            <td width='10'></td>
            <td><?php echo $rapat->notulen0->nama ?></td>
        </tr>
    </table>
    
    <br/>
    <!-- Absen -->
    <b>Daftar Nama Anggota yang Hadir : </b>
    <ol>
        <?php foreach ($daftarAbsen as $absen) { ?>
            <li>
                <?php echo $absen->idAccount->idMember->nama ?>
            </li>
        <?php } ?>
    </ol>
    
    <table>
        <tr>
            <td>Waktu</td>
            <td width='10'></td>
            <td><?php echo $rapat->waktu_tanggal ?></td>
        </tr>
        <tr>
            <td>Tempat</td>
            <td width='10'></td>
            <td><?php echo $rapat->tempat ?></td>
        </tr>
        <tr>
            <td>Jenis Rapat</td>
            <td width='10'></td>
            <td><?php echo $rapat->jenisRapat->deskripsi ?></td>
        </tr>
    </table>

    <br/>
    <!-- Agenda -->
    <b>Agenda yang dibahas : </b>
    <ol>
        <?php foreach ($agendas as $agenda) { ?>
            <li>
                <?php echo $agenda->topik . ' [' . $agenda->idAgenda->status . ']' ?><br/>
                <table>
                    <tr>
                        <td valign='top'>PIC</td>
                        <td width='10' align='center' valign='top'>:</td>
                        <td width='500'><?php echo $agenda->idAgenda->pIC->nama ?></td>
                    </tr>
                    <tr>
                        <td valign='top'>Catatan</td>
                        <td width='10' align='center' valign='top'>:</td>
                        <td width='500'><?php echo $agenda->catatan ?></td>

                                                    <!--<td colspan='3' width='600'><?php echo $agenda->catatan ?></td>-->
                    </tr>
                    <tr>
                        <td valign='top'>Keputusan</td>
                        <td width='10' align='center' valign='top'>:</td>
                        <td width='500'><?php echo $agenda->keputusan ?></td>
                    </tr>
                </table>
                <br/>
                <!--deadline : <br/>
                <?php
                $tamp = $agenda->deadline;

                while ($tamp != null) {
                    $i = 0;
                    ?>
                                                * 
                    <?php
                    while ($i < 3) {
                        $pos = strpos($tamp, '#');
                        $temp = substr($tamp, 0, $pos);
                        $tamp = substr($tamp, $pos + 1, strlen($tamp) - $pos + 1);

                        echo $temp;
                        ?><br/>
                        <?php
                        $i++;
                    }
                }
                ?>-->
            </li>
        <?php } ?>
    </ol>

    <br/>
    
    <table align='center'>
        <tr>
            <td colspan='2' height='100'></td>
        </tr>
        <tr>
            <td colspan='2' align='center'>Mengetahui,</td>
        </tr>
        <tr>
            <td height='50'></td>
        </tr>
        <tr>
            <td width='300' align='center'>Notulen,</td>
            <td width='300' align='center'>Chairperson,</td>
        </tr>
        <tr>
            <td height='100' align='center'>ttd.</td>
            <td height='100' align='center'>ttd.</td>
        </tr>
        <tr>
            <td align='center'><?php echo $rapat->chairperson0->nama ?></td>
            <td align='center'><?php echo $rapat->notulen0->nama ?></td>
        </tr>
    </table>
</page>