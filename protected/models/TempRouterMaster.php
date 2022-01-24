<?php

/**
 * This is the model class for table "temp_router_master".
 *
 * The followings are the available columns in table 'temp_router_master':
 * @property integer $id
 * @property string $sapid
 * @property string $hostname
 * @property string $loopback
 * @property string $mac_id
 * @property integer $success_status
 */
class TempRouterMaster extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'temp_router_master';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// array('sapid, hostname, loopback, mac_id', 'required'),
			array('success_status', 'numerical', 'integerOnly'=>true),
			array('hostname', 'ext.UniqueAttributesValidator','with'=>'loopback,mac_id'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, sapid, hostname, loopback, mac_id, success_status,fail_validation_reason', 'safe', 'on'=>'search'),
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
			'success_status' => 'Success Status',
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
		$criteria->compare('success_status',$this->success_status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TempRouterMaster the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	

}
