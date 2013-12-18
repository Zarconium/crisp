<?php include('header.php'); ?>

<div id="dialog-form" class="hidden_lightbox_container">
	<div class="hidden_lightbox_content">
		<div class="header">
			<h2>Add New User</h2>
		</div>
		<?php
			echo form_open('/usermanagement/add_user');

			echo form_label('Username', 'new_username');
			echo form_input('new_username', '', 'class="form-control"');

			echo form_label('First Name', 'new_first_name');
			echo form_input('new_first_name', '', 'class="form-control"');

			echo form_label('Last Name', 'new_last_name');
			echo form_input('new_last_name', '', 'class="form-control"');

			echo form_label('Password', 'new_password');
			echo form_password('new_password', '', 'class="form-control"');

			$input_type_options = array('admin' => 'Administrator', 'encoder' => 'Encoder', 'guest' => 'Guest');
			echo form_label('Account Type', 'new_type');
			echo form_dropdown('new_type', $input_type_options, 'guest', 'class="form-control"');

			echo '<div class="btn-group">';
			echo form_submit('new_button_submit', 'Add User', 'class="btn btn-primary"');
			echo form_reset('new_button_reset', 'Reset Fields', 'class="btn btn-warning"');
			echo form_submit('new_button_cancel', 'Cancel', 'class="btn btn-danger" onclick="hideLightbox();"');
			echo '</div>';

			echo form_close();
		?>
	</div>
</div>

<div class="col-md-10">
	<div class="area">
		<div class="header">
			<h1>User Management</h1>
		</div>
		<div class="menu-menu">
			<button type="button" class="btn btn-primary" id="add" onclick="showLightbox();">
				Add
			</button>
			<button type="button" class="btn btn-danger">
				Delete
			</button>
			<button type="button" class="btn btn-info">
				Print List
			</button>
		</div>
		<table class="table table-area">
			<tr>
				<th>Check</th>
				<th>Action</th>
				<th>Username</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Privileges</th>
			</tr>
			<?php foreach ($users as $row): ?>
			<tr>
				<td><input type="checkbox"></td>
				<td><?php echo anchor('usermanagement/edit_user/' . $row->id, 'Edit'); ?> | <?php echo anchor('usermanagement/delete_user/' . $row->id, 'Delete'); ?></td>
				<td><?php echo $row->username; ?></td>
				<td><?php echo $row->first_name; ?></td>
				<td><?php echo $row->last_name; ?></td>
				<td><?php echo $row->type; ?></td>
			</tr>
		<?php endforeach; ?>
	</tr>
</table>
</div>
</div>

<script type="text/javascript">
function showLightbox()
{
	document.getElementById('dialog-form').style.visibility = "visible";
}
function hideLightbox()
{
	document.getElementById('dialog-form').style.visibility = "hidden";
}
</script>

<?php include('footer.php'); ?>