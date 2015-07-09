<?php

/**
 * This is the model class for table "absen_anggota".
 *
 * The followings are the available columns in table 'absen_anggota':
 * @property integer $id
 * @property integer $id_rapat
 * @property integer $id_account
 * @property string $inisial_jabatan
 * @property string $status
 * @property string $keterangan
 *
 * The followings are the available model relations:
 * @property Account $idAccount
 * @property Rapat $idRapat
 * @property Jabatan $inisialJabatan
 */
class AbsenAnggota extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return AbsenAnggota the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'kehadiran_anggota';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_rapat, id_account, inisial_jabatan, status', 'required'),
            array('id_rapat, id_account', 'numerical', 'integerOnly' => true),
            array('inisial_jabatan', 'length', 'max' => 3),
            array('status', 'length', 'max' => 12),
            array('keterangan', 'length', 'max' => 20),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, id_rapat, id_account, inisial_jabatan, status, keterangan', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idAccount' => array(self::BELONGS_TO, 'Account', 'id_account'),
            'idRapat' => array(self::BELONGS_TO, 'Rapat', 'id_rapat'),
            'inisialJabatan' => array(self::BELONGS_TO, 'Jabatan', 'inisial_jabatan'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'id_rapat' => 'Id Rapat',
            'id_account' => 'Id Account',
            'inisial_jabatan' => 'Inisial Jabatan',
            'status' => 'Status',
            'keterangan' => 'Keterangan',
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
        $criteria->compare('id_rapat', $this->id_rapat);
        $criteria->compare('id_account', $this->id_account);
        $criteria->compare('inisial_jabatan', $this->inisial_jabatan, true);
        $criteria->compare('status', $this->status, true);
        $criteria->compare('keterangan', $this->keterangan, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
