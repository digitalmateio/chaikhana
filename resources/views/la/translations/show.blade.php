@extends('la.layouts.app')

@section('htmlheader_title')
	Translation View
@endsection


@section('main-content')
<div id="page-content" class="profile2">
	

	<ul data-toggle="ajax-tab" class="nav nav-tabs profile" role="tablist">
		<li class=""><a href="{{ url(config('laraadmin.adminRoute') . '/translations') }}" data-toggle="tooltip" data-placement="right" title="Back to Translations"><i class="fa fa-chevron-left"></i></a></li>
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
						@la_display($module, 'block_id')
						@la_display($module, 'story_id')
						@la_display($module, 'theme_id')
						@la_display($module, 'locale')
						@la_display($module, 'media_type')
						@la_display($module, 'audio_path')
						@la_display($module, 'video_path')
						@la_display($module, 'position')
						@la_display($module, 'video_loop')
						@la_display($module, 'name')
						@la_display($module, 'title')
						@la_display($module, 'source')
						@la_display($module, 'permalink_staging')
						@la_display($module, 'media_author')
						@la_display($module, 'edition')
						@la_display($module, 'caption')
						@la_display($module, 'sub_caption')
						@la_display($module, 'content')
						@la_display($module, 'description')
						@la_display($module, 'about')
						@la_display($module, 'text')
						@la_display($module, 'dataset_url')
						@la_display($module, 'dynamic_url')
						@la_display($module, 'dynamic_code')
						@la_display($module, 'url')
						@la_display($module, 'code')
						@la_display($module, 'shortened_url')
						@la_display($module, 'permalink')
					</div>
				</div>
			</div>
		</div>
		
		
	</div>
	</div>
	</div>
</div>
@endsection
