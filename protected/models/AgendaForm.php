<?php

/**
 * Description of AgendaForm
 *
 * @author Sitta E P S
 */
class AgendaForm extends CFormModel {
    // attributes 
    // for table agenda
    public $topik;
    public $deskripsi;
    
    // for table agenda_PIC
    public $pic;

    // applied rules for validation 
    public function rules() {
        return array(
            array('topik, deskripsi', 'required'),
            array('topik', 'length', 'max' => 50),
            array('deskripsi, hasil', 'length', 'max' => 100),
            array('status', 'length', 'max' => 3),
            array('PIC', 'numerical', 'integerOnly' => true),
        );
    }

    // sets attribute labels for view labeling 
    public function attributeLabels() {
        return array(
            'topik' => 'Topik',
            'deskripsi' => 'Deskripsi',
            'PIC' => 'PIC',
        );
    }
}
