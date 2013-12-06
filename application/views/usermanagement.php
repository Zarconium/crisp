<?php include('header.php'); ?>
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
<script>
$(function()
{
	var name = $( "#user_name" ),
	first_name = $( "#user_first_name" ),
	last_name = $( "#user_last_name" ),
	password = $( "#user_password" ),
	allFields = $( [] ).add( name ).add( first_name ).add( password ),
	tips = $( ".validateTips" );
	function updateTips( t )
	{
		tips
		.text( t )
		.addClass( "ui-state-highlight" );
		setTimeout(function()
		{
			tips.removeClass( "ui-state-highlight", 1500 );
		}, 500 );
	}
	function checkLength( o, n, min, max )
	{
		if ( o.val().length > max || o.val().length < min )
		{
			o.addClass( "ui-state-error" );
			updateTips( "Length of " + n + " must be between " + min + " and " + max + "." );
			return false;
		}
		else
		{
			return true;
		}
	}
	function checkRegexp( o, regexp, n )
	{
		if ( !( regexp.test( o.val() ) ) )
		{
			o.addClass( "ui-state-error" );
			updateTips( n );
			return false;
		}
		else
		{
			return true;
		}
	}
	$( "#dialog-form" ).dialog(
	{
		autoOpen: false,
		height: 430,
		width: 350,
		modal: true,
		buttons:
		{
			"Add User": function()
			{
				var bValid = true;
				allFields.removeClass( "ui-state-error" );
				bValid = bValid && checkLength( name, "username", 3, 16 );
				bValid = bValid && checkLength( first_name, "first name", 6, 80 );
				bValid = bValid && checkLength( last_name, "last name", 6, 80 );
				bValid = bValid && checkLength( password, "password", 5, 16 );
				bValid = bValid && checkRegexp( name, /^[a-z]([0-9a-z_])+$/i, "Username may consist of a-z, 0-9, underscores, begin with a letter." );
				bValid = bValid && checkRegexp( first_name, /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i, "eg. ui@jquery.com" );
				bValid = bValid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allows : a-z 0-9" );
				if ( bValid ) {
					$( "#users tbody" ).append( "<tr>" +
						"<td>" + name.val() + "</td>" +
						"<td>" + first_name.val() + "</td>" +
						"<td>" + password.val() + "</td>" +
						"</tr>" );
					$( this ).dialog( "close" );
				}
			},
			Cancel: function()
			{
				$( this ).dialog( "close" );
			}
		},
		close: function()
		{
			allFields.val( "" ).removeClass( "ui-state-error" );
		}
	});
	$( "#add" )
	.button()
	.click(function()
	{
		$( "#dialog-form" ).dialog( "open" );
	});
});
</script>
<div id="dialog-form" title="Create new user">
	<p class="validateTips">All form fields are required.</p>
	<form role="form">
		<fieldset>
			<label for="name">Username</label>
			<input type="text" name="user_name" id="user_name" class="form-control"><br />
			<label for="name">First Name</label>
			<input type="text" name="user_first_name" id="user_first_name" class="form-control"><br />
			<label for="name">Last Name</label>
			<input type="text" name="user_last_name" id="user_last_name" class="form-control"><br />
			<label for="password">Password</label>
			<input type="password" name="user_password" id="user_password" value="" class="form-control"><br />
		</fieldset>
	</form>
</div>

		<div class="col-md-10">
			<div class="area">
				<div class="header">
					<h1>User Management</h1>
				</div>
				
				<div class="menu-menu">
					<button type="button" class="btn btn-primary" id="add">
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
						<td><?php echo anchor('usermanagement_controller/edit/' . $row->id, 'Edit'); ?> | <?php echo anchor('usermanagement_controller/delete/' . $row->id, 'Delete'); ?></td>
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
	

<?php include('footer.php'); ?>