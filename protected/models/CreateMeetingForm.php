<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CreateMeetingForm
 *
 * @author Sitta E P S
 */
class CreateMeetingForm extends CFormModel {
    // attributes 
    // for table rapat
    public $waktu_tanggal;
    public $tempat;
    public $jenis_rapat;
    public $chairperson;
    public $notulen;
    public $grup_rapat;
    
    // for table agenda_rapat
    public $agenda;

    // applied rules for validation 
    public function rules() {
        return array(
        );
    }

    // sets attribute labels for view labeling 
    public function attributeLabels() {
        return array(
            'waktu_tanggal' => 'Waktu/Tanggal',
            'tempat' => 'Tempat',
            'jenis_rapat' => 'Jenis Rapat',
            'grup_rapat' => 'Peserta Rapat',
            'chairperson' => 'Chairperson',
            'notulen' => 'Notulen',
            'agenda' => 'Agenda'
        );
    }
}

?>
