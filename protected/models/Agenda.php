<?php

/**
 * This is the model class for table "agenda".
 *
 * The followings are the available columns in table 'agenda':
 * @property integer $id
 * @property integer $PIC
 * @property string $topik
 * @property string $deskripsi
 * @property string $status
 * @property string $jenis_rapat
 * @property string $hasil
 *
 * The followings are the available model relations:
 * @property KategoriRapat $jenisRapat
 * @property StatusAgenda $status0
 * @property Member $pIC
 * @property AgendaRapat[] $agendaRapats
 * @property TempAgenda[] $tempAgendas
 */
class Agenda extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Agenda the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'agenda';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('PIC, topik, deskripsi', 'required'),
            array('PIC', 'numerical', 'integerOnly' => true),
            array('topik', 'length', 'max' => 50),
            array('deskripsi, hasil', 'length', 'max' => 100),
            array('status', 'length', 'max' => 3),
            array('jenis_rapat', 'length', 'max' => 5),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, PIC, topik, deskripsi, status, jenis_rapat, hasil', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'jenisRapat' => array(self::BELONGS_TO, 'KategoriRapat', 'jenis_rapat'),
            'status0' => array(self::BELONGS_TO, 'StatusAgenda', 'status'),
            'pIC' => array(self::BELONGS_TO, 'Member', 'PIC'),
            'agendaRapats' => array(self::HAS_MANY, 'AgendaRapat', 'id_agenda'),
            'tempAgendas' => array(self::HAS_MANY, 'TempAgenda', 'id_agenda'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'PIC' => 'Pic',
            'topik' => 'Topik',
            'deskripsi' => 'Deskripsi',
            'status' => 'Status',
            'jenis_rapat' => 'Jenis Rapat',
            'hasil' => 'Hasil',
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
        $criteria->compare('PIC', $this->PIC);
        $criteria->compare('topik', $this->topik, true);
        $criteria->compare('deskripsi', $this->deskripsi, true);
        $criteria->compare('status', $this->status, true);
        $criteria->compare('jenis_rapat', $this->jenis_rapat, true);
        $criteria->compare('hasil', $this->hasil, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
