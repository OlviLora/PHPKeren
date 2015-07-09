<?php

/**
 * Description of PICForm
 *
 * @author Sitta E P S
 */
class PICForm extends CFormModel {
    // attributes 
    // for table agenda
    public $PIC;
    public $jenis_rapat;

    // applied rules for validation 
    public function rules() {
        return array(
            array('PIC', 'numerical', 'integerOnly' => true),
            array('jenis_rapat', 'length', 'max' => 5),
        );
    }

    // sets attribute labels for view labeling 
    public function attributeLabels() {
        return array(
            'PIC' => 'PIC',
            'jenis_rapat' => 'Jenis Rapat'
        );
    }
}
