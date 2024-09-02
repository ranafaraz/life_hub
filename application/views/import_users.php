<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Import Users</title>

	<style type="text/css">

		::selection { background-color: #E13300; color: white; }
		::-moz-selection { background-color: #E13300; color: white; }

		body {
			background-color: #fff;
			margin: 40px;
			font: 13px/20px normal Helvetica, Arial, sans-serif;
			color: #4F5155;
		}

		a {
			color: #003399;
			background-color: transparent;
			font-weight: normal;
			text-decoration: none;
		}

		a:hover {
			color: #97310e;
		}

		h1 {
			color: #444;
			background-color: transparent;
			border-bottom: 1px solid #D0D0D0;
			font-size: 19px;
			font-weight: normal;
			margin: 0 0 14px 0;
			padding: 14px 15px 10px 15px;
		}

		code {
			font-family: Consolas, Monaco, Courier New, Courier, monospace;
			font-size: 12px;
			background-color: #f9f9f9;
			border: 1px solid #D0D0D0;
			color: #002166;
			display: block;
			margin: 14px 0 14px 0;
			padding: 12px 10px 12px 10px;
		}

		#body {
			margin: 0 15px 0 15px;
			min-height: 96px;
		}

		p {
			margin: 0 0 10px;
			padding:0;
		}

		p.footer {
			text-align: right;
			font-size: 11px;
			border-top: 1px solid #D0D0D0;
			line-height: 32px;
			padding: 0 10px 0 10px;
			margin: 20px 0 0 0;
		}

		#container {
			margin: 10px;
			border: 1px solid #D0D0D0;
			box-shadow: 0 0 8px #D0D0D0;
		}
	</style>

	<!-- Include jQuery library -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<?php //if($this->session->flashdata('message'))
//{?>
<!--	<div class="box-body">-->
<!--		<div class="alert --><?php //=$this->session->flashdata('class');?><!-- alert-dismissable">-->
<!--			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>-->
<!--			<h4><i class="icon fa fa-ban"></i> Alert!</h4>-->
<!--			--><?php //=$this->session->flashdata('message');?>
<!--		</div>-->
<!--	</div>-->
<?php //}
//?>
<div id="container">
	<div class="col-md-12">
		<div class="col-md-8">
			<h1>Select Excel File to Import
				<a style="float: right" href="<?=('uploads/sample_files/sample_file.xlsx')?>"><i class="fa fa-file"></i> Download Sample File</a>
			</h1>
		</div>
	</div>

	<div id="body">
		<form method="post" action="file_upload" enctype="multipart/form-data">
			<label for="name">Select Excel File: </label>
			<input type="file" name="college_file" id="college_file" required>
			<br>
			<br>
			<input type="submit" value="Import">
		</form>
	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
<?php
if(!empty($userdata)){
?>
<div id="container">
	<div class="col-md-12">
		<div class="col-md-8">
			<h1>Imported Record</h1>
		</div>
	</div>

	<div id="body">
		<table style="width: 100%">
			<thead style="text-align: left">
				<tr>
					<th>Sr #</th>
					<th>UserType</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Username</th>
					<th>Date Of Birth</th>
					<th>Organization Name</th>
					<th>Class</th>
					<th>Budget</th>
					<th>Educator Email</th>
				</tr>
			</thead>
			<tbody>
				<?php
					foreach ($userdata as $ud){
				?>
					<tr>
						<td><?=++$sr?></td>
						<td><?=$ud['user_type']?></td>
						<td><?=$ud['user_firstname']?></td>
						<td><?=$ud['user_lastname']?></td>
						<td><?=$ud['username']?></td>
						<td><?=$ud['dob']?></td>
						<td><?=$ud['org_name']?></td>
						<td><?=$ud['class']?></td>
						<td><?=$ud['budget']?></td>
						<td><?=$ud['educator_mail']?></td>
					</tr>
				<?php }?>
			</tbody>
		</table>
	</div>

</div>
<?php }?>
<script>
	try{
		$(document).ready(function() {
			$('#college_file').on('change', function() {
				var file = this.files[0];
				if (file) {
					var fileName = file.name;
					var fileExtension = fileName.split('.').pop().toLowerCase();
					if (fileExtension !== 'xlsx') {
						alert('Invalid file extension selected. Please select xlsx file.');
						$(this).val(''); // Clear the input
					}
				}
			});
		});
	}catch (e) {
		console.log(e);
	}
</script>

</body>
</html>
