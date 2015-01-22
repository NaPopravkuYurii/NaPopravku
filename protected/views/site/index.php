<?php
$this->pageTitle = 'Запись на приём';
?>

<?php if ($doctors):?>
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
										<td><input type="text" placeholder="Ф.И.О."></td>
									</tr>
									<tr>
										<td>Телефон:</td>
										<td><input type="text" placeholder="Телефон"></td>
									</tr>
									<tr>
										<td colspan="2"><input type="button" value="Записаться на приём"></td>
									</tr>
								</table>
							</div>
						</div>
					<?php endforeach;?>
				</td>
			</tr>
		<?php endforeach;?>
	</table>
<?php endif;?>