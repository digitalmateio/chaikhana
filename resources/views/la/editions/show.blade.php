@extends('la.layouts.app')

@section('htmlheader_title')
	Edition View
@endsection


@section('main-content')
<div id="page-content" class="profile2">
	

	<ul data-toggle="ajax-tab" class="nav nav-tabs profile" role="tablist">
		<li class=""><a href="{{ url(config('laraadmin.adminRoute') . '/editions') }}" data-toggle="tooltip" data-placement="right" title="Back to Editions"><i class="fa fa-chevron-left"></i></a></li>
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
						@la_display($module, 'name_en')
						@la_display($module, 'name_ka')
						@la_display($module, 'name_hy')
						@la_display($module, 'name_az')
						@la_display($module, 'name_ru')
						@la_display($module, 'edition_en')
						@la_display($module, 'edition_ka')
						@la_display($module, 'edition_hy')
						@la_display($module, 'edition_az')
						@la_display($module, 'edition_ru')
						@la_display($module, 'description_en')
						@la_display($module, 'description_ka')
						@la_display($module, 'description_hy')
						@la_display($module, 'description_az')
						@la_display($module, 'description_ru')
						@la_display($module, 'permalink_en')
						@la_display($module, 'permalink_ka')
						@la_display($module, 'permalink_hy')
						@la_display($module, 'permalink_az')
						@la_display($module, 'permalink_ru')
						@la_display($module, 'stories_count')
					</div>
				</div>
			</div>
		</div>
		
		
	</div>
	</div>
	</div>
</div>
@endsection
