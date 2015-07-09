<?php

/**
 * This is the model class for table "rapat".
 *
 * The followings are the available columns in table 'rapat':
 * @property integer $id
 * @property string $waktu_tanggal
 * @property string $tempat
 * @property string $jenis_rapat
 * @property integer $chairperson
 * @property integer $notulen
 * @property string $grup_rapat
 *
 * The followings are the available model relations:
 * @property AbsenAnggota[] $absenAnggotas
 * @property AgendaRapat[] $agendaRapats
 * @property GrupRapat $grupRapat
 * @property Member $chairperson0
 * @property KategoriRapat $jenisRapat
 * @property Member $notulen0
 */
class Rapat extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Rapat the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'rapat';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('waktu_tanggal, tempat, jenis_rapat, grup_rapat', 'required'),
            array('chairperson, notulen', 'numerical', 'integerOnly' => true),
            array('tempat', 'length', 'max' => 20),
            array('jenis_rapat, grup_rapat', 'length', 'max' => 15),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, waktu_tanggal, tempat, jenis_rapat, chairperson, notulen, grup_rapat', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'absenAnggotas' => array(self::HAS_MANY, 'AbsenAnggota', 'id_rapat'),
            'agendaRapats' => array(self::HAS_MANY, 'AgendaRapat', 'id_rapat'),
            'grupRapat' => array(self::BELONGS_TO, 'GrupRapat', 'grup_rapat'),
            'chairperson0' => array(self::BELONGS_TO, 'Member', 'chairperson'),
            'jenisRapat' => array(self::BELONGS_TO, 'KategoriRapat', 'jenis_rapat'),
            'notulen0' => array(self::BELONGS_TO, 'Member', 'notulen'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'waktu_tanggal' => 'Waktu Tanggal',
            'tempat' => 'Tempat',
            'jenis_rapat' => 'Jenis Rapat',
            'chairperson' => 'Chairperson',
            'notulen' => 'Notulen',
            'grup_rapat' => 'Grup Rapat',
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
        $criteria->compare('waktu_tanggal', $this->waktu_tanggal, true);
        $criteria->compare('tempat', $this->tempat, true);
        $criteria->compare('jenis_rapat', $this->jenis_rapat, true);
        $criteria->compare('chairperson', $this->chairperson);
        $criteria->compare('notulen', $this->notulen);
        $criteria->compare('grup_rapat', $this->grup_rapat, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
