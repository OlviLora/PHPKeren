<?php

/* @var $rapat Rapat */
/* @var $agendas TempAgenda[] */

if ($agendas[0]) {
    ob_start();

    echo $this->renderPartial('_reportpage', array(
        'rapat' => $rapat,
        'agendas' => $agendas,
        'daftarAbsen' => $daftarAbsen
    ));
    $content = ob_get_clean();

    Yii::import('application.extensions.tcpdf.HTML2PDF');

    try {
        $html2pdf = new HTML2PDF('P', 'A4', 'en', true, 'UTF-8', array(20, 20, 20, 20));
        // $orientation = 'P', $format = 'A4', $langue='fr', $unicode=true, $encoding='UTF-8', $marges = array(5, 5, 5, 8)

        $html2pdf->setDefaultFont('Arial');
        $html2pdf->writeHTML($content, false);
        $html2pdf->Output('rapat_' . $rapat->waktu_tanggal . '.pdf');
    } catch (HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
}
else {
    echo 'belum ada laporan untuk rapat ini';
}
?>