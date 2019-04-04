@extends('la.layouts.app')

@section('htmlheader_title')
	Photo shop View
@endsection


@section('main-content')
<div id="page-content" class="profile2">
	

	<ul data-toggle="ajax-tab" class="nav nav-tabs profile" role="tablist">
		<li class=""><a href="{{ url(config('laraadmin.adminRoute') . '/photo_shops') }}" data-toggle="tooltip" data-placement="right" title="Back to Photo shops"><i class="fa fa-chevron-left"></i></a></li>
		<li class="active"><a role="tab" data-toggle="tab" class="active" href="#tab-general-info" data-target="#tab-info"><i class="fa fa-bars"></i> General Info</a></li>
		
	</ul>

	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active fade in" id="tab-info">
			<div class="tab-content">
				<div class="panel infolist">
					<div class="panel-default panel-heading">
						<h4>General Info</h4>
					</div>
					<div class="panel-body">
						@la_display($module, 'title_en')
						@la_display($module, 'title_ka')
						@la_display($module, 'title_az')
						@la_display($module, 'title_ny')
						@la_display($module, 'title_ru')
						@la_display($module, 'description_en')
						@la_display($module, 'description_ka')
						@la_display($module, 'description_az')
						@la_display($module, 'description_ny')
						@la_display($module, 'description_ru')
						@la_display($module, 'image')
						@la_display($module, 'quantity')
						@la_display($module, 'size')
						@la_display($module, 'price')
						@la_display($module, 'print_type')
						@la_display($module, 'latitude')
						@la_display($module, 'longitude')
						@la_display($module, 'tag')
					</div>
				</div>
			</div>
		</div>
		
		
	</div>
	</div>
	</div>
</div>
@endsection
