<?php include('header.php'); ?>

<div class="modal" id="add_user_form" tabindex="-1" role="dialog" aria-labelledby="add_user_form_label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="add_user_form_label">Add New User</h4>
			</div>
			<div class="modal-body">
				<?php
					echo form_open('/usermanagement/add_user');

					echo '<div class="form-group">';
					echo form_label('Username', 'new_username');
					echo form_input('new_username', '', 'class="form-control"');
					echo form_error('new_username', '<div class="text-danger">', '</div>');
					echo '</div>';

					echo '<div class="form-group">';
					echo form_label('First Name', 'new_first_name');
					echo form_input('new_first_name', '', 'class="form-control"');
					echo form_error('new_first_name', '<div class="text-danger">', '</div>');
					echo '</div>';

					echo '<div class="form-group">';
					echo form_label('Last Name', 'new_last_name');
					echo form_input('new_last_name', '', 'class="form-control"');
					echo form_error('new_last_name', '<div class="text-danger">', '</div>');
					echo '</div>';

					echo '<div class="form-group">';
					echo form_label('Password', 'new_password');
					echo form_password('new_password', '', 'class="form-control"');
					echo form_error('new_password', '<div class="text-danger">', '</div>');
					echo '</div>';

					echo '<div class="form-group">';
					$input_type_options = array('admin' => 'Administrator', 'encoder' => 'Encoder', 'guest' => 'Guest');
					echo form_label('Account Type', 'new_type');
					echo form_dropdown('new_type', $input_type_options, 'guest', 'class="form-control"');
					echo form_error('new_type', '<div class="text-danger">', '</div>');
					echo '</div>';
				?>
			</div>
			<div class="modal-footer">
				<?php
					echo '<div class="btn-group">';
					echo form_submit('new_button_submit', 'Add User', 'class="btn btn-primary"');
					echo form_reset('new_button_reset', 'Reset Fields', 'class="btn btn-warning"');
					echo form_submit('new_button_cancel', 'Cancel', 'class="btn btn-danger"');
					echo '</div>';

					echo form_close();
				?>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="edit_user_form" tabindex="-1" role="dialog" aria-labelledby="edit_user_form_label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="edit_user_form_label">Edit Existing User</h4>
			</div>
			<div class="modal-body">
				<?php
					echo form_open('/usermanagement/edit_user');

					foreach ($user_to_edit as $u)
					{
						echo form_hidden('edit_id', $u->id);

						echo '<div class="form-group">';
						echo form_label('Username', 'edit_username');
						echo form_input('edit_username', $u->username, 'class="form-control"');
						echo form_error('edit_username', '<div class="text-danger">', '</div>');
						echo '</div>';

						echo '<div class="form-group">';
						echo form_label('First Name', 'edit_first_name');
						echo form_input('edit_first_name', $u->first_name, 'class="form-control"');
						echo form_error('edit_first_name', '<div class="text-danger">', '</div>');
						echo '</div>';

						echo '<div class="form-group">';
						echo form_label('Last Name', 'edit_last_name');
						echo form_input('edit_last_name', $u->last_name, 'class="form-control"');
						echo form_error('edit_last_name', '<div class="text-danger">', '</div>');
						echo '</div>';

						echo '<div class="form-group">';
						echo form_label('Password', 'edit_password');
						echo form_password('edit_password', '', 'class="form-control"');
						echo form_error('edit_password', '<div class="text-danger">', '</div>');
						echo '</div>';

						echo '<div class="form-group">';
						$input_type_options = array('admin' => 'Administrator', 'encoder' => 'Encoder', 'guest' => 'Guest');
						echo form_label('Account Type', 'edit_type');
						echo form_dropdown('edit_type', $input_type_options, $u->type, 'class="form-control"');
						echo form_error('edit_type', '<div class="text-danger">', '</div>');
						echo '</div>';
					}
				?>
			</div>
			<div class="modal-footer">
				<?php
					echo '<div class="btn-group">';
					echo form_submit('edit_button_submit', 'Edit User', 'class="btn btn-primary"');
					echo form_reset('edit_button_reset', 'Reset Fields', 'class="btn btn-warning"');
					echo form_submit('edit_button_cancel', 'Cancel', 'class="btn btn-danger"');
					echo '</div>';

					echo form_close();
				?>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="delete_user_dialog" tabindex="-1" role="dialog" aria-labelledby="delete_user_form_label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="delete_user_form_label">Delete User</h4>
			</div>
			<div class="modal-body">
				<?php
					$u_id = 0;
					$u_username = "";

					if(isset($user_to_delete))
					{
						foreach($user_to_delete as $user)
						{
							$u_id = $user->id;
							$u_username = $user->username;
						}
					}
				?>
				Delete <?php echo $u_username; ?>?
			</div>
			<div class="modal-footer">
				<a href="<?php echo base_url('usermanagement/delete_user/' . $u_id); ?>"><button type="button" class="btn btn-primary">OK</button></a>
        		<a href="<?php echo base_url('usermanagement'); ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="delete_multiple_users_dialog" tabindex="-1" role="dialog" aria-labelledby="delete_multiple_users_dialog_label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="delete_multiple_users_dialog_label">Delete Users</h4>
			</div>
			<div class="modal-body">
				<?php
					echo form_open('usermanagement/delete_multiple');

					if(isset($user_ids_to_delete))
					{
						echo 'The following users will be deleted:';
						echo '<ul>';
						foreach($user_ids_to_delete as $user)
						{
							foreach ($user as $u)
							{
								echo form_hidden('users_to_delete[]', $u->id);
							 	echo '<li>' . $u->username . '</li>';
							}
						}
						echo '</ul>';
						echo 'Continue?';
					}
				?>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary" name="delete_multiple_users_button_submit" value="delete_multiple_users_button_submit">OK</button>
        		<a href="<?php echo base_url('usermanagement'); ?>"><button type="button" class="btn btn-danger">Cancel</button></a>
        		<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>

<div class="col-md-10">
	<div class="area">
		<div class="header">
			<h1>User Management</h1>
		</div>
		<?php echo form_open('/usermanagement/delete_multiple'); ?>
		<div class="menu-menu">
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_user_form" data-keyboard="false">
				Add
			</button>
			<button type="submit" class="btn btn-danger" name="delete_multiple_button_submit" value="delete_multiple_button_submit">
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
				<td><?php echo form_checkbox('user_ids_to_delete[]', $row->id); ?></td>
				<td><?php echo anchor('usermanagement/edit/' . $row->id, 'Edit'); ?> | <?php echo anchor('usermanagement/delete/' . $row->id, 'Delete'); ?></td>
				<td><?php echo $row->username; ?></td>
				<td><?php echo $row->first_name; ?></td>
				<td><?php echo $row->last_name; ?></td>
				<td><?php echo $row->type; ?></td>
			</tr>
			<?php endforeach; ?>
		</table>
		<?php echo form_close(); ?>
	</div>
</div>
<?php
	if(validation_errors() || isset($user_to_edit))
	{
		if(isset($errant_form))
		{
			if($errant_form == 'add_user')
			{
				echo '<script type="text/javascript">
				window.onload = function() { $(\'#add_user_form\').modal({show: true, keyboard: false}); }
				</script>';
			}
			elseif ($errant_form == 'edit_user')
			{
				echo '<script type="text/javascript">
				window.onload = function() { $(\'#edit_user_form\').modal({show: true, keyboard: false}); }
				</script>';
			}
		}
		elseif (isset($user_to_edit))
		{
			echo '<script type="text/javascript">
			window.onload = function() { $(\'#edit_user_form\').modal({show: true, keyboard: false}); }
			</script>';
		}
	}

	if(isset($user_to_delete))
	{
		echo '<script type="text/javascript">
			window.onload = function() { $(\'#delete_user_dialog\').modal({show: true, keyboard: false}); }
			</script>';
	}

	if(isset($user_ids_to_delete))
	{
		echo '<script type="text/javascript">
			window.onload = function() { $(\'#delete_multiple_users_dialog\').modal({show: true, keyboard: false}); }
			</script>';
	}
?>

<?php include('footer.php'); ?>