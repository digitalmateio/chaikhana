<?php
/**
 * Controller genrated using LaraAdmin
 * Help: http://laraadmin.com
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Page_content;
use App\Shop_tag;
use App;
use URL;
use App\Photo_size;
use App\Photo_shop;
use App\Shopping_country;
use App\Models\Shipping;


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
        $photoShop = Photo_shop::where('is_public', 1)->orderBy('created_at', 'DESC')->limit(2)->get();

        $ShopTags = Shop_tag::all()->random(1)->first();
        $ShopTagsAll = Shop_tag::all();

        $photoShopTagsShop = Photo_shop::where('is_public', 1)->where('tag', 'like', '%' . $ShopTags->id . '%')->get();

		return view('shop',[
            'pageHeader' => $pageContentShop,
            'shops' => $photoShop,
            'tagShop' => $photoShopTagsShop,
            'singleTag' => $ShopTags,
            'AllTags' => $ShopTagsAll
        ]);
    }


    public function tag(int $id = null)
    {
        $pageContentShop = Page_content::where('page', 1)->where('position', 'top')->orderBy('created_at', 'DESC')->first();
        $photoShop = Photo_shop::where('is_public', 1)->orderBy('created_at', 'DESC')->limit(2)->get();

        $ShopTagsAll = Shop_tag::all();
        $ShopTags = Shop_tag::all()->random(1)->first();

        $photoShopTagsShop = Photo_shop::where('is_public', 1)->where('tag', 'like', '%' . $id . '%')->orderBy('created_at', 'DESC')->limit(2)->get();

        // dd($photoShopTagsShop);

        return view('shop',[
            'pageHeader' => $pageContentShop,
            'shops' => $photoShopTagsShop,
            'tagShop' => $photoShopTagsShop,
            'singleTag' => $ShopTags,
            'AllTags' => $ShopTagsAll
        ]); 
    }


    public function loadDataAjax(Request $request)
    {
        $output = '';
        $id = $request->id;

        $posts = Photo_shop::where('is_public', 1)->where('id', '<', (int) $id)->orderBy('created_at', 'DESC')->limit(42)->get();

        if(!$posts->isEmpty())
        {
            $LastID = $posts->last()->id; 
            foreach($posts as $post)
            {

                $url = URL::to('/').'/'.App::getLocale('locale').'/shop/'.$post->id;

                $Ress = $posts->last()->id==$post->id ? 'id='.$post->id.'':'';
                                
                $output .= '<div class="col-md-4">
                                <div class="text-left" '.$Ress.'>
                                    <div class="all-shop-one-image">
                                        <a href="'.$url.'">
                                            <img src="'.$post->image['300x300'].'" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="all-shop-title-info">
                                        <h2>'.str_limit($post->TextTrans('title'), 50).'</h2>
                                        <p>'.str_limit($post->TextTrans('description'), 70).'</p>
                                    </div>
                                </div>
                            </div>';
            }
            
            $output .= '<div id="remove-row" class="col-md-12">
                            <button id="btn-more" data-id="'.$LastID.'" class="load-more-button nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                                <img src="http://localhost/chaikhanaNew/assets/img/loadmore.png" class="loadmore">
                                <p class="loadmore-text">Load more</p>
                            </button>
                        </div>';
            
            echo $output;

        }else{
            echo '<div id="remove-row" class="col-md-12 mb-5 mt-5">
                        <p class="loadmore-text">No more authors</p>
                    </button>
                </div>';
        } 
        // End empty filter
    }


    public function searchAtaAjax(Request $request)
    {

        $output = '';

        if($request->search != ''){
          $posts = Photo_shop::where('title_'.App::getLocale('locale'),'LIKE','%'.$request->search."%")->get();
        }else{
          $posts = Photo_shop::take(15)->get();
        }

        if(!$posts->isEmpty())
        {
            foreach($posts as $post)
            {

                $url = URL::to('/').'/'.App::getLocale('locale').'/shop/'.$post->id;

                $output .= '<div class="col-md-4">
                                <div class="text-left">
                                    <div class="all-shop-one-image">
                                        <a href="'.$url.'">
                                            <img src="'.$post->image['300x300'].'" class="img-fluid">
                                        </a>
                                    </div>
                                    <div class="all-shop-title-info">
                                        <h2>'.str_limit($post->TextTrans('title'), 50).'</h2>
                                        <p>'.str_limit(strip_tags($post->TextTrans('description')), 70).'</p>
                                    </div>
                                </div>
                            </div>';
            }
            
            $output .= '<div id="remove-row" class="col-md-12">
                            <button id="btn-more" data-id="'.$posts->last()->id.'" class="load-more-button nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent">
                                <img src="http://localhost/chaikhanaNew/assets/img/loadmore.png" class="loadmore">
                                <p class="loadmore-text">Load more</p>
                            </button>
                        </div>';
            
            echo $output;

        }else{
            echo '<div id="remove-row" class="col-md-12 mb-5 mt-5">
                        <p class="loadmore-text">No more authors</p>
                    </button>
                </div>';
        } // End empty filter
    }

    public function imagePrice(Request $request)
    {
        
        \Log::info( json_encode(  $request->all() ));

        $Photo_shop = Photo_shop::find( $request->fotoid );
        $Shipping = Shipping::where('size',$request->size)->where('country',$request->country)->first();

        if(is_null($Shipping))
        {
            $originalPrice = $Photo_shop->price;
            $quantity = $request->quantity;
            $shippingPrice = 0;

        }else{

            $originalPrice = $Photo_shop->price;
            $quantity = $request->quantity;
            $shippingPrice = $Shipping->price;
        }


         $finalPrice =  ($originalPrice + $shippingPrice) * $quantity ;
         $finalPrice = sprintf("%.2f",  $finalPrice);
         \Log::info( json_encode( '$originalPrice : '.$originalPrice ));
         \Log::info( json_encode( '$shippingPrice : '.$shippingPrice ));
         \Log::info( json_encode( '$quantity : '.$quantity ));
        // $finalPrice = floatval( ($originalPrice + $Shipping->price) * $quantity );

        \Log::info( json_encode( $finalPrice ));

        return response()->json([
            'price' => $finalPrice
        ]);
    }

    public function show(int $id = null){

        $Photo_sizes = Photo_size::all();
        $Shopping_countrys = Shopping_country::all();
       
        $photoShopSingle = Photo_shop::find($id);
        
        $next = Photo_shop::where('is_public', 1)->where('id', '>', (int) $id)->limit(1)->get();

        return view('readShop',[
            'photo'              => $photoShopSingle,
            'next'               => $next,
            'Photo_sizes'        => $Photo_sizes,
            'Shopping_countrys'  => $Shopping_countrys
        ]);
    }

}