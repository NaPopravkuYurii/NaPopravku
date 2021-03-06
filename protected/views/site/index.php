<?php
$this->pageTitle = 'Запись на приём';
?>

<?php if ($doctors):?>
	<h2><?php echo htmlspecialchars($_REQUEST['date_search'])?></h2>
	<table class="appointments">
		<tr>
			<th>Имя врача</th>
			<th>Время работы</th>
			<th>Время приёма</th>
			<th>Свобобдных мест на запись</th>
			<th></th>
		</tr>
		<?php foreach ($doctors as $doctor):?>
			<tr>
				<td>
					<a href="javascript: void(0)" class="open-info"><?php echo $doctor->name?></a>
				</td>
				<td>
					<?php echo $doctor->work_begin?>:00 - <?php echo $doctor->work_end?>:00
				</td>
				<td>
					~<?php echo $doctor->interval?> минут
				</td>
				<td>
					<?php echo $doctor->free_count?>
				</td>
				<td>
					<a href="javascript: void(0)" class="open-info">Развернуть</a>
				</td>
			</tr>
			<tr class="info">
				<td class="h" colspan="5">
					<?php foreach ($doctor->appointment as $appointment):?>
						<div class="row_app">
							<b><?php echo $appointment['time']?></b> - 
							<?php echo $appointment['free'] ? '<a class="free" href="javascript: void(0)">Записаться на приём</a>' : '<span class="nonefree">Время записи недоступно</span>'?>
							
							<div class="app_form">
								<table>
									<tr>
										<td>Ф.И.О.:</td>
										<td>
											<input class="a_name" type="text" placeholder="Ф.И.О.">
											<input class="a_doctor" type="hidden" value="<?php echo $doctor->id?>">
											<input class="a_date" type="hidden" value="<?php echo $appointment['date']?>">
										</td>
									</tr>
									<tr>
										<td>Телефон:</td>
										<td><input class="a_phone" type="text" placeholder="Телефон"></td>
									</tr>
									<tr>
										<td colspan="2"><input class="a_send" type="button" value="Записаться на приём"></td>
									</tr>
								</table>
							</div>
						</div>
					<?php endforeach;?>
				</td>
			</tr>
		<?php endforeach;?>
	</table>
<?php else:?>
	Выберите специальность врача и дату.
<?php endif;?>