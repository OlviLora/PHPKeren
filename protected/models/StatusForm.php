<?php

/**
 * Description of AgendaForm
 *
 * @author Sitta E P S
 */
class StatusForm extends CFormModel {
    // attributes 
    // for table agenda
    public $status;

    // applied rules for validation 
    public function rules() {
        return array(
            array('status', 'length', 'max' => 3),
        );
    }

    // sets attribute labels for view labeling 
    public function attributeLabels() {
        return array(
            'status' => 'Status',
        );
    }
}
