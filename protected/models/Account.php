<?php

/**
 * This is the model class for table "account".
 *
 * The followings are the available columns in table 'account':
 * @property integer $id
 * @property integer $id_member
 * @property string $username
 * @property string $password
 *
 * The followings are the available model relations:
 * @property AbsenAnggota[] $absenAnggotas
 * @property Member $idMember
 * @property AgendaPic[] $agendaPics
 * @property Request[] $requests
 */
class Account extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Account the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'account';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('username, password', 'required'),
            array('id_member', 'numerical', 'integerOnly' => true),
            array('username', 'length', 'max' => 20),
            array('password', 'length', 'max' => 64),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, id_member, username, password', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'absenAnggotas' => array(self::HAS_MANY, 'AbsenAnggota', 'id_account'),
            'idMember' => array(self::BELONGS_TO, 'Member', 'id_member'),
            'agendaPics' => array(self::HAS_MANY, 'AgendaPic', 'PIC'),
            'requests' => array(self::HAS_MANY, 'Request', 'id_account'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'id_member' => 'Id Member',
            'username' => 'Username',
            'password' => 'Password',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id);
        $criteria->compare('id_member', $this->id_member);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('password', $this->password, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    
    // overrides the CModel::beforeSave() 
    public function beforeSave() {
        $this->password = Yii::app()->digester->md5($this->password);
        return (parent::beforeSave());
    }

    // to compare this model's password wirh a given password 
    public function comparePassword($_password) {
        return($this->password === Yii::app()->digester->md5($_password));
    }

}
