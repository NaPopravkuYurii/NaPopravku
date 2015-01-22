<div class="doctors">

	<?php $form = $this->beginWidget('CActiveForm', array(
		'id'=>'search-form',
		'enableClientValidation'=>false,
		'clientOptions'=>array(
			'validateOnSubmit'=>false,
		),
	));?>
	
	<label>
		<span>Выберите специальность врача:</span><br>
		<select>
			<?php foreach ($specializations as $specialization):?>
				<option value="<?php echo $specialization->id?>"><?php echo $specialization->name?></option>
			<?php endforeach;?>
		</select>
	</label>
	
	<label>
		<span>Выберите дату:</span><br>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
		   'name' => 'date_start',
		   'model' => $specializations,
		   'attribute' => 'date_start',
		   'language' => 'ru',
		   'options' => array(
		       'showAnim' => 'fold',
		   ),
		   'htmlOptions' => array(
		       'class' => 'doctor_date'
		   ),
		));?>
	</label>
	
	<?php $this->endWidget(); ?>
</div>