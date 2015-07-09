<?php

/**
 * This is the model class for table "member".
 *
 * The followings are the available columns in table 'member':
 * @property integer $id
 * @property string $NIDN
 * @property string $inisial
 * @property string $nama
 * @property string $email
 * @property string $telepon
 *
 * The followings are the available model relations:
 * @property Account[] $accounts
 */
class Member extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Member the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'member';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('NIDN, inisial, nama, email', 'required'),
            array('NIDN', 'length', 'max' => 10),
            array('inisial', 'length', 'max' => 3),
            array('nama, email', 'length', 'max' => 30),
            array('telepon', 'length', 'max' => 12),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, NIDN, inisial, nama, email, telepon', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'accounts' => array(self::HAS_MANY, 'Account', 'id_member'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'NIDN' => 'Nidn',
            'inisial' => 'Inisial',
            'nama' => 'Nama',
            'email' => 'Email',
            'telepon' => 'Telepon',
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
        $criteria->compare('NIDN', $this->NIDN, true);
        $criteria->compare('inisial', $this->inisial, true);
        $criteria->compare('nama', $this->nama, true);
        $criteria->compare('email', $this->email, true);
        $criteria->compare('telepon', $this->telepon, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
