<?php include('header.php'); ?>

				<div class="header">
					<h1>User Management</h1>
				</div>
				
				<div class="menu-menu">
					<button type="button" class="btn btn-primary">
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
						<th>Assigned School</th>
					</tr>
					<tr>
						<td><input type="checkbox"></td>
						<td><a href="#">Edit</a> | <a href="#">Delete</a></td>
						<td>dsimon</td>
						<td>Simon</td>
						<td>Dayanara</td>
						<td>admin</td>
						<td>All</td>
					</tr>
					<tr>
						<td><input type="checkbox"></td>
						<td><a href="#">Edit</a> | <a href="#">Delete</a></td>
						<td>rjcruz</td>
						<td>Cruz</td>
						<td>Raymond</td>
						<td>admin</td>
						<td>All</td>
					</tr>
					<tr>
						<td><input type="checkbox"></td>
						<td><a href="#">Edit</a> | <a href="#">Delete</a></td>
						<td>pperalta</td>
						<td>Peralta</td>
						<td>Philip</td>
						<td>guest</td>
						<td>Ateneo</td>
					</tr>
					<tr>
						<td><input type="checkbox"></td>
						<td><a href="#">Edit</a> | <a href="#">Delete</a></td>
						<td>guygongco</td>
						<td>Uygongco</td>
						<td>Glu</td>
						<td>guest</td>
						<td>Ateneo</td>
					</tr>
				</table>
			</div>
	

<?php include('footer.php'); ?>