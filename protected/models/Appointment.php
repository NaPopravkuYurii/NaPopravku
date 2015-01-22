<?php
class Appointment extends CActiveRecord
{
	public function tableName()
	{
		return '{{appointment}}';
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
