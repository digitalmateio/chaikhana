<?php
/**
 * Migration genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Dwij\Laraadmin\Models\Module;

class CreateSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Module::generate("Sections", 'sections', 'title_en', 'fa-th-large', [
            ["section_id", "section_id", "Integer", false, "", 0, 0, false],
            ["story_id", "story_id", "Integer", false, "", 0, 0, false],
            ["asset_type_id", "asset_type_id", "Integer", false, "", 0, 0, false],
            ["position", "position", "Integer", false, "", 0, 0, false],
            ["audio", "audio", "Integer", false, "", 0, 0, false],
            ["content_en", "content_en", "Textarea", false, "", 0, 0, false],
            ["description_en", "description_en", "Textarea", false, "", 0, 0, false],
            ["about_en", "about_en", "Textarea", false, "", 0, 0, false],
            ["text_en", "text_en", "Textarea", false, "", 0, 0, false],
            ["dynamic_code_en", "dynamic_code_en", "Textarea", false, "", 0, 0, false],
            ["code_en", "code_en", "Textarea", false, "", 0, 0, false],
            ["content_az", "content_az", "Textarea", false, "", 0, 0, false],
            ["description_az", "description_az", "Textarea", false, "", 0, 0, false],
            ["about_az", "about_az", "Textarea", false, "", 0, 0, false],
            ["text_az", "text_az", "Textarea", false, "", 0, 0, false],
            ["dynamic_code_az", "dynamic_code_az", "Textarea", false, "", 0, 0, false],
            ["code_az", "code_az", "Textarea", false, "", 0, 0, false],
            ["content_hy", "content_hy", "Textarea", false, "", 0, 0, false],
            ["description_hy", "description_hy", "Textarea", false, "", 0, 0, false],
            ["about_hy", "about_hy", "Textarea", false, "", 0, 0, false],
            ["text_hy", "text_hy", "Textarea", false, "", 0, 0, false],
            ["dynamic_code_hy", "dynamic_code_hy", "Textarea", false, "", 0, 0, false],
            ["code_hy", "code_hy", "Textarea", false, "", 0, 0, false],
            ["content_ka", "content_ka", "Textarea", false, "", 0, 0, false],
            ["description_ka", "description_ka", "Textarea", false, "", 0, 0, false],
            ["about_ka", "about_ka", "Textarea", false, "", 0, 0, false],
            ["text_ka", "text_ka", "Textarea", false, "", 0, 0, false],
            ["dynamic_code_ka", "dynamic_code_ka", "Textarea", false, "", 0, 0, false],
            ["code_ka", "code_ka", "Textarea", false, "", 0, 0, false],
            ["content_ru", "content_ru", "Textarea", false, "", 0, 0, false],
            ["description_ru", "description_ru", "Textarea", false, "", 0, 0, false],
            ["about_ru", "about_ru", "Textarea", false, "", 0, 0, false],
            ["text_ru", "text_ru", "Textarea", false, "", 0, 0, false],
            ["dynamic_code_ru", "dynamic_code_ru", "Textarea", false, "", 0, 0, false],
            ["code_ru", "code_ru", "Textarea", false, "", 0, 0, false],
            ["name_en", "name_en", "String", false, "", 0, 0, false],
            ["title_en", "title_en", "String", false, "", 0, 0, false],
            ["source_en", "source_en", "String", false, "", 0, 0, false],
            ["permalink_staging_en", "permalink_staging_en", "String", false, "", 0, 0, false],
            ["edition_en", "edition_en", "String", false, "", 0, 0, false],
            ["caption_en", "caption_en", "String", false, "", 0, 0, false],
            ["sub_caption_en", "sub_caption_en", "String", false, "", 0, 0, false],
            ["dataset_url_en", "dataset_url_en", "String", false, "", 0, 0, false],
            ["dynamic_url_en", "dynamic_url_en", "String", false, "", 0, 0, false],
            ["url_en", "url_en", "String", false, "", 0, 0, false],
            ["name_az", "name_az", "String", false, "", 0, 0, false],
            ["title_az", "title_az", "String", false, "", 0, 0, false],
            ["source_az", "source_az", "String", false, "", 0, 0, false],
            ["permalink_staging_az", "permalink_staging_az", "String", false, "", 0, 0, false],
            ["edition_az", "edition_az", "String", false, "", 0, 0, false],
            ["caption_az", "caption_az", "String", false, "", 0, 0, false],
            ["sub_caption_az", "sub_caption_az", "String", false, "", 0, 0, false],
            ["dataset_url_az", "dataset_url_az", "String", false, "", 0, 0, false],
            ["dynamic_url_az", "dynamic_url_az", "String", false, "", 0, 0, false],
            ["url_az", "url_az", "String", false, "", 0, 0, false],
            ["name_hy", "name_hy", "String", false, "", 0, 0, false],
            ["title_hy", "title_hy", "String", false, "", 0, 0, false],
            ["source_hy", "source_hy", "String", false, "", 0, 0, false],
            ["permalink_staging_hy", "permalink_staging_hy", "String", false, "", 0, 0, false],
            ["edition_hy", "edition_hy", "String", false, "", 0, 0, false],
            ["caption_hy", "caption_hy", "String", false, "", 0, 0, false],
            ["sub_caption_hy", "sub_caption_hy", "String", false, "", 0, 0, false],
            ["dataset_url_hy", "dataset_url_hy", "String", false, "", 0, 0, false],
            ["dynamic_url_hy", "dynamic_url_hy", "String", false, "", 0, 0, false],
            ["url_hy", "url_hy", "String", false, "", 0, 0, false],
            ["name_ka", "name_ka", "String", false, "", 0, 0, false],
            ["title_ka", "title_ka", "String", false, "", 0, 0, false],
            ["source_ka", "source_ka", "String", false, "", 0, 0, false],
            ["permalink_staging_ka", "permalink_staging_ka", "String", false, "", 0, 0, false],
            ["edition_ka", "edition_ka", "String", false, "", 0, 0, false],
            ["caption_ka", "caption_ka", "String", false, "", 0, 0, false],
            ["sub_caption_ka", "sub_caption_ka", "String", false, "", 0, 0, false],
            ["dataset_url_ka", "dataset_url_ka", "String", false, "", 0, 0, false],
            ["dynamic_url_ka", "dynamic_url_ka", "String", false, "", 0, 0, false],
            ["url_ka", "url_ka", "String", false, "", 0, 0, false],
            ["name_ru", "name_ru", "String", false, "", 0, 0, false],
            ["title_ru", "title_ru", "String", false, "", 0, 0, false],
            ["source_ru", "source_ru", "String", false, "", 0, 0, false],
            ["permalink_staging_ru", "permalink_staging_ru", "String", false, "", 0, 0, false],
            ["edition_ru", "edition_ru", "String", false, "", 0, 0, false],
            ["caption_ru", "caption_ru", "String", false, "", 0, 0, false],
            ["sub_caption_ru", "sub_caption_ru", "String", false, "", 0, 0, false],
            ["dataset_url_ru", "dataset_url_ru", "String", false, "", 0, 0, false],
            ["dynamic_url_ru", "dynamic_url_ru", "String", false, "", 0, 0, false],
            ["url_ru", "url_ru", "String", false, "", 0, 0, false],
            ["is_public", "is_public", "Checkbox", false, "", 0, 0, false],
        ]);
		
		/*
		Row Format:
		["field_name_db", "Label", "UI Type", "Unique", "Default_Value", "min_length", "max_length", "Required", "Pop_values"]
        Module::generate("Module_Name", "Table_Name", "view_column_name" "Fields_Array");
        
		Module::generate("Books", 'books', 'name', [
            ["address",     "Address",      "Address",  false, "",          0,  1000,   true],
            ["restricted",  "Restricted",   "Checkbox", false, false,       0,  0,      false],
            ["price",       "Price",        "Currency", false, 0.0,         0,  0,      true],
            ["date_release", "Date of Release", "Date", false, "date('Y-m-d')", 0, 0,   false],
            ["time_started", "Start Time",  "Datetime", false, "date('Y-m-d H:i:s')", 0, 0, false],
            ["weight",      "Weight",       "Decimal",  false, 0.0,         0,  20,     true],
            ["publisher",   "Publisher",    "Dropdown", false, "Marvel",    0,  0,      false, ["Bloomsbury","Marvel","Universal"]],
            ["publisher",   "Publisher",    "Dropdown", false, 3,           0,  0,      false, "@publishers"],
            ["email",       "Email",        "Email",    false, "",          0,  0,      false],
            ["file",        "File",         "File",     false, "",          0,  1,      false],
            ["files",       "Files",        "Files",    false, "",          0,  10,     false],
            ["weight",      "Weight",       "Float",    false, 0.0,         0,  20.00,  true],
            ["biography",   "Biography",    "HTML",     false, "<p>This is description</p>", 0, 0, true],
            ["profile_image", "Profile Image", "Image", false, "img_path.jpg", 0, 250,  false],
            ["pages",       "Pages",        "Integer",  false, 0,           0,  5000,   false],
            ["mobile",      "Mobile",       "Mobile",   false, "+91  8888888888", 0, 20,false],
            ["media_type",  "Media Type",   "Multiselect", false, ["Audiobook"], 0, 0,  false, ["Print","Audiobook","E-book"]],
            ["media_type",  "Media Type",   "Multiselect", false, [2,3],    0,  0,      false, "@media_types"],
            ["name",        "Name",         "Name",     false, "John Doe",  5,  250,    true],
            ["password",    "Password",     "Password", false, "",          6,  250,    true],
            ["status",      "Status",       "Radio",    false, "Published", 0,  0,      false, ["Draft","Published","Unpublished"]],
            ["author",      "Author",       "String",   false, "JRR Tolkien", 0, 250,   true],
            ["genre",       "Genre",        "Taginput", false, ["Fantacy","Adventure"], 0, 0, false],
            ["description", "Description",  "Textarea", false, "",          0,  1000,   false],
            ["short_intro", "Introduction", "TextField",false, "",          5,  250,    true],
            ["website",     "Website",      "URL",      false, "http://dwij.in", 0, 0,  false],
        ]);
		*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasTable('sections')) {
            Schema::drop('sections');
        }
    }
}
