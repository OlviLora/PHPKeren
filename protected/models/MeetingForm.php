<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MeetingForm
 *
 * @author Yohannes S P
 */
class MeetingForm extends CFormModel {
    //put your code here
    // attributes
    //core
    public $catatan;
    public $keputusan;
    public $status;
    
    //addition
    public $topik;
    public $deskripsi;
    
    // applied rules for validation 
    public function rules() {
        return array(
            // safe attributes are assignedable in all scenario types 
            array('catatan, keputusan, status, topik, deskripsi', 'safe'),
            array('catatan, keputusan, status, topik, deskripsi', 'required'),
        );
    }

    // sets attribute labels for view labeling 
    public function attributeLabels() {
        return array(
            'catatan' => 'Catatan',
            'keputusan' => 'Keputusan',
            'status' => 'Status',
            'topik' => 'Topik',
            'deskripsi' => 'Desdxkripsi'
        );
    }
}

?>