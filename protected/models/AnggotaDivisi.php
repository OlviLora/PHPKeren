<?php

/**
 * This is the model class for table "anggota_divisi".
 *
 * The followings are the available columns in table 'anggota_divisi':
 * @property integer $id
 * @property string $divisi
 * @property integer $id_account
 * @property string $status
 *
 * The followings are the available model relations:
 * @property Account $idAccount
 * @property Divisi $divisi0
 */
class AnggotaDivisi extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AnggotaDivisi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'anggota_divisi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('divisi, id_account, status', 'required'),
			array('id_account', 'numerical', 'integerOnly'=>true),
			array('divisi', 'length', 'max'=>30),
			array('status', 'length', 'max'=>6),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, divisi, id_account, status', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idAccount' => array(self::BELONGS_TO, 'Account', 'id_account'),
			'divisi0' => array(self::BELONGS_TO, 'Divisi', 'divisi'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'divisi' => 'Divisi',
			'id_account' => 'Id Account',
			'status' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('divisi',$this->divisi,true);
		$criteria->compare('id_account',$this->id_account);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}