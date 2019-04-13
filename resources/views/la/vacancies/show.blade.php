@extends('la.layouts.app')

@section('htmlheader_title')
	Vacancy View
@endsection


@section('main-content')
<div id="page-content" class="profile2">
	

	<ul data-toggle="ajax-tab" class="nav nav-tabs profile" role="tablist">
		<li class=""><a href="{{ url(config('laraadmin.adminRoute') . '/vacancies') }}" data-toggle="tooltip" data-placement="right" title="Back to Vacancies"><i class="fa fa-chevron-left"></i></a></li>
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
						@la_display($module, 'title_ny')
						@la_display($module, 'title_az')
						@la_display($module, 'title_ru')
						@la_display($module, 'mainduties_en')
						@la_display($module, 'mainduties_ka')
						@la_display($module, 'mainduties_ny')
						@la_display($module, 'mainduties_az')
						@la_display($module, 'mainduties_ru')
						@la_display($module, 'experiencedesired_en')
						@la_display($module, 'experiencedesired_ka')
						@la_display($module, 'experiencedesired_ny')
						@la_display($module, 'experiencedesired_az')
						@la_display($module, 'experiencedesired_ru')
						@la_display($module, 'requirements_en')
						@la_display($module, 'requirements_ka')
						@la_display($module, 'requirements_ny')
						@la_display($module, 'requirements_az')
						@la_display($module, 'requirements_ru')
						@la_display($module, 'deadline')
					</div>
				</div>
			</div>
		</div>
		
		
	</div>
	</div>
	</div>
</div>
@endsection
