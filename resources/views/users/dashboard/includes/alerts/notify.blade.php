@if(session()->has('success'))
	<script type="text/javascript">
		window.onload = function(){
			notif({
				msg : '{{ session()->get('success') }}',
				type : "success"
			});
		}
	</script>
@elseif(session()->has('error'))
	<div class="alert alert-danger text-center" id="msg">
		{{ session()->get('error') }}
	</div>
@endif

			
