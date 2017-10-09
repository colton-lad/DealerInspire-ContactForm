<?php
echo form_open('/page/process_contact_form', ['id' => 'contact-form', 'class' => 'form-horizontal']);

?>
<div class="row">
	<div class="col-sm-12 col-lg-6">
		<div class="form-group">
<?php
echo form_label('First Name:', 'first_name', ['class' => 'sr-only']);
$data = [
	'class' => 'form-control',
	'id' => 'first_name',
	'name' => 'first_name',
	'value' => set_value('first_name'),
	'placeholder' => 'First Name'
];
?>
			<div class="col-lg-12">
<?php
echo form_input($data);
?>
			</div>
		</div>
	</div>

	<div class="col-sm-12 col-lg-6">
		<div class="form-group">
<?php
echo form_label('Last Name:', 'last_name', ['class' => 'sr-only']);
$data = [
	'class' => 'form-control',
	'id' => 'last_name',
	'name' => 'last_name',
	'value' => set_value('last_name'),
	'placeholder' => 'Last Name'
];
?>
			<div class="col-lg-12">
<?php
echo form_input($data);
?>
			</div>
		</div>
	</div>

	<div class="col-sm-12 col-md-6">
		<div class="form-group">
<?php
echo form_label('Email:', 'email', ['class' => 'sr-only']);
$data = [
	'class' => 'form-control',
	'id' => 'email',
	'name' => 'email',
	'value' => set_value('email'),
	'placeholder' => 'Email'
];
?>
			<div class="col-lg-12">
<?php
echo form_input($data);
?>
			</div>
		</div>
	</div>

	<div class="col-sm-12 col-md-6">
		<div class="form-group">
<?php
echo form_label('Phone:', 'phone', ['class' => 'sr-only']);
$data = [
	'class' => 'form-control',
	'id' => 'phone',
	'name' => 'phone',
	'value' => set_value('phone'),
	'placeholder' => 'Phone Number'
];
?>
			<div class="col-lg-12">
<?php
echo form_input($data);
?>
			</div>
		</div>
	</div>

	<div class="col-xs-12">
		<div class="form-group">
<?php
echo form_label('Comment:', 'comment', ['class' => 'sr-only']);
$data = [
	'class' => 'form-control',
	'id' => 'comment',
	'name' => 'comment',
	'value' => set_value('comment'),
	'placeholder' => 'Tell Smiley something!'
];
?>
			<div class="col-lg-12">
<?php
echo form_textarea($data);
?>
			</div>
		</div>
	</div>
</div>

<?php
$data = [
	'class' => 'btn btn-primary',
	'id' => 'submit',
	'name' => 'submit',
	'value' => 'Let Smiley Hear You!'
];
echo form_submit($data);

echo form_close();
?>
