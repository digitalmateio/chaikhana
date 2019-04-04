<?php
/**
 * Migration genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Dwij\Laraadmin\Models\Module;

class CreateTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Module::generate("Translations", 'translations', 'title', 'fa-language', [
            ["block_id", "block_id", "Integer", false, "", 0, 0, false],
            ["story_id", "story_id", "Integer", false, "", 0, 0, false],
            ["theme_id", "theme_id", "Integer", false, "", 0, 0, false],
            ["locale", "locale", "String", false, "", 0, 0, false],
            ["media_type", "media_type", "Integer", false, "", 0, 0, false],
            ["audio_path", "audio_path", "String", false, "", 0, 0, false],
            ["video_path", "video_path", "String", false, "", 0, 0, false],
            ["position", "position", "Integer", false, "", 0, 0, false],
            ["video_loop", "video_loop", "Integer", false, "", 0, 0, false],
            ["name", "name", "String", false, "", 0, 0, false],
            ["title", "title", "String", false, "", 0, 0, false],
            ["source", "source", "String", false, "", 0, 0, false],
            ["permalink_staging", "permalink_staging", "String", false, "", 0, 0, false],
            ["media_author", "media_author", "String", false, "", 0, 0, false],
            ["edition", "edition", "String", false, "", 0, 0, false],
            ["caption", "caption", "String", false, "", 0, 500, false],
            ["sub_caption", "sub_caption", "String", false, "", 0, 500, false],
            ["content", "content", "Textarea", false, "", 0, 0, false],
            ["description", "description", "Textarea", false, "", 0, 0, false],
            ["about", "about", "Textarea", false, "", 0, 0, false],
            ["text", "text", "Textarea", false, "", 0, 0, false],
            ["dataset_url", "dataset_url", "String", false, "", 0, 0, false],
            ["dynamic_url", "dynamic_url", "String", false, "", 0, 0, false],
            ["dynamic_code", "dynamic_code", "Textarea", false, "", 0, 0, false],
            ["url", "url", "String", false, "", 0, 0, false],
            ["code", "code", "Textarea", false, "", 0, 0, false],
            ["shortened_url", "shortened_url", "String", false, "", 0, 0, false],
            ["permalink", "permalink", "String", false, "", 0, 0, false],
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
        if (Schema::hasTable('translations')) {
            Schema::drop('translations');
        }
    }
}
