<?php

/**
 * This is the model class for table "grup_rapat".
 *
 * The followings are the available columns in table 'grup_rapat':
 * @property string $inisial
 * @property string $deskripsi
 * @property string $milis
 *
 * The followings are the available model relations:
 * @property Rapat[] $rapats
 */
class GrupRapat extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return GrupRapat the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'grup_rapat';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('inisial, milis', 'required'),
            array('inisial', 'length', 'max' => 15),
            array('deskripsi', 'length', 'max' => 50),
            array('milis', 'length', 'max' => 30),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('inisial, deskripsi, milis', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'rapats' => array(self::HAS_MANY, 'Rapat', 'grup_rapat'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'inisial' => 'Inisial',
            'deskripsi' => 'Deskripsi',
            'milis' => 'Milis',
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
        $criteria->compare('milis', $this->milis, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}
