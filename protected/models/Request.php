<?php

/**
 * This is the model class for table "request".
 *
 * The followings are the available columns in table 'request':
 * @property integer $id
 * @property integer $id_account
 * @property string $topik
 * @property string $deskripsi
 * @property string $status
 * @property string $jenis_rapat
 *
 * The followings are the available model relations:
 * @property Account $idAccount
 * @property KategoriRapat $jenisRapat
 */
class Request extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Request the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'request';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_account, topik, jenis_rapat', 'required'),
            array('id_account', 'numerical', 'integerOnly' => true),
            array('topik', 'length', 'max' => 50),
            array('deskripsi', 'length', 'max' => 100),
            array('status', 'length', 'max' => 8),
            array('jenis_rapat', 'length', 'max' => 5),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, id_account, topik, deskripsi, status, jenis_rapat', 'safe', 'on' => 'search'),
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
            'jenisRapat' => array(self::BELONGS_TO, 'KategoriRapat', 'jenis_rapat'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'id_account' => 'Id Account',
            'topik' => 'Topik',
            'deskripsi' => 'Deskripsi',
            'status' => 'Status',
            'jenis_rapat' => 'Jenis Rapat',
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
        $criteria->compare('id_account', $this->id_account);
        $criteria->compare('topik', $this->topik, true);
        $criteria->compare('deskripsi', $this->deskripsi, true);
        $criteria->compare('status', $this->status, true);
        $criteria->compare('jenis_rapat', $this->jenis_rapat, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
