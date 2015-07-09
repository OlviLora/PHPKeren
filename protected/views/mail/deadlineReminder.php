<?php
/* @var $rapat Rapat */
/* @var $agendas TempAgenda[] */
?>

Waktu : <?php echo $rapat->waktu_tanggal ?></br>
Tempat : <?php echo $rapat->tempat ?></br>
Jenis Rapat : <?php echo $rapat->jenisRapat->deskripsi ?></br>

Agenda : </br>
<?php
foreach ($agendas as $agenda) {
    if ($agenda->deadline) {
        ?>
        - <?php echo $agenda->topik ?></br>
        deadline : </br>
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

                echo $temp
                ?><br/>
                <?php
                $i++;
            }
        }
        ?>
        <br/>
        <?php
    }
}
?>
        
<?php
$content = "Waktu : $rapat->waktu_tanggal </br>";
$content .= "Tempat : $rapat->tempat </br>";
$content .= "Jenis Rapat : ".$rapat->jenisRapat->deskripsi." </br>";

$content .= "Agenda : </br>";

foreach ($agendas as $agenda) {
    if ($agenda->deadline) {
        $content .= "- $agenda->topik </br>";
        $content .= "deadline : </br>";
        
        $tamp = $agenda->deadline;

        while ($tamp != null) {
            $i = 0;
            $content .= "* ";
            
            while ($i < 3) {
                $pos = strpos($tamp, '#');
                $temp = substr($tamp, 0, $pos);
                $tamp = substr($tamp, $pos + 1, strlen($tamp) - $pos + 1);

                $content .= $temp;
                $content .= "<br/>";
                
                $i++;
            }
        }
        
        $content .= "<br/>";
        
    }
}
//echo $content;

?>