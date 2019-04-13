<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Page_content;
use App\Photo_shop;
use App\Shop_tag;
use App;



/**
 * Class ShopController
 * @package App\Http\Controllers
 */
class ShopController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {

        $pageContentShop = Page_content::where('page', 1)->where('position', 'top')->orderBy('created_at', 'DESC')->first();
        $photoShop = Photo_shop::all();

        $ShopTags = Shop_tag::all()->random(1)->first();

        $photoShopTagsShop = Photo_shop::where('tag', 'like', '%' . $ShopTags->id . '%')->get();
        // $sorted = array_flip($ids);
        // dd($photoShopTagsShop);

        // dd($ShopTags);

		return view('shop',[
            'pageHeader' => $pageContentShop,
            'shops' => $photoShop,
            'tagShop' => $photoShopTagsShop,
            'singleTag' => $ShopTags
        ]);
    }


    public function show(int $id = null){

        $photoShop = Photo_shop::find($id)->get();

        // dd($photoShop);

        return view('readShop');
    }

}