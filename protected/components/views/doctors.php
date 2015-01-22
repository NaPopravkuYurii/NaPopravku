<div class="doctors">

	<?php $form = $this->beginWidget('CActiveForm', array(
		'id'=>'search-form',
		'method' => 'GET',
	));?>
	
	<label>
		<span>Выберите специальность врача:</span><br>
		<select class="specialization" name="specialization">
			<?php foreach ($specializations as $specialization):?>
				<option value="<?php echo $specialization->id?>" <?php echo $_GET['specialization'] == $specialization->id ? 'selected' : ''?>><?php echo $specialization->name?></option>
			<?php endforeach;?>
		</select>
	</label>
	
	<label>
		<span>Выберите дату:</span><br>
		<?php ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		   'name' => 'date_search',
		   'model' => $specializations,
		   'value' => $_GET['date_search'] ? $_GET['date_search'] : date('d.m.Y', time()),
		   'language' => 'ru',
		   'options' => array(
		       'showAnim' => 'fold',
		   ),
		   'htmlOptions' => array(
		   		'class' => 'date_search',
		   ),
		));?>
	</label>
	
	<input class="show_line" type="submit" value="Показать">
	
	<?php $this->endWidget(); ?>
</div>