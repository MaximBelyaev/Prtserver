<?php

/**
 * This is the model class for table "versions".
 *
 * The followings are the available columns in table 'versions':
 * @property integer $v_id
 * @property string $name
 * @property string $dir
 * @property string $status
 *
 * The followings are the available model relations:
 * @property VersionsDownloads[] $versionsDownloads
 */
class Versions extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'versions';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, status', 'required'),
			array('name', 'length', 'max'=>31),
			array('db_update, db_revert', 'length', 'max' => 8191),
			array('name', 'version'),
			array('status', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('v_id, name, db_update, db_revert, dir, status, date', 'safe', 'on'=>'search'),
		);
	}

	public function now($attribute, $params)
	{
		$this->$attribute = time();
	}

	public function version($attribute, $params)
	{
		if (preg_match("/[а-яА-Я]/", $this->$attribute)) {
			$this->addError($attribute, 'You cannot use cyrillic symbols');
		}
		$this->$attribute = trim(trim($this->$attribute),'.');
	}

	public function afterValidate()
	{
		parent::afterValidate();
		$statuses = Yii::app()->controller->getStatusesByLang('en');
		$this->dir = $statuses[$this->status] . '/' . $this->name;
		return true;
	}

	public function beforeSave()
	{
		parent::beforeSave();

		if ($this->isNewRecord) {
			$this->date = time();
		}
		return true;
	}

	public function afterSave()
	{
		if ( !is_dir($_SERVER['DOCUMENT_ROOT'] . $this->dir) ) {
			mkdir($_SERVER['DOCUMENT_ROOT'] . $this->dir, 0777, true);
		}
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'versionsDownloads' => array(self::HAS_MANY, 'VersionsDownloads', 'v_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'v_id' => 'ID',
			'name' => 'Имя',
			'dir' => 'Путь к файлам',
			'db_update' => 'БД обновление',
			'db_revert' => 'БД отмена', 
			'status' => 'Статус',
			'date' => 'Дата',
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

		$criteria->compare('v_id',$this->v_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('dir',$this->dir,true);
		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Versions the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function getStatusNameByLang($lang)
	{
		$statuses = Yii::app()->controller->getStatusesByLang($lang);
		return $statuses[$this->status];
	}

}
