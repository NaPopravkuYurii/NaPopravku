<?php

class SiteController extends CController
{
	public function actionAppointment()
	{
		$appointment = new Appointment();
		$appointment->id_doctor = $_REQUEST['doctor'];
		$appointment->name = $_REQUEST['name'];
		$appointment->phone = $_REQUEST['phone'];
		$appointment->date = $_REQUEST['date'];
		
		if ($appointment->save())
		{
			$json = array('message' => 'Вы успешно записались к врачу.', 'id' => $appointment->id);
			echo json_encode($json);
		}
	}
	
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
				$busy_count = 0;
				$free_count = 0;
				$wb = $doctor->work_begin * 60;
				$we = $doctor->work_end * 60;
				
				for ($i = $wb; $i <= $we - $doctor->interval; $i = $i + $doctor->interval)
				{
					$free_count++;
					$intervals[$i]['time'] = date('H:i', $i*60-(3*60*60));
					$intervals[$i]['free'] = true;
					$intervals[$i]['date'] = $date.' '.$intervals[$i]['time'].':00';
					if (is_array($app[$doctor->id]))
					{
						foreach ($app[$doctor->id] as $appointment)
						{
							$timestr = strtotime($appointment);
							$current_h = date('H', $timestr);
							$current_i = date('i', $timestr);
							$hm = $current_h * 60 + $current_i;
							
							if ($hm >= $i && $hm < $i + $doctor->interval)
							{
								$busy_count++;
								$intervals[$i]['free'] = false;
							}
						}
					}
				}
				$free_count = $free_count - $busy_count;
				
				$doctors[$key]->appointment = $intervals;
				$doctors[$key]->free_count = $free_count;
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