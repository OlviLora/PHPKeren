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
        <div class="fonts" style="text-align: center; font-size: 25px; border-bottom: 1px solid rgba(101, 196, 101, 0.3);"><?php echo $date ?></div>
    </h1>
    <br/>
    <div style="float: right;">
    <div class='fonts' style="font-size: 13px; text-align: left; margin-right: 30px; border: 1px solid rgba(101, 196, 101, 0.1); padding: 10px;">
            Chairperson : <?php echo $rapat->chairperson0->nama ?><br>
            Notulen : <?php echo $rapat->notulen0->nama ?>
    <br><br>
            Waktu : <?php echo $rapat->waktu_tanggal ?><br>
            Tempat : <?php echo $rapat->tempat ?><br>
            Jenis Rapat : <?php echo $rapat->jenisRapat->deskripsi ?>
    </div>
        </div>
    
    <br/>
    
    <div class="fonts" style="padding-top: 120px; margin-left: 50px; margin-right: 50px;">
    <!-- Absen -->
    <b style="font-size: 20px;">Daftar Nama Anggota yang Hadir : </b>
    <ol>
        <?php foreach ($daftarAbsen as $absen) { ?>
        <div style="border-bottom: 1px solid rgba(101, 196, 101, 0.3); margin-right: 550px; padding-left: 25px;">
        <li style="font-size: 14px;">
                <?php echo $absen->idAccount->idMember->nama ?>
            </li>
            </div>
        <?php } ?>
    </ol>

    <br/>
    <!-- Agenda -->
    <b style="font-size: 20px;">Agenda yang dibahas : </b>
    <ol>
        <?php foreach ($agendas as $agenda) { ?>
        <div style="-webkit-box-shadow:  0px 2px 5px -2px rgba(101, 196, 101, 0.5);
    box-shadow:  0px 2px 5px -2px rgba(101, 196, 101, 0.5);  margin-bottom: 10px; padding: 10px 10px 10px 25px;">
        <li>
                <div style="font-size: 16px;"><?php echo $agenda->topik . ' [' . $agenda->idAgenda->status . ']' ?></div>
                <div style="font-size: 14px; float: left; padding-right: 10px;">PIC<br>Catatan<br>Keputusan
                </div>
                <div style="font-size: 14px; padding-right: 10px;">
                    <?php echo ": ".$agenda->idAgenda->pIC->nama ?><br>
                    <?php echo ": ".$agenda->catatan ?><br>
                    <?php echo ": ".$agenda->keputusan ?>
                </div>
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
            </div>
        <?php } ?>
    </ol>
    </div>
</page>

<!-- -webkit-box-shadow:  0px 2px 5px -2px rgba(101, 196, 101, 0.5);
    box-shadow:  0px 2px 5px -2px rgba(101, 196, 101, 0.5); -->