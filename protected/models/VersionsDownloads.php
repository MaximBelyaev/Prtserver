<?php

/**
 * This is the model class for table "versions_downloads".
 *
 * The followings are the available columns in table 'versions_downloads':
 * @property integer $vd_id
 * @property integer $v_id
 * @property integer $c_id
 * @property integer $time
 * @property integer $ip
 *
 * The followings are the available model relations:
 * @property Customers $c
 * @property Versions $v
 */
class VersionsDownloads extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'versions_downloads';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('v_id, c_id, time, ip', 'required'),
			array('v_id, c_id, time, ip', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('vd_id, v_id, c_id, time, ip', 'safe', 'on'=>'search'),
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
			'c' => array(self::BELONGS_TO, 'Customers', 'c_id'),
			'v' => array(self::BELONGS_TO, 'Versions', 'v_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'vd_id' => 'Vd',
			'v_id' => 'V',
			'c_id' => 'C',
			'time' => 'Time',
			'ip' => 'Ip',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('vd_id',$this->vd_id);
		$criteria->compare('v_id',$this->v_id);
		$criteria->compare('c_id',$this->c_id);
		$criteria->compare('time',$this->time);
		$criteria->compare('ip',$this->ip);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return VersionsDownloads the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
