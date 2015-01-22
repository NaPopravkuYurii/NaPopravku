<?php
class Doctor extends CActiveRecord
{
	public function tableName()
	{
		return '{{doctor}}';
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
