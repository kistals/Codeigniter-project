<?php

$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'maxlength'	=> 80,
	'size'	=> 30,
	'value' => set_value('login')
);

?>

<fieldset><legend accesskey="D" tabindex="1">Forgotten Password</legend>
<?php echo form_open($this->uri->uri_string()); ?>

<?php echo $this->dx_auth->get_auth_error(); ?>

<dl>
	<dt><?php echo form_label('Enter your Username or Email Address', $login['id']);?></dt>
	<dd>
        <?php echo form_error($login['name'], '<div class="bg-danger" style="padding: 15px; margin-bottom: 15px;">', '</div>'); ?>
		<?php echo form_input($login, '', 'class="form-control" style="width: 70%; float:left; margin-right: 2%;"'); ?>
		<?php echo form_submit('reset', 'Reset Now', 'class="btn" style="width: 28%; float:left;"'); ?>
	</dd>
</dl>

<?php echo form_close()?>
</fieldset>
<div class="clear margin-2"></div>