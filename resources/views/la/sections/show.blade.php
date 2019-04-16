@extends('la.layouts.app')

@section('htmlheader_title')
	Section View
@endsection


@section('main-content')
<div id="page-content" class="profile2">
	

	<ul data-toggle="ajax-tab" class="nav nav-tabs profile" role="tablist">
		<li class=""><a href="{{ url(config('laraadmin.adminRoute') . '/sections') }}" data-toggle="tooltip" data-placement="right" title="Back to Sections"><i class="fa fa-chevron-left"></i></a></li>
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
						@la_display($module, 'story_id')
						@la_display($module, 'asset_type_id')
						@la_display($module, 'position')
						@la_display($module, 'audio')
						@la_display($module, 'content_en')
						@la_display($module, 'description_en')
						@la_display($module, 'about_en')
						@la_display($module, 'text_en')
						@la_display($module, 'dynamic_code_en')
						@la_display($module, 'code_en')
						@la_display($module, 'content_az')
						@la_display($module, 'description_az')
						@la_display($module, 'about_az')
						@la_display($module, 'text_az')
						@la_display($module, 'dynamic_code_az')
						@la_display($module, 'code_az')
						@la_display($module, 'content_hy')
						@la_display($module, 'description_hy')
						@la_display($module, 'about_hy')
						@la_display($module, 'text_hy')
						@la_display($module, 'dynamic_code_hy')
						@la_display($module, 'code_hy')
						@la_display($module, 'content_ka')
						@la_display($module, 'description_ka')
						@la_display($module, 'about_ka')
						@la_display($module, 'text_ka')
						@la_display($module, 'dynamic_code_ka')
						@la_display($module, 'code_ka')
						@la_display($module, 'content_ru')
						@la_display($module, 'description_ru')
						@la_display($module, 'about_ru')
						@la_display($module, 'text_ru')
						@la_display($module, 'dynamic_code_ru')
						@la_display($module, 'code_ru')
						@la_display($module, 'name_en')
						@la_display($module, 'title_en')
						@la_display($module, 'source_en')
						@la_display($module, 'permalink_staging_en')
						@la_display($module, 'edition_en')
						@la_display($module, 'caption_en')
						@la_display($module, 'sub_caption_en')
						@la_display($module, 'dataset_url_en')
						@la_display($module, 'dynamic_url_en')
						@la_display($module, 'url_en')
						@la_display($module, 'name_az')
						@la_display($module, 'title_az')
						@la_display($module, 'source_az')
						@la_display($module, 'permalink_staging_az')
						@la_display($module, 'edition_az')
						@la_display($module, 'caption_az')
						@la_display($module, 'sub_caption_az')
						@la_display($module, 'dataset_url_az')
						@la_display($module, 'dynamic_url_az')
						@la_display($module, 'url_az')
						@la_display($module, 'name_hy')
						@la_display($module, 'title_hy')
						@la_display($module, 'source_hy')
						@la_display($module, 'permalink_staging_hy')
						@la_display($module, 'edition_hy')
						@la_display($module, 'caption_hy')
						@la_display($module, 'sub_caption_hy')
						@la_display($module, 'dataset_url_hy')
						@la_display($module, 'dynamic_url_hy')
						@la_display($module, 'url_hy')
						@la_display($module, 'name_ka')
						@la_display($module, 'title_ka')
						@la_display($module, 'source_ka')
						@la_display($module, 'permalink_staging_ka')
						@la_display($module, 'edition_ka')
						@la_display($module, 'caption_ka')
						@la_display($module, 'sub_caption_ka')
						@la_display($module, 'dataset_url_ka')
						@la_display($module, 'dynamic_url_ka')
						@la_display($module, 'url_ka')
						@la_display($module, 'name_ru')
						@la_display($module, 'title_ru')
						@la_display($module, 'source_ru')
						@la_display($module, 'permalink_staging_ru')
						@la_display($module, 'edition_ru')
						@la_display($module, 'caption_ru')
						@la_display($module, 'sub_caption_ru')
						@la_display($module, 'dataset_url_ru')
						@la_display($module, 'dynamic_url_ru')
						@la_display($module, 'url_ru')
						@la_display($module, 'is_public')
					</div>
				</div>
			</div>
		</div>
		
		
	</div>
	</div>
	</div>
</div>
@endsection
