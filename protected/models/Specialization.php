<?php
class Specialization extends CActiveRecord
{
	public function tableName()
	{
		return '{{specialization}}';
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
