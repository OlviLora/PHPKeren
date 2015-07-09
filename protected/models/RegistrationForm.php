<?php

/**
 * Description of RegistrationForm
 *
 * @author Sitta E P S
 */
class RegistrationForm extends CFormModel {

    // attributes 
    // for table members
    public $NIDN;
    public $inisial;
    public $nama;
    public $email;
    public $telepon;
    
    // for table accounts
    public $username;
    public $password;
    public $repassword;

    // applied rules for validation 
    public function rules() {
        return array(
            // safe attributes are assignedable in all scenario types 
            array('NIDN, inisial, nama, email, telepon, username, password, repassword', 'safe'),
            array('NIDN, inisial, nama, email, username, password, repassword', 'required'),
            array('NIDN', 'length', 'min' => 10,'max' => 10),
            array('inisial', 'length', 'min' => 3, 'max' => 3),
            array('nama', 'length', 'max' => 30),
            array('email', 'email'),
            array('username', 'length', 'max' => 20),
            array('password', 'compare', 'compareAttribute' => 'repassword'),
        );
    }

    // sets attribute labels for view labeling 
    public function attributeLabels() {
        return array(
            'NIDN' => 'NIDN',
            'nama' => 'Nama',
            'inisial' => 'Inisial',
            'email' => 'E-mail',
            'telepon' => 'Telepon',
            'username' => 'Username',
            'password' => 'Password',
            'repassword' => 'Re-type password',
        );
    }

}

?>
