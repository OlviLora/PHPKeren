<?php

/**
 * This is the model class for table "divisi_kategorirapat".
 *
 * The followings are the available columns in table 'divisi_kategorirapat':
 * @property integer $id
 * @property string $nama_divisi
 * @property string $jenis_rapat
 *
 * The followings are the available model relations:
 * @property KategoriRapat $jenisRapat
 * @property Divisi $namaDivisi
 */
class DivisiKategorirapat extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DivisiKategorirapat the static model class
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
		return 'divisi_kategorirapat';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nama_divisi', 'length', 'max'=>30),
			array('jenis_rapat', 'length', 'max'=>5),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nama_divisi, jenis_rapat', 'safe', 'on'=>'search'),
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
			'jenisRapat' => array(self::BELONGS_TO, 'KategoriRapat', 'jenis_rapat'),
			'namaDivisi' => array(self::BELONGS_TO, 'Divisi', 'nama_divisi'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nama_divisi' => 'Nama Divisi',
			'jenis_rapat' => 'Jenis Rapat',
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
		$criteria->compare('nama_divisi',$this->nama_divisi,true);
		$criteria->compare('jenis_rapat',$this->jenis_rapat,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}