<!DOCTYPE html>
<html lang="en">

@section('htmlheader')
	@include('la.layouts.partials.htmlheader')
@show

<body class="{{ LAConfigs::getByKey('skin') }} {{ LAConfigs::getByKey('layout') }} @if(LAConfigs::getByKey('layout') == 'sidebar-mini') sidebar-collapse @endif" bsurl="{{ url('') }}" adminRoute="{{ config('laraadmin.adminRoute') }}">
<div class="wrapper">

	@include('la.layouts.partials.mainheader')

	@if(LAConfigs::getByKey('layout') != 'layout-top-nav')
		@include('la.layouts.partials.sidebar')
	@endif

	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		@if(LAConfigs::getByKey('layout') == 'layout-top-nav') <div class="container"> @endif
		@if(!isset($no_header))
			@include('la.layouts.partials.contentheader')
		@endif
		
		<!-- Main content -->
		<section class="content {{ $no_padding or '' }}">
			<!-- Your Page Content Here -->
			@yield('main-content')
		</section><!-- /.content -->

		@if(LAConfigs::getByKey('layout') == 'layout-top-nav') </div> @endif
	</div><!-- /.content-wrapper -->

	@include('la.layouts.partials.controlsidebar')

	@include('la.layouts.partials.footer')

</div><!-- ./wrapper -->

@include('la.layouts.partials.file_manager')

@section('scripts')
	@include('la.layouts.partials.scripts')
@show
<script src="{{ url('js/tinymce/tinymce.min.js')}}"></script>

<script>
 var editor_config = {
			 path_absolute : "{{ url('/') }}/",
			 selector: "textarea",
			 plugins: [
					 "advlist autolink lists link image charmap print preview hr anchor pagebreak",
					 "searchreplace wordcount visualblocks visualchars code fullscreen",
					 "insertdatetime media nonbreaking save table contextmenu directionality",
					 "emoticons template paste textcolor colorpicker textpattern"
			 ],
			 toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
			 relative_urls: false,
			 file_browser_callback : function(field_name, url, type, win) {
					 var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
					 var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

					 var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
					 if (type == 'image') {
							 cmsURL = cmsURL + "&type=Images";
					 } else {
							 cmsURL = cmsURL + "&type=Files";
					 }

					 tinyMCE.activeEditor.windowManager.open({
							 file : cmsURL,
							 title : 'Filemanager',
							 width : x * 0.8,
							 height : y * 0.8,
							 resizable : "yes",
							 close_previous : "no"
					 });
			 }
	 };

	
 tinymce.init(editor_config );
</script>
</body>
</html>
