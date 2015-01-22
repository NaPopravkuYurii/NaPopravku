<?php
class Doctors extends CWidget
{
	public function run()
	{
		$specialisations = Specialization::model()->findAll();
		$this->render('doctors', array(
			'specializations' => $specialisations,
		));
	}
}
?>