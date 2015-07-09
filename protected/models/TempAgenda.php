<?php

/**
 * This is the model class for table "temp_agenda".
 *
 * The followings are the available columns in table 'temp_agenda':
 * @property integer $id
 * @property integer $id_agenda
 * @property string $tanggal
 * @property string $topik
 * @property string $catatan
 * @property string $keputusan
 * @property string $deadline
 *
 * The followings are the available model relations:
 * @property Agenda $idAgenda
 */
class TempAgenda extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return TempAgenda the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'temp_agenda';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_agenda', 'required'),
            array('id_agenda', 'numerical', 'integerOnly' => true),
            array('topik', 'length', 'max' => 50),
            array('catatan, keputusan, deadline', 'length', 'max' => 1000),
            array('tanggal', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, id_agenda, tanggal, topik, catatan, keputusan, deadline', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idAgenda' => array(self::BELONGS_TO, 'Agenda', 'id_agenda'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'id_agenda' => 'Id Agenda',
            'tanggal' => 'Tanggal',
            'topik' => 'Topik',
            'catatan' => 'Catatan',
            'keputusan' => 'Keputusan',
            'deadline' => 'Deadline',
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
        $criteria->compare('id_agenda', $this->id_agenda);
        $criteria->compare('tanggal', $this->tanggal, true);
        $criteria->compare('topik', $this->topik, true);
        $criteria->compare('catatan', $this->catatan, true);
        $criteria->compare('keputusan', $this->keputusan, true);
        $criteria->compare('deadline', $this->deadline, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
