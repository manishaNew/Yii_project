<?php

/**
 * This is the model class for table "router_master".
 *
 * The followings are the available columns in table 'router_master':
 * @property integer $id
 * @property string $type
 * @property string $sapid
 * @property string $hostname
 * @property string $loopback
 * @property string $mac_id
 * @property string $created_on
 * @property string $updated_on
 * @property integer $delete_status
 */
class RouterMaster extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'router_master';
	}

	

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array(' sapid, hostname, loopback, mac_id', 'required'),
			array('delete_status', 'numerical', 'integerOnly'=>true),
			array('hostname', 'ext.UniqueAttributesValidator',
			'with'=>'loopback,mac_id'),
			array('sapid', 'length', 'max'=>18),
			array('hostname', 'length', 'max'=>14),
			array('loopback', 'length', 'max'=>20),
			array('mac_id', 'length', 'max'=>17),
			array('loopback', 'ext.IPValidator', 'version' => 'v4'),
			array('updated_on','default',
			'value'=>new CDbExpression('NOW()'),
			'setOnEmpty'=>false,'on'=>'update'),
	  		array('created_on,updated_on','default',
			'value'=>new CDbExpression('NOW()'),
			'setOnEmpty'=>false,'on'=>'insert'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, sapid, hostname, loopback, mac_id, created_on, updated_on, delete_status', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'sapid' => 'Sapid',
			'hostname' => 'Hostname',
			'loopback' => 'Loopback',
			'mac_id' => 'Mac',
			'created_on' => 'Created On',
			'updated_on' => 'Updated On',
			'delete_status' => 'Soft Delete',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('sapid',$this->sapid,true);
		$criteria->compare('hostname',$this->hostname,true);
		$criteria->compare('loopback',$this->loopback,true);
		$criteria->compare('mac_id',$this->mac_id,true);
		$criteria->compare('created_on',$this->created_on,true);
		$criteria->compare('updated_on',$this->updated_on,true);
		$criteria->compare('delete_status',$this->delete_status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RouterMaster the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
}
