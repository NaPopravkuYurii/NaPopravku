<?php
class Doctor extends CActiveRecord
{
	public $appointment;
	public $free_count;
	
	public function tableName()
	{
		return '{{doctor}}';
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function relations()
	{
		return array(
				'appointments' => array(self::HAS_MANY, 'Appointment', 'id_doctor', 'order' => 'date DESC'),
		);
	}
}
