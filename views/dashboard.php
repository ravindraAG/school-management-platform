<!DOCTYPE html>
<html>
<head>
	<title>Dashboard </title>
	<?php include "views/template/Navbar.php"; ?>
</head>
<body>
	<div class="page-container">
		<div class="left-content">
			<?php include "inc/header.php"; ?>
			<div class="outter-wp">
				<div class="sub-heard-part">
					<ol class="breadcrumb m-b-0">
						<li><h2 style="margin-top:0px;"><a>Teacher's Hub</a></h2></li>
					</ol>
				</div>
				<div class="graph-visual tables-main">
					<h3 class="inner-tittle two">My Students </h3>
					<div class="graph">
						<div class="tables">
							<div class="row">
								<div class="col-sm-4">
									<div class="form-group">
										<label>School Year</label>
										<select class="form-control" name="yearlevel">
											<option></option>
											<option>sample</option>
										</select>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label>Grade</label>
										<select class="form-control" name="yearlevel">
											<option></option>
											<option>sample</option>
										</select>
									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">
										<label>Subject</label>
										<select class="form-control" name="yearlevel">
											<option></option>
											<option>sample</option>
										</select>
									</div>
								</div>
							</div>
							<table class="table table-bordered"> 
								<thead> 
									<tr>
										<th>#</th> 
										<th>First Name</th> 
										<th>Middle Name</th> 
										<th>Last Name</th> 
									</tr> 
								</thead>
								<tbody> 
									<tr> 
										<th scope="row">1</th>
										<td>Marco</td> 
										<td>Juan</td> 
										<td>Baldie</td> 
									</tr> 
								</tbody> 
							</table>
						</div>
					</div>
				</div>
			</div>
			<?php include "views/template/SideBar.php"; ?>
		</div>
	</body>
	</html>