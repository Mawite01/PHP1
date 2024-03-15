
<!DOCTYPE html>
<html>
<head>
	<title>Json Javascript Multiple Select</title>

	<!-- Bootstrap CDN CSS Link	 -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<!-- Bootstrap-select CDN CSS LINK -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.12/dist/css/bootstrap-select.min.css">

</head>
<body>
	<div class="container">
		<div class="row text-center" style="margin-top:40%;">
			<div class="col-sm-12"><h3>Bootstrap-Select Multiple</h3></div>
            <form action="{{route('roles.store')}}" method="POST">
                @csrf
                <label for="">Name</label>
                <input type="text" name="name" id="">
                <label for="">Permission</label>
				<select class="selectpicker" multiple="multiple" data-live-search="true" data-selected-text-format="value" name="permission[]">
				 @foreach ($permissions as $permission)
                     <option value="{{$permission->name}}">{{$permission->name}}</option>
                 @endforeach
				</select>
                <button type="submit">Save</button>
            </form>
			
		</div>
	</div>

	<!-- Bootstrap CDN JS Link -->
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

	<!-- Bootstrap-select CDN JS LINK -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.12/dist/js/bootstrap-select.min.js"></script>

	<!-- Bootstrap-Select Custom JS LINK-->
	<script type="text/javascript">
		$('.selectpicker').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
			if(e.target.options[clickedIndex].selected){
				console.log(e.target.options[clickedIndex].value);
			}
		});
	</script>
</body>
</html>