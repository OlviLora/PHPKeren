<?php

/**
 * Description of CreateMeetingForm
 *
 * @author Sitta E P S
 */

class CreateAgendaForm extends CFormModel {
    // attributes 
    // for table agenda
    public $topik;
    public $deskripsi;
    
    // for table agenda_pic
    public $pic;

    // applied rules for validation 
    public function rules() {
        return array(
        );
    }

    // sets attribute labels for view labeling 
    public function attributeLabels() {
        return array(
            'topik' => 'Topik',
            'deskripsi' => 'Deskripsi',
            'pic' => 'PIC',
        );
    }
}

?>
