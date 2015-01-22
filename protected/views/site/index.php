<?php
$this->pageTitle = 'Запись на приём';
?>

<?php if ($doctors):?>
	<table class="appointments">
		<tr>
			<th>Имя врача</th>
			<th>Время работы</th>
			<th>Свобобдных мест на запись</th>
			<th></th>
		</tr>
		<?php foreach ($doctors as $doctor):?>
			<tr>
				<td>
					<?php echo $doctor->name?>
				</td>
				<td>
					<?php echo $doctor->work_begin?>:00 - <?php echo $doctor->work_end?>:00
				</td>
				<td>
					5
				</td>
				<td>
					<a href="javascript: void(0)" class="open-info">Развернуть</a>
				</td>
			</tr>
			<tr class="info">
				<td colspan="4">
					<b>Время работы:</b> <?php echo $doctor->work_begin?>:00 - <?php echo $doctor->work_end?>:00
					<?php foreach ($doctor->appointment as $appointment):?>
						<div class="row_app">
							<?php echo $appointment['time']?> - 
							<?php echo $appointment['free'] ? '<a class="free" href="#">Записаться на приём</a>' : '<span class="nonefree">Время записи недоступно</span>'?>
						</div>
					<?php endforeach;?>
				</td>
			</tr>
		<?php endforeach;?>
	</table>
<?php endif;?>