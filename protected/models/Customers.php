<?php

/**
 * This is the model class for table "customers".
 *
 * The followings are the available columns in table 'customers':
 * @property integer $c_id
 * @property string $name
 * @property string $email
 * @property string $skype
 * @property string $vk
 * @property string $fb
 * @property integer $reg_date
 * @property string $license
 * @property string $status
 * @property string $comment
 *
 * The followings are the available model relations:
 * @property VersionsDownloads[] $versionsDownloads
 */
class Customers extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'customers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, email, skype, vk, fb, reg_date, license, status, comment', 'required'),
			array('reg_date', 'numerical', 'integerOnly'=>true),
			array('name, email, skype, vk, fb', 'length', 'max'=>255),
			array('license, status', 'length', 'max'=>16),
			array('comment', 'length', 'max'=>4095),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('c_id, name, email, skype, vk, fb, reg_date, license, status, comment', 'safe', 'on'=>'search'),
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
			'versionsDownloads' => array(self::HAS_MANY, 'VersionsDownloads', 'c_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'c_id' => 'C',
			'name' => 'Name',
			'email' => 'Email',
			'skype' => 'Skype',
			'vk' => 'Vk',
			'fb' => 'Fb',
			'reg_date' => 'Reg Date',
			'license' => 'License',
			'status' => 'Status',
			'comment' => 'Comment',
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

		$criteria->compare('c_id',$this->c_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('skype',$this->skype,true);
		$criteria->compare('vk',$this->vk,true);
		$criteria->compare('fb',$this->fb,true);
		$criteria->compare('reg_date',$this->reg_date);
		$criteria->compare('license',$this->license,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('comment',$this->comment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Customers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
