<!DOCTYPE html>
<html>
<head>
	<title>Yeet</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
</head>
<body>

	<div class="container-fluid">

		<div class="row">

			<div class="col-md-4">
				<label for="firstname">Firstname</label>
				<input type="text" class="form-control" id="firstname"/>
			</div>

			<div class="col-md-4">
				<label for="middlename">Middlename</label>
				<input type="text" class="form-control" id="middlename"/>
			</div>

			<div class="col-md-4">
				<label for="lastname">Lastname</label>
				<input type="text" class="form-control" id="lastname"/>
			</div>

			<div class="col-md-4">
				<label for="phoneNumber">Phone Number</label>
				<input type="number" class="form-control" id="phoneNumber"/>
			</div>

			<div class="col-md-4">
				<label id="">Access Levels</label>
			 	<select name="accessLevels" id="accessLevels" class="form-control"></select>
			</div>

			<div class="col-md-4">
				<label for="save">Save</label>
				<button type="submit" class="btn btn-primary form-control" id="save">Save</button> 
			</div>

		</div>

	</div>

<script
src="https://code.jquery.com/jquery-3.4.1.js"
integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
	
	$(document).ready(function(){
		// alert("ahoy");

		getAccessLevels();

		$(document).on('click', '#save', function(){

			var fname = $('#firstname').val();
			var mname = $('#middlename').val();
			var lname = $('#lastname').val();
			var pnumber = $('#phoneNumber').val();
			var accessLevels = $('#accessLevels').val();

			// alert(fname + " " + mname + " " + lname + " " + pnumber);

			$.ajax({
				url : "{{ url('api/addUser') }}",
				method : "POST",
				data : {
					fname : fname,
					mname : mname,
					lname : lname,
					pnumber : pnumber,
					accessLevels : accessLevels
				},
				error : function(){
					alert("there's something wrong");
				}
			}).done(function(response){
				if(response.success){ // true
					alert('Successfully Added a user');

					$('#firstname').val('');
					$('#middlename').val('');
					$('#lastname').val('');
					$('#phoneNumber').val('');


				}
			});

		});

	});

	function getAccessLevels(){
		$.ajax({
			url : "{{ url('api/Accesslevels') }}",
			method : "get"
		}).done(function(response){
			$.each(response, function (i, k) {
			    $('#accessLevels').append($('<option>', { 
			        value: k.id,
			        text : k.access_name 
			    }));
			});
		});


	}

</script>

</body>
</html>


