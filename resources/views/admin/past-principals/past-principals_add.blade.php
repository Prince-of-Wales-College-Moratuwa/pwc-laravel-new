<?php

$page = 'past-principals';

include '../database_connection.php';

include '../functions.php';



if(!is_admin_login())
{
	header('location:../admin_login.php');
	exit();
} 

include 'admin-header.php';

?>

<script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>



<div class="container-fluid py-4" style="min-height: 700px;">
	<h1>Add Past Principal</h1>


	<ol class="breadcrumb mt-4 mb-4 bg-light p-2 border">
		<li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
		<li class="breadcrumb-item active">Add Past Principal</li>
	</ol>



	<div class="card mb-4">
		<div class="card-header">
        Add Past Principal
		</div>
		<div class="card-body">
			<form action="" method="POST" enctype="multipart/form-data">

				<div class="row">
					<div class="col-md-6">
						<div class="mb-3">
							<label class="form-label">Name</label>
							<input type="text" name="name" id="name" class="form-control" />
						</div>
					</div>
			

						<div class="col-md-6">
							<div class="mb-3">
								<label class="form-label">Years</label>
								<input type="text" name="years" id="years" class="form-control"
									oninput="this.value = this.value.replace(/\s+/g, '-').toLowerCase()" />
							</div>
						</div>

					</div>

					

					<div class="col-md-6">
						<div class="mb-3">
							<label class="form-label">Featured Image</label>
							<input type="file" class="form-control" name="img" placeholder="Featured Image" id="img"
								onchange="checkFileType()">
							<p id="fileMessage"></p>
						</div>
					</div>

					<script>
						function checkFileType() {
							const fileInput = document.getElementById('img');
							const fileMessage = document.getElementById('fileMessage');

							const allowedExtensions = /(\.webp)$/i;

							if (!allowedExtensions.test(fileInput.value)) {
								fileInput.value = '';
								fileMessage.innerHTML = 'Please upload .webp file.';
							} else {
								fileMessage.innerHTML = '';
							}
						}
					</script>

				</div>
				<div class="mt-4 mb-3 text-center">
					<input type="submit" name="add_past-principal" class="btn btn-success" value="Publish" />
				</div>
			</form>
		</div>
	</div>


	<?php

if (isset($_POST["add_past-principal"])) {
    $formdata = array();

    $formdata['name'] = trim($_POST["name"]);
    $formdata['years'] = trim($_POST["years"]);


    $data = array(
        ':name' => $formdata['name'],
        ':years' => $formdata['years'],
    );

    $file = $_FILES['img']['name'];
    $file_loc = $_FILES['img']['tmp_name'];
    $folder = "../content/img/img-history/former-principals/";
    $new_file_name = strtolower($file);
    $final_file = str_replace(' ', '-', $new_file_name);

    if (move_uploaded_file($file_loc, $folder . $final_file)) {
        $image = $final_file;
        $query = "
        INSERT INTO about_past_principals 
        (name, years, img) 
        VALUES (:name, :years, :img)
        ";

        $data[':img'] = $image; 
        $statement = $connect->prepare($query);

        $statement->execute($data);

		echo '<script>window.open("../history/former-principals", "_blank");</script>';
        exit();

    }
}

?>



	<?php
include 'admin-footer.php';
?>