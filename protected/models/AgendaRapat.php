<?php

/**
 * This is the model class for table "agenda_rapat".
 *
 * The followings are the available columns in table 'agenda_rapat':
 * @property integer $id
 * @property integer $id_rapat
 * @property integer $id_agenda
 *
 * The followings are the available model relations:
 * @property Rapat $idRapat
 * @property Agenda $idAgenda
 */
class AgendaRapat extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return AgendaRapat the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'agenda_rapat';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_rapat, id_agenda', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, id_rapat, id_agenda', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idRapat' => array(self::BELONGS_TO, 'Rapat', 'id_rapat'),
            'idAgenda' => array(self::BELONGS_TO, 'Agenda', 'id_agenda'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'id_rapat' => 'Id Rapat',
            'id_agenda' => 'Id Agenda',
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
        $criteria->compare('id_agenda', $this->id_agenda);

        return new CActiveDataProvider($this, array(
                    'criteria' => $criteria,
                ));
    }

}