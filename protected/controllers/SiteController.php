<?php

class SiteController extends CController
{
	public function actionIndex()
	{
		$doctors = false;
		
		if (!empty($_GET['specialization']) && !empty($_GET['date_search']))
		{
			$doctors = Doctor::model()->with('appointments')->findAllByAttributes(array('id_specialization' => $_GET['specialization']));
			
			$timestr = strtotime($_GET['date_search']);
			$date = date('Y-m-d', $timestr);
			$appointments = Appointment::model()->findAll('date >= :date1 AND date <= :date2', array(':date1' => "{$date} 00:00:00", ':date2' => "{$date} 23:59:59"));
			
			$app = array();
			foreach ($appointments as $appointment)
			{
				$app[$appointment->id_doctor][] = $appointment->date;
			}
			
			foreach ($doctors as $key => $doctor)
			{
				$intervals = array();
				$wb = $doctor->work_begin * 60;
				$we = $doctor->work_end * 60;
				
				for ($i = $wb; $i <= $we - $doctor->interval; $i = $i + $doctor->interval)
				{
					$intervals[$i]['time'] = date('H:i', $i*60-(3*60*60));
					$intervals[$i]['free'] = true;
					if (is_array($app[$doctor->id]))
					{
						foreach ($app[$doctor->id] as $appointment)
						{
							$timestr = strtotime($appointment);
							$current_h = date('H', $timestr);
							$current_i = date('i', $timestr);
							$hm = $current_h * 60 + $current_i;
							
							if ($hm >= $i && $hm < $i + $doctor->interval) $intervals[$i]['free'] = false;
						}
					}
				}
				$doctors[$key]->appointment = $intervals;
			}
		}
		
		$this->render('index', array(
			'doctors' => $doctors,
		));
	}
	
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
}