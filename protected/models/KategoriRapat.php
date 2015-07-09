<?php

/**
 * This is the model class for table "kategori_rapat".
 *
 * The followings are the available columns in table 'kategori_rapat':
 * @property string $inisial
 * @property string $deskripsi
 *
 * The followings are the available model relations:
 * @property Agenda[] $agendas
 * @property Rapat[] $rapats
 */
class KategoriRapat extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return KategoriRapat the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'kategori_rapat';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('inisial, deskripsi', 'required'),
            array('inisial', 'length', 'max' => 5),
            array('deskripsi', 'length', 'max' => 30),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('inisial, deskripsi', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'agendas' => array(self::HAS_MANY, 'Agenda', 'jenis_rapat'),
            'rapats' => array(self::HAS_MANY, 'Rapat', 'jenis_rapat'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'inisial' => 'Inisial',
            'deskripsi' => 'Deskripsi',
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

        $criteria->compare('inisial', $this->inisial, true);
        $criteria->compare('deskripsi', $this->deskripsi, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
