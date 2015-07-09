<?php

/**
 * Description of YiiDomPdf
 *
 * @author Sitta Endah Pricilia
 */

require_once dirname(__FILE__).'/dompdf_config.inc.php';
Yii::registerAutoloader('DOMPDF_autoload');

class YiiDomPdf extends CApplicationComponent {
    public $dompdf;
     
    public function init()
    {
        if($this->dompdf===null)
            $this->dompdf= new DOMPDF();
        return $this->dompdf;
    }
     
    public function generate($file, $filename='', $download=false) 
    {
        $this->dompdf->load_html($file);
        $this->dompdf->render();
        $this->dompdf->stream($filename,array('Attachment'=>$download));
    }
}
