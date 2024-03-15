
    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.12/dist/js/bootstrap-select.min.js"></script>

	<!-- Bootstrap-Select Custom JS LINK-->
	<script type="text/javascript">
		$('.selectpicker').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
			if(e.target.options[clickedIndex].selected){
				console.log(e.target.options[clickedIndex].value);
			}
		});
	</script>