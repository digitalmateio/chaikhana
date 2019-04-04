@extends('la.layouts.app')

@section('htmlheader_title')
	Block View
@endsection


@section('main-content')
<div id="page-content" class="profile2">
	

	<ul data-toggle="ajax-tab" class="nav nav-tabs profile" role="tablist">
		<li class=""><a href="{{ url(config('laraadmin.adminRoute') . '/blocks') }}" data-toggle="tooltip" data-placement="right" title="Back to Blocks"><i class="fa fa-chevron-left"></i></a></li>
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
						@la_display($module, 'section_id')
						@la_display($module, 'story_id	')
						@la_display($module, 'asset_type_id')
						@la_display($module, 'position')
						@la_display($module, 'dimension')
						@la_display($module, 'subtype')
						@la_display($module, 'dynamic_width')
						@la_display($module, 'dynamic_height')
						@la_display($module, 'dynamic_render')
						@la_display($module, 'media_type')
						@la_display($module, 'infobox_type')
						@la_display($module, 'caption_align	')
						@la_display($module, 'video_loop')
						@la_display($module, 'url')
						@la_display($module, 'code')
						@la_display($module, 'fullscreen')
						@la_display($module, 'loop')
						@la_display($module, 'info')
					</div>
				</div>
			</div>
		</div>
		
		
	</div>
	</div>
	</div>
</div>
@endsection
