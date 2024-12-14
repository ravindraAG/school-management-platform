<!DOCTYPE html>
<html>
<head>
	<title>Online Grading System </title>
	<?php include "views/template/NavBar.php"; ?>
</head>
<body>
	<div class="page-container">
		<div class="left-content">
			<?php include "views/template/header.php"; ?>
			<div class="outter-wp">
				<div class="sub-heard-part">
					<ol class="breadcrumb m-b-0">
						<li><h2 style="margin-top:0px;"><a>Manage Class</a></h2></li>
					</ol>
				</div>
				<div class="graph-visual tables-main">
					<div class="row">
						<div class="col-sm-7">
							<div class="graph" style="padding:10px;">
								<form id="submit_yearlevel" action="crud_function.php" method="post">
									<div class="tables">
										<button type="button" id="del_yearlevel" class="btn btn-danger">Delete</button>
										<input type="hidden" name="del_class" value="1">
										<table class="table table-bordered"> 
											<thead> 
												<tr>
													<th><input type="checkbox" id="checkall"></th>
													<th>Class Name</th> 
													<th>School Year</th> 
													<th>Year Level</th>
													<th></th>
												</tr> 
											</thead>
											<tbody> 
												<?php
												$query = "SELECT * FROM tblclass";
												$result = mysqli_query($con, $query);

												while($row = mysqli_fetch_array($result))
												{
													?>
													<tr> 
														<td width="20"><input type="checkbox" id="record" name="classid[]" value="<?php echo $row['id']; ?>"></td>
														<td><?php echo $row['classname']; ?></td> 
														<!-- load school year based on school year id -->
														<?php 
														$query2 = "SELECT schoolyear FROM tblschoolyear WHERE id = '" . $row['schoolyearid'] . "'";
														$result2 = mysqli_query($con, $query2);
														$schoolyear = "";
														while($rows = mysqli_fetch_array($result2))
														{
															$schoolyear = $rows['schoolyear'];
														}
														?>
														<td><?php echo $schoolyear; ?></td>
														<!-- load yearlevel based on year level id -->
														<?php 
														$query3 = "SELECT yearlevel FROM tblyearlevel WHERE id = '" . $row['yearlevelid'] . "'";
														$result3 = mysqli_query($con, $query3);
														$yearlevel = "";

														while($rows = mysqli_fetch_array($result3))
														{
															$yearlevel = $rows['yearlevel'];
														}
														?>
														<td><?php echo $yearlevel; ?></td> 
														<td width="50"><button type="button" style="margin:0px;padding:8px;" classid="<?php echo $row['id']; ?>" schoolyearid="<?php echo $row['schoolyearid']; ?>" yearlevelid="<?php echo $row['yearlevelid']; ?>" classname="<?php echo $row['classname']; ?>" schoolyear="<?php echo $schoolyear; ?>" yearlevel="<?php echo $yearlevel; ?>" onclick="edit(this)" class="btn btn-success">Edit</button></td> 
													</tr> 
													<?php } ?>
												</tbody> 
											</table>
										</div>
									</form>
								</div>
							</div>

							<div class="col-sm-5">
								<div class="graph">
									<form action="crud_function.php" method="post">
										<div class="form-group">
											<label>Class Name</label>
											<input type="text" class="form-control" name="txtClassName" id="txtClassName" required>
										</div>
										<div class="form-group">
											<label>School Year</label>
											<select class="form-control" style="height:44px;" name="cboSchoolYear" id="cboSchoolYear" required>
												<option></option>
												<?php 
												$query = "SELECT * FROM tblschoolyear";
												$result = mysqli_query($con, $query);

												while($row = mysqli_fetch_array($result))
												{
													?>
													<option><?php echo $row['schoolyear']; ?></option>
													<?php } ?>
												</select>
											</div>
											<div class="form-group">
												<label>Year Level</label>
												<select class="form-control" style="height:44px;" name="cboYearLevel"  id="cboYearLevel" required>
													<option></option>
													<?php 
													$query = "SELECT * FROM tblyearlevel";
													$result = mysqli_query($con, $query);

													while($row = mysqli_fetch_array($result)){
														?>
														<option><?php echo $row['yearlevel']; ?></option>
														<?php } ?>
													</select>
												</div>

												<input type="hidden" name="schoolyearid" id="schoolyearid">
												<input type="hidden" name="yearlevelid" id="yearlevelid">
												<input type="hidden" name="classid" id="classid">

												<button type="submit" name="btnAddClass" id="btnAddClass" onclick="send()" class="btn btn-primary">Add</button>
												<button type="button" id="btn_back" style="display:none;" class="btn btn-default">Back</button>
												<button type="submit" id="btn_edit" style="display:none;" name="edit_class" class="btn btn-success">Update</button>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
						<?php include "views/template/SideBar.php"; ?>
					</div>
                    
					<script>
						$("#del_yearlevel").click(function(){
							var conf = confirm("Are you sure you want to delete the selected class?");
							if(conf == true){
								$("#submit_yearlevel").submit();
							}
						})
						$("#checkall").click(function()
						{
							if ($("#checkall").is(':checked')) {
								$("input#record").prop("checked", true);
							} else {
								$("input#record").prop("checked", false);
							}
						})
						function edit(obj)
						{
							$("#txtClassName").val($(obj).attr("classname"));
							$("#cboSchoolYear").val($(obj).attr("schoolyear"));
							$("#cboYearLevel").val($(obj).attr("yearlevel"));

							$("#classid").val($(obj).attr("classid"));
							$("#schoolyearid").val($(obj).attr("schoolyearid"));
							$("#yearlevelid").val($(obj).attr("yearlevelid"));
							$("#btnAddClass").hide();
							$("#btn_back").show();
							$("#btn_edit").show();
						}
						$("#btn_back").click(function(){
							$("#txtClassName").val("");
							$("#cboSchoolYear").val("");
							$("#cboYearLevel").val("");
							$("#btn_back").hide();
							$("#btn_edit").hide();
							$("#btnAddClass").show();
						})
					</script>
				</body>
				</html>