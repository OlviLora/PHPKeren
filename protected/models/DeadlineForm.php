<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DeadlineForm
 *
 * @author Yohannes S P
 */
class DeadlineForm extends CFormModel {
    
    // attributes   
    static $currentAgenda_id;

    //core
    public $penanggungjawab;
    public $deadline;
    public $tgl_deadline;
    
    
    // applied rules for validation 
    public function rules() {
        return array(
            // safe attributes are assignedable in all scenario types 
            array('penanggungjawab,deadline,tgl_deadline', 'safe'),
            array('penanggungjawab,deadline,tgl_deadline', 'required'),
        );
    }

    // sets attribute labels for view labeling 
    public function attributeLabels() {
        return array(
            'penanggungjawab' => 'Penanggungjawab',
            'deadline' => 'Deadline',
            'tgl_deadline' => 'Tanggal Deadline',
        );
    }
}

?>