<?php

namespace App\Http\Controllers\frontend;

use App\Item;
use App\Link;
use App\Menu;
use App\News;
use App\Post;
use App\Team;
use App\video;
use App\Dmcday;
use App\Others;
use App\Rating;
use App\Sector;
use App\Slider;
use App\Article;
use App\Mission;
use App\Objects;
use App\Outlook;
use App\Product;
use App\Service;
use App\Activity;
use App\Category;
use App\Industry;
use App\NeedHelp;
use App\ContactUs;
use App\GCategory;
use App\TCategory;
use Carbon\Carbon;
use Dompdf\Dompdf;
use App\LifeMember;
use App\Ratinglist;
use App\Ratingtype;
use App\Application;
use App\MicroSLider;
use App\Publication;
use App\Mail\DmcMail;
use App\MecroFinance;
use App\MedicalSlider;
use App\ProductManage;
use App\CategoryManage;
use App\MedicalFeature;
use App\PreviousProgram;
use App\CompanyManagement;
use App\photo_gallery_table;
use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\View;
use shurjopayv2\ShurjopayLaravelPackage8\Http\Controllers\ShurjopayController;

class HomeController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {
        $sliders = Slider::all();
        $categories = Category::orderBy('id', 'DESC')->limit(2)->get();
        $video = video::orderBy('id', 'DESC')->limit(2)->get();
        $links = Link::all();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();

        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();
        $footer2 = Menu::orderBy('sequence', 'ASC')
            ->where('footer2', 1)
            ->get();
        $top_header = Menu::orderBy('sequence', 'ASC')
            ->where('top_header', 1)
            ->get();
        $activity = Activity::orderBy('id', 'DESC')

            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $service = Service::orderBy('id', 'ASC')

            ->get();
        $news = News::orderBy('id', 'DESC')
            ->limit(6)
            ->get();
        $objects = Objects::orderBy('id', 'ASC')
            ->where('id', 1)
            ->get();
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact1 = Others::find(2);
        $about = Objects::find(5);
        $aboutmissionvission = Objects::find(4);
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();
        $direcotr = LifeMember::all();

        return view('frontend/home.index', compact('direcotr', 'about', 'aboutmissionvission', 'top_header', 'sliders', 'video', 'contact1', 'activity', 'service', 'categories', 'news', 'main', 'links', 'footer', 'footer2', 'objects', 'objects2', 'contact1', 'contact2', 'headoffice'));
    }

    // public function AllProduct() {

    //     $sliders = Slider::all();
    //     //$categories = Category::orderBy('id', 'DESC')->limit(2)->get();
    //     $video = video::orderBy('id', 'DESC')->limit(2)->get();
    //     $links = Link::all();
    //     $main = Menu::orderBy('sequence', 'ASC')
    //         ->where('display', 1)
    //         ->get();

    //     $footer = Menu::orderBy('sequence', 'ASC')
    //         ->where('footer1', 1)
    //         ->get();
    //     $footer2 = Menu::orderBy('sequence', 'ASC')
    //         ->where('footer2', 1)
    //         ->get();
    //     $top_header = Menu::orderBy('sequence', 'ASC')
    //         ->where('top_header', 1)
    //         ->get();
    //     $activity = Activity::orderBy('id', 'DESC')

    //         ->get();
    //     $contact1 = Others::orderBy('id', 'ASC')
    //         ->where('id', 2)
    //         ->get();
    //     $service = Service::orderBy('id', 'ASC')

    //         ->get();
    //     $news = News::orderBy('id', 'DESC')
    //         ->limit(6)
    //         ->get();
    //     $objects = Objects::orderBy('id', 'ASC')
    //         ->where('id', 1)
    //         ->get();
    //     $objects2 = Objects::orderBy('id', 'ASC')
    //         ->where('id', 2)
    //         ->get();
    //     $contact1 = Others::find(2);
    //     $about = Objects::find(5);
    //     $aboutmissionvission = Objects::find(4);
    //     $contact2 = Others::orderBy('id', 'ASC')
    //         ->where('id', 2)
    //         ->get();
    //     $headoffice = Others::orderBy('id', 'ASC')
    //         ->where('id', 4)
    //         ->get();
    //     $direcotr = LifeMember::all();
    //     //  $all_pro = ProductManage::where('status', 'Active')

    //     //  ->get();

    //     $all_pro = ProductManage::where('status', 'Active')
    //     ->whereIn('first_ch', range('A', 'Z')) // Filters for A to Z
    //     ->get();



    //     $Category = CategoryManage::get();


    //     return view('frontend/product.all_product', compact('all_pro', 'direcotr', 'about', 'aboutmissionvission', 'top_header', 'sliders', 'video', 'contact1', 'activity', 'service', 'Category', 'news', 'main', 'links', 'footer', 'footer2', 'objects', 'objects2', 'contact1', 'contact2', 'headoffice'));

    // }
    public function AllProduct(Request $request) {
        $sliders = Slider::all();
        $video = Video::orderBy('id', 'DESC')->limit(2)->get();
        $links = Link::all();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();
        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();
        $footer2 = Menu::orderBy('sequence', 'ASC')
            ->where('footer2', 1)
            ->get();
        $top_header = Menu::orderBy('sequence', 'ASC')
            ->where('top_header', 1)
            ->get();
        $activity = Activity::orderBy('id', 'DESC')->get();
        $contact1 = Others::find(2);
        $about = Objects::find(5);
        $aboutmissionvission = Objects::find(4);
        $contact2 = Others::where('id', 2)->get();
        $headoffice = Others::where('id', 4)->get();
        $direcotr = LifeMember::all();

        $Category = CategoryManage::get();

        // Handle A-Z filtering logic
        $selectedChar = $request->get('char', ''); // Get selected character or show all if none selected

        $all_pro = ProductManage::where('status', 'Active')
            ->when($selectedChar, function ($query) use ($selectedChar) {
                return $query->where('first_ch', $selectedChar);
            })
            ->get();


        return view('frontend.product.all_product', compact('all_pro','direcotr','about','aboutmissionvission','top_header','sliders',
            'video','contact1','activity','Category','main','links','footer','footer2','contact2','headoffice','selectedChar'
        ));
    }


    public function CategoryProduct($cat_id){

        $sliders = Slider::all();
        //$categories = Category::orderBy('id', 'DESC')->limit(2)->get();
        $video = video::orderBy('id', 'DESC')->limit(2)->get();
        $links = Link::all();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();

        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();
        $footer2 = Menu::orderBy('sequence', 'ASC')
            ->where('footer2', 1)
            ->get();
        $top_header = Menu::orderBy('sequence', 'ASC')
            ->where('top_header', 1)
            ->get();
        $activity = Activity::orderBy('id', 'DESC')

            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $service = Service::orderBy('id', 'ASC')

            ->get();
        $news = News::orderBy('id', 'DESC')
            ->limit(6)
            ->get();
        $objects = Objects::orderBy('id', 'ASC')
            ->where('id', 1)
            ->get();
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact1 = Others::find(2);
        $about = Objects::find(5);
        $aboutmissionvission = Objects::find(4);
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();
        $direcotr = LifeMember::all();
        $all_pro = ProductManage::where('status', 'Active')->get();

        $cateogry_name =CategoryManage::where('id',$cat_id)->first();

        $Category = CategoryManage::get();

        $cat_id = $cat_id;




        $pro = DB::table('prro_categorys')
                     ->join('product_manages','prro_categorys.pro_id','product_manages.id')
                    ->where('prro_categorys.cat_id',$cat_id)
                    ->get();


         $t_category = TCategory::get();
         $g_category = GCategory::get();


        return view('frontend/product.CategoryWiseProduct', compact('g_category','cateogry_name','all_pro', 'Category','cat_id','pro','t_category',
        'direcotr', 'about', 'aboutmissionvission', 'top_header', 'sliders', 'video', 'contact1', 'activity', 'service', 'Category', 'news', 'main', 'links', 'footer', 'footer2', 'objects', 'objects2', 'contact1', 'contact2', 'headoffice'));

    }

     public function SubCategoryProduct($cat_id){

        $sliders = Slider::all();
        //$categories = Category::orderBy('id', 'DESC')->limit(2)->get();
        $video = video::orderBy('id', 'DESC')->limit(2)->get();
        $links = Link::all();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();

        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();
        $footer2 = Menu::orderBy('sequence', 'ASC')
            ->where('footer2', 1)
            ->get();
        $top_header = Menu::orderBy('sequence', 'ASC')
            ->where('top_header', 1)
            ->get();
        $activity = Activity::orderBy('id', 'DESC')

            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $service = Service::orderBy('id', 'ASC')

            ->get();
        $news = News::orderBy('id', 'DESC')
            ->limit(6)
            ->get();
        $objects = Objects::orderBy('id', 'ASC')
            ->where('id', 1)
            ->get();
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact1 = Others::find(2);
        $about = Objects::find(5);
        $aboutmissionvission = Objects::find(4);
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();
        $direcotr = LifeMember::all();
        $all_pro = ProductManage::where('status', 'Active')->get();

        $cateogry_name =CategoryManage::where('id',$cat_id)->first();

        $Category = CategoryManage::get();

        $cat_id = $cat_id;




        $pro = DB::table('prro_categorys')
                     ->join('product_manages','prro_categorys.pro_id','product_manages.id')
                    ->where('prro_categorys.cat_id',$cat_id)
                    ->get();


         $t_category = TCategory::get();
         $g_category = GCategory::get();


        return view('frontend/product.SubCategoryProduct', compact('g_category','cateogry_name','all_pro', 'Category','cat_id','pro','t_category',
        'direcotr', 'about', 'aboutmissionvission', 'top_header', 'sliders', 'video', 'contact1', 'activity', 'service', 'Category', 'news', 'main', 'links', 'footer', 'footer2', 'objects', 'objects2', 'contact1', 'contact2', 'headoffice'));

    }

    public function TradeName(){

        $sliders = Slider::all();
        //$categories = Category::orderBy('id', 'DESC')->limit(2)->get();
        $video = video::orderBy('id', 'DESC')->limit(2)->get();
        $links = Link::all();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();

        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();
        $footer2 = Menu::orderBy('sequence', 'ASC')
            ->where('footer2', 1)
            ->get();
        $top_header = Menu::orderBy('sequence', 'ASC')
            ->where('top_header', 1)
            ->get();
        $activity = Activity::orderBy('id', 'DESC')

            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $service = Service::orderBy('id', 'ASC')

            ->get();
        $news = News::orderBy('id', 'DESC')
            ->limit(6)
            ->get();
        $objects = Objects::orderBy('id', 'ASC')
            ->where('id', 1)
            ->get();
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact1 = Others::find(2);
        $about = Objects::find(5);
        $aboutmissionvission = Objects::find(4);
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();
        $direcotr = LifeMember::all();
        $all_pro = ProductManage::where('status', 'Active')->get();

//        $cateogry_name =CategoryManage::where('id',$cat_id)->first();

        $Category = CategoryManage::get();

//        $cat_id = $cat_id;




//        $pro = DB::table('prro_categorys')
//                     ->join('product_manages','prro_categorys.pro_id','product_manages.id')
//                    ->where('prro_categorys.cat_id',$cat_id)
//                    ->get();


         $t_category = TCategory::get();
         $g_category = GCategory::get();


        return view('frontend/product.TradeName', compact('g_category', 'Category','t_category',
        'direcotr', 'about', 'aboutmissionvission', 'top_header', 'sliders', 'video', 'contact1', 'activity', 'service', 'Category', 'news', 'main', 'links', 'footer', 'footer2', 'objects', 'objects2', 'contact1', 'contact2', 'headoffice'));

    }

     public function ProductSearch(Request $request){
        $keyword = request('keyword');
        $sliders = Slider::all();
        //$categories = Category::orderBy('id', 'DESC')->limit(2)->get();
        $video = video::orderBy('id', 'DESC')->limit(2)->get();
        $links = Link::all();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();

        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();
        $footer2 = Menu::orderBy('sequence', 'ASC')
            ->where('footer2', 1)
            ->get();
        $top_header = Menu::orderBy('sequence', 'ASC')
            ->where('top_header', 1)
            ->get();
        $activity = Activity::orderBy('id', 'DESC')

            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $service = Service::orderBy('id', 'ASC')

            ->get();
        $news = News::orderBy('id', 'DESC')
            ->limit(6)
            ->get();
        $objects = Objects::orderBy('id', 'ASC')
            ->where('id', 1)
            ->get();
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact1 = Others::find(2);
        $about = Objects::find(5);
        $aboutmissionvission = Objects::find(4);
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();
        $direcotr = LifeMember::all();
        $all_pro = ProductManage::where('status', 'Active')->get();

//        $cateogry_name =CategoryManage::where('id',$cat_id)->first();

        $Category = CategoryManage::get();

//        $cat_id = $cat_id;




//        $pro = DB::table('prro_categorys')
//                     ->join('product_manages','prro_categorys.pro_id','product_manages.id')
//                    ->where('prro_categorys.cat_id',$cat_id)
//                    ->get();


         $t_category = TCategory::get();
         $g_category = GCategory::get();


        return view('frontend/product.ProductSearch', compact('g_category','keyword', 'Category','t_category',
        'direcotr', 'about', 'aboutmissionvission', 'top_header', 'sliders', 'video', 'contact1', 'activity', 'service', 'Category', 'news', 'main', 'links', 'footer', 'footer2', 'objects', 'objects2', 'contact1', 'contact2', 'headoffice'));

    }




    public function Generic(){

        $sliders = Slider::all();
        //$categories = Category::orderBy('id', 'DESC')->limit(2)->get();
        $video = video::orderBy('id', 'DESC')->limit(2)->get();
        $links = Link::all();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();

        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();
        $footer2 = Menu::orderBy('sequence', 'ASC')
            ->where('footer2', 1)
            ->get();
        $top_header = Menu::orderBy('sequence', 'ASC')
            ->where('top_header', 1)
            ->get();
        $activity = Activity::orderBy('id', 'DESC')

            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $service = Service::orderBy('id', 'ASC')

            ->get();
        $news = News::orderBy('id', 'DESC')
            ->limit(6)
            ->get();
        $objects = Objects::orderBy('id', 'ASC')
            ->where('id', 1)
            ->get();
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact1 = Others::find(2);
        $about = Objects::find(5);
        $aboutmissionvission = Objects::find(4);
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();
        $direcotr = LifeMember::all();
        $all_pro = ProductManage::where('status', 'Active')->get();

//        $cateogry_name =CategoryManage::where('id',$cat_id)->first();

        $Category = CategoryManage::get();

//        $cat_id = $cat_id;




//        $pro = DB::table('prro_categorys')
//                     ->join('product_manages','prro_categorys.pro_id','product_manages.id')
//                    ->where('prro_categorys.cat_id',$cat_id)
//                    ->get();


        $t_category = TCategory::get();
        $g_category = GCategory::get();


        return view('frontend/product.Generic', compact('g_category', 'Category','t_category',
            'direcotr', 'about', 'aboutmissionvission', 'top_header', 'sliders', 'video', 'contact1', 'activity', 'service', 'Category', 'news', 'main', 'links', 'footer', 'footer2', 'objects', 'objects2', 'contact1', 'contact2', 'headoffice'));


    }

    public function Therapeutic(){

        $sliders = Slider::all();
        //$categories = Category::orderBy('id', 'DESC')->limit(2)->get();
        $video = video::orderBy('id', 'DESC')->limit(2)->get();
        $links = Link::all();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();

        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();
        $footer2 = Menu::orderBy('sequence', 'ASC')
            ->where('footer2', 1)
            ->get();
        $top_header = Menu::orderBy('sequence', 'ASC')
            ->where('top_header', 1)
            ->get();
        $activity = Activity::orderBy('id', 'DESC')

            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $service = Service::orderBy('id', 'ASC')

            ->get();
        $news = News::orderBy('id', 'DESC')
            ->limit(6)
            ->get();
        $objects = Objects::orderBy('id', 'ASC')
            ->where('id', 1)
            ->get();
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact1 = Others::find(2);
        $about = Objects::find(5);
        $aboutmissionvission = Objects::find(4);
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();
        $direcotr = LifeMember::all();
        $all_pro = ProductManage::where('status', 'Active')->get();

//        $cateogry_name =CategoryManage::where('id',$cat_id)->first();

        $Category = CategoryManage::get();

//        $cat_id = $cat_id;




//        $pro = DB::table('prro_categorys')
//                     ->join('product_manages','prro_categorys.pro_id','product_manages.id')
//                    ->where('prro_categorys.cat_id',$cat_id)
//                    ->get();


        $t_category = TCategory::get();
        $g_category = GCategory::get();


        return view('frontend/product.Therapeutic', compact('g_category', 'Category','t_category',
            'direcotr', 'about', 'aboutmissionvission', 'top_header', 'sliders', 'video', 'contact1', 'activity', 'service', 'Category', 'news', 'main', 'links', 'footer', 'footer2', 'objects', 'objects2', 'contact1', 'contact2', 'headoffice'));


    }




    public function TherapeuticID($id){

        $sliders = Slider::all();
        //$categories = Category::orderBy('id', 'DESC')->limit(2)->get();
        $video = video::orderBy('id', 'DESC')->limit(2)->get();
        $links = Link::all();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();

        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();
        $footer2 = Menu::orderBy('sequence', 'ASC')
            ->where('footer2', 1)
            ->get();
        $top_header = Menu::orderBy('sequence', 'ASC')
            ->where('top_header', 1)
            ->get();
        $activity = Activity::orderBy('id', 'DESC')

            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $service = Service::orderBy('id', 'ASC')

            ->get();
        $news = News::orderBy('id', 'DESC')
            ->limit(6)
            ->get();
        $objects = Objects::orderBy('id', 'ASC')
            ->where('id', 1)
            ->get();
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact1 = Others::find(2);
        $about = Objects::find(5);
        $aboutmissionvission = Objects::find(4);
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();
        $direcotr = LifeMember::all();
        $all_pro = ProductManage::where('status', 'Active')->get();

//        $cateogry_name =CategoryManage::where('id',$cat_id)->first();

        $Category = CategoryManage::get();

//        $cat_id = $cat_id;




//        $pro = DB::table('prro_categorys')
//                     ->join('product_manages','prro_categorys.pro_id','product_manages.id')
//                    ->where('prro_categorys.cat_id',$cat_id)
//                    ->get();


        $t_category = TCategory::get();
        $g_category = GCategory::get();


        return view('frontend/product.TherapeuticID', compact('g_category', 'Category','t_category',
            'direcotr', 'about', 'aboutmissionvission', 'top_header', 'sliders', 'video', 'contact1', 'activity', 'service', 'Category', 'news', 'main', 'links', 'footer', 'footer2', 'objects', 'objects2', 'contact1', 'contact2', 'headoffice'));


    }


    public function GenericId($id){

        $sliders = Slider::all();
        //$categories = Category::orderBy('id', 'DESC')->limit(2)->get();
        $video = video::orderBy('id', 'DESC')->limit(2)->get();
        $links = Link::all();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();

        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();
        $footer2 = Menu::orderBy('sequence', 'ASC')
            ->where('footer2', 1)
            ->get();
        $top_header = Menu::orderBy('sequence', 'ASC')
            ->where('top_header', 1)
            ->get();
        $activity = Activity::orderBy('id', 'DESC')

            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $service = Service::orderBy('id', 'ASC')

            ->get();
        $news = News::orderBy('id', 'DESC')
            ->limit(6)
            ->get();
        $objects = Objects::orderBy('id', 'ASC')
            ->where('id', 1)
            ->get();
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact1 = Others::find(2);
        $about = Objects::find(5);
        $aboutmissionvission = Objects::find(4);
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();
        $direcotr = LifeMember::all();
        $all_pro = ProductManage::where('status', 'Active')->get();

//        $cateogry_name =CategoryManage::where('id',$cat_id)->first();

        $Category = CategoryManage::get();

//        $cat_id = $cat_id;




//        $pro = DB::table('prro_categorys')
//                     ->join('product_manages','prro_categorys.pro_id','product_manages.id')
//                    ->where('prro_categorys.cat_id',$cat_id)
//                    ->get();


        $t_category = TCategory::get();
        $g_category = GCategory::get();


        return view('frontend/product.GenericId', compact('g_category', 'Category','t_category',
            'direcotr', 'about', 'aboutmissionvission', 'top_header', 'sliders', 'video', 'contact1', 'activity', 'service', 'Category', 'news', 'main', 'links', 'footer', 'footer2', 'objects', 'objects2', 'contact1', 'contact2', 'headoffice'));


    }




    // public function ProductCharacterSearchGeneric($cat_id, $Char) {

    //     $sliders = Slider::all();
    //     //$categories = Category::orderBy('id', 'DESC')->limit(2)->get();
    //     $video = video::orderBy('id', 'DESC')->limit(2)->get();
    //     $links = Link::all();
    //     $main = Menu::orderBy('sequence', 'ASC')
    //         ->where('display', 1)
    //         ->get();

    //     $footer = Menu::orderBy('sequence', 'ASC')
    //         ->where('footer1', 1)
    //         ->get();
    //     $footer2 = Menu::orderBy('sequence', 'ASC')
    //         ->where('footer2', 1)
    //         ->get();
    //     $top_header = Menu::orderBy('sequence', 'ASC')
    //         ->where('top_header', 1)
    //         ->get();
    //     $activity = Activity::orderBy('id', 'DESC')

    //         ->get();
    //     $contact1 = Others::orderBy('id', 'ASC')
    //         ->where('id', 2)
    //         ->get();
    //     $service = Service::orderBy('id', 'ASC')

    //         ->get();
    //     $news = News::orderBy('id', 'DESC')
    //         ->limit(6)
    //         ->get();
    //     $objects = Objects::orderBy('id', 'ASC')
    //         ->where('id', 1)
    //         ->get();
    //     $objects2 = Objects::orderBy('id', 'ASC')
    //         ->where('id', 2)
    //         ->get();
    //     $contact1 = Others::find(2);
    //     $about = Objects::find(5);
    //     $aboutmissionvission = Objects::find(4);
    //     $contact2 = Others::orderBy('id', 'ASC')
    //         ->where('id', 2)
    //         ->get();
    //     $headoffice = Others::orderBy('id', 'ASC')
    //         ->where('id', 4)
    //         ->get();
    //     $direcotr = LifeMember::all();
    //     $all_pro = ProductManage::where('status', 'Active')->get();

    //     $Category = CategoryManage::get();
    //     //$ProductCategory = ProductCategory::get();
    //     //$data['Category'] = CategoryManage::get();

    //     // $cat_id = $Category->cat_id;
    //     $Chart = $Char;

    //     $cateogry_name = CategoryManage::where('id', $cat_id)->first();

    //     $Therapeutic_cat = TCategory::where('t_category_name', 'LIKE', $Char . '%')->get();

    //     return view('frontend/product.All_product_Character.all_product_character_generic', compact('Therapeutic_cat', 'Chart', 'cateogry_name', 'all_pro', 'direcotr', 'about', 'aboutmissionvission', 'top_header', 'sliders', 'video', 'contact1', 'activity', 'service', 'Category', 'news', 'main', 'links', 'footer', 'footer2', 'objects', 'objects2', 'contact1', 'contact2', 'headoffice'));

    // }
    public function ProductCharacterSearchGeneric($cat_id, $Char)
    {
        $sliders = Slider::all();
        $video = video::orderBy('id', 'DESC')->limit(2)->get();
        $links = Link::all();
        $main = Menu::orderBy('sequence', 'ASC')->where('display', 1)->get();
        $footer = Menu::orderBy('sequence', 'ASC')->where('footer1', 1)->get();
        $footer2 = Menu::orderBy('sequence', 'ASC')->where('footer2', 1)->get();
        $top_header = Menu::orderBy('sequence', 'ASC')->where('top_header', 1)->get();
        $activity = Activity::orderBy('id', 'DESC')->get();
        $contact1 = Others::find(2);
        $about = Objects::find(5);
        $aboutmissionvission = Objects::find(4);
        $headoffice = Others::orderBy('id', 'ASC')->where('id', 4)->get();
        $direcotr = LifeMember::all();
        $all_pro = ProductManage::where('status', 'Active')->get();

        $Category = CategoryManage::get();
        $Therapeutic_cat = TCategory::where('t_category_name', 'LIKE', $Char . '%')->get();
        $cateogry_name = CategoryManage::where('id', $cat_id)->first();

        return view('frontend.product.All_product_Character.all_product_character_generic', compact(
            'Therapeutic_cat',
            'Char',
            'cateogry_name',
            'cat_id', // Passing $cat_id to the view
            'all_pro',
            'direcotr',
            'about',
            'aboutmissionvission',
            'top_header',
            'sliders',
            'video',
            'contact1',
            'activity',
            'Category',
            'main',
            'links',
            'footer',
            'footer2',
            'headoffice'
        ));
    }

    // public function SingleProduct($slug){

    //     $data['socialIcon'] = SocialIcon::get();
    //     $data['Service'] = Service::take(6)->get();
    //     $data['slide'] = Slider::get();
    //     $data['ProductCategory'] = ProductCategory::get();
    //     $data['simple_slider'] = SimpleSlider::get();
    //     $data['contact'] = ContactUs::where('id','1')->first();
    //     $data['logo'] = Logo::where('id','1')->first();
    //     $data['contact_two'] = ContactUsTwo::where('id','1')->first();
    //     $data['About'] = About::where('id','1')->first();
    //     $data['object'] = Page::where('id','5')->first();
    //     // $object = Page::where('title_uri',$slug)->first();
    //     $data['counter'] = Counter::where('id','1')->first();
    //     $data['client'] = Client::get();

    //     $data['main'] = Menu::orderBy('sequence','ASC')
    //         ->where('display',1)
    //         ->get();

    //     $data['home'] = HomeSeo::where('id','1')->first();

    //     $data['userfull_links'] = Menu::orderBy('sequence','ASC')
    //         ->where('important_link','important_link')
    //         ->get();

    //     $data['our_service'] = Menu::orderBy('sequence','ASC')
    //         ->where('footer1','footer1')
    //         ->get();

    //     $data['all_patient'] = AllPatient::get();
    //     $data['consu'] = Consultnt::OrderBy('id','desc')->take(8)->get();
    //     $data['news'] = NewsEvent::OrderBy('id','desc')->take(6)->get();
    //     $data['gallery'] = Gallery::OrderBy('id','desc')->take(6)->get();
    //     $data['supported'] = Supported::get();
    //     $data['service'] = Service::get();

    //     $data['aris'] = JurneyOfAris::OrderBy('id','desc')->get();

    //     $data['submentu'] = Menu::orderBy('sequence','ASC')
    //     ->where('root_id','21')
    //     ->get();


    //     $data['product'] = ProductManage::where('slug',$slug)->first();

    //     $data['gallery'] = ProGallery::where('pro_id',$data['product']->id)->get();



    //     // $data['proinde'] = PrroCategorys::where('pro_id',$data['product']->id)->get();

    //     $datass = DB::table('product_manages')
    //                       ->join('prro_categorys','prro_categorys.pro_id','product_manages.id')
    //                       ->where('prro_categorys.pro_id',$data['product']->id)
    //                     //   ->select(DB::raw('prro_categorys.cat_id as cat_id'))

    //                        ->get();

    //     $arr=[];

    //     for($i=0; $i<count($datass); $i++){


    //        array_push($arr,$datass[$i]->cat_id);

    //     }

    //     $querys =  DB::table('product_manages')
    //                     ->join('prro_categorys','prro_categorys.pro_id','product_manages.id')
    //                     ->whereIn('prro_categorys.cat_id',$arr)
    //                     ->GroupBy('prro_categorys.pro_id')
    //                     ->select('prro_categorys.pro_id')
    //                     ->get();

    //        $proarr=[];

    //        for($i=0; $i<count($querys); $i++){

    //          array_push($proarr,$querys[$i]->pro_id);

    //        }

    //         $data['therapetic_category'] = ProductManage::where('t_cat_id',@$data['product']->t_cat_id)
    //         ->where('status','Active')
    //         // ->inRandomOrder()
    //         ->take(7)
    //         ->get()
    //         ->pluck('id');



    //         $data['therapetic_category'] = ProductManage::where('t_cat_id',@$data['product']->t_cat_id)
    //             ->where('status','Active')
    //             // ->inRandomOrder()
    //             ->take(7)
    //             ->get()
    //             ->pluck('id');

    //         $data['related_product'] = ProductManage::whereIn('id',@$data['therapetic_category'])->get();






    //     return view('fontend.single_page.single_product',$data);
    // }



    public function show($slug) {
        $footer2 = Menu::orderBy('sequence', 'ASC')
            ->where('footer2', 1)
            ->get();
        $top_header = Menu::orderBy('sequence', 'ASC')
            ->where('top_header', 1)
            ->get();
        $news = Post::where('slug', $slug)->first();

        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();
        $contact1 = Others::find(2);
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();

        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 3)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();
        return view('frontend/post.show', compact('objects2', 'footer2', 'top_header', 'contact2', 'headoffice', 'news', 'main', 'contact1', 'footer'));
    }

    public function Newsroom() {
        $sliders = Slider::all();
        $categories = Category::orderBy('id', 'DESC')->limit(2)->get();
        $video = video::orderBy('id', 'DESC')->limit(2)->get();
        $links = Link::all();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();

        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();
        $activity = Activity::orderBy('id', 'DESC')

            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $service = Service::orderBy('id', 'ASC')

            ->get();
        $news = News::orderBy('id', 'DESC')
            ->limit(7)
            ->get();
        $objects = Objects::orderBy('id', 'ASC')
            ->where('id', 1)
            ->get();
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();

        return view('frontend/news.all', compact('sliders', 'video', 'contact1', 'activity', 'service', 'categories', 'news', 'main', 'links', 'footer', 'objects', 'objects2', 'contact1', 'contact2', 'headoffice'));
    }
    public function Pipeline() {
        $sliders = Slider::all();
        $categories = Category::orderBy('id', 'DESC')->limit(2)->get();
        $video = video::orderBy('id', 'DESC')->limit(2)->get();
        $links = Link::all();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();

        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();
        $activity = Activity::orderBy('id', 'DESC')

            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $service = Service::orderBy('id', 'ASC')

            ->get();
        $news = News::orderBy('id', 'DESC')
            ->limit(7)
            ->get();
        $objects = Objects::orderBy('id', 'ASC')
            ->where('id', 1)
            ->get();
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();

        return view('frontend/home.Pipeline', compact('sliders', 'video', 'contact1', 'activity', 'service', 'categories', 'news', 'main', 'links', 'footer', 'objects', 'objects2', 'contact1', 'contact2', 'headoffice'));
    }
    public function Products() {
        $sliders = Slider::all();
        $categories = Category::orderBy('id', 'DESC')->limit(2)->get();
        $video = video::orderBy('id', 'DESC')->limit(2)->get();
        $links = Link::all();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();

        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();
        $activity = Activity::orderBy('id', 'DESC')

            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $service = Service::orderBy('id', 'ASC')

            ->get();
        $news = News::orderBy('id', 'DESC')
            ->limit(7)
            ->get();
        $objects = Objects::orderBy('id', 'ASC')
            ->where('id', 1)
            ->get();
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();

        return view('frontend/home.Products', compact('sliders', 'video', 'contact1', 'activity', 'service', 'categories', 'news', 'main', 'links', 'footer', 'objects', 'objects2', 'contact1', 'contact2', 'headoffice'));
    }

    public function SearchProduct(Request $request) {
        $sliders = Slider::all();
        $categories = Category::orderBy('id', 'DESC')->limit(2)->get();
        $video = Video::orderBy('id', 'DESC')->limit(2)->get();
        $links = Link::all();
        $main = Menu::orderBy('sequence', 'ASC')->where('display', 1)->get();
        $query = $request->input('query');

        // Perform the search query
        $products = Product::where('title', 'like', "%$query%")
            ->orWhere('gereric', 'like', "%$query%")
            ->orWhere('size', 'like', "%$query%")
            ->paginate(12);

        $footer = Menu::orderBy('sequence', 'ASC')->where('footer1', 1)->get();
        $activity = Activity::orderBy('id', 'DESC')->get();
        $contact1 = Others::orderBy('id', 'ASC')->where('id', 2)->get();
        $service = Service::orderBy('id', 'ASC')->get();
        $news = News::orderBy('id', 'DESC')->limit(7)->get();
        $objects = Objects::orderBy('id', 'ASC')->where('id', 1)->get();
        $objects2 = Objects::orderBy('id', 'ASC')->where('id', 2)->get();
        $contact2 = Others::orderBy('id', 'ASC')->where('id', 2)->get();
        $headoffice = Others::orderBy('id', 'ASC')->where('id', 4)->get();

        return view('frontend.home.SearchProduct', compact(
            'query', 'sliders', 'video', 'contact1', 'activity', 'service', 'categories',
            'news', 'main', 'links', 'footer', 'objects', 'objects2', 'contact2', 'headoffice', 'products'
        ));
    }

//    public function searchProductAjax(Request $request)
//    {
//        $query = $request->input('query');
//
//        $products = Product::where('name', 'LIKE', "%{$query}%")
//            ->orWhere('generic_name', 'LIKE', "%{$query}%")
//            ->orWhere('therapeutic_class', 'LIKE', "%{$query}%")
//            ->limit(5) // Limiting the number of results for better performance
//            ->get();
//        return response()->json($products);
//    }

    public function searchProductAjax(Request $request) {
        try {
            // Get the query string from the request
            $query = $request->input('query');

            // Check if the query is not empty
            if (!$query) {
                return response()->json([
                    'status'  => 'error',
                    'message' => 'Query is required',
                ], 400); // Bad request
            }

            // Fetch the products from the database with correct column names
            $products = Product::where('title', 'LIKE', "%{$query}%")
                ->orWhere('gereric', 'LIKE', "%{$query}%")
                ->orWhere('thereapeutic', 'LIKE', "%{$query}%")
                ->limit(20)
                ->get();

            // Return the results as JSON
            if ($products->isEmpty()) {
                return response()->json([
                    'status'  => 'no results',
                    'message' => 'No matching products found',
                ], 200);
            }

            return response()->json([
                'status'   => 'success',
                'products' => $products,
            ], 200);
        } catch (\Exception $e) {
            // Return the error message in case something goes wrong
            return response()->json([
                'status'  => 'error',
                'message' => 'Something went wrong. Please try again.',
                'error'   => $e->getMessage(),
            ], 500); // Internal server error
        }
    }

    public function CategoryProducts($id) {
        $sliders = Slider::all();
        $categories = Category::orderBy('id', 'DESC')->limit(2)->get();
        $video = video::orderBy('id', 'DESC')->limit(2)->get();
        $links = Link::all();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();

        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();
        $activity = Activity::orderBy('id', 'DESC')

            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $service = Service::orderBy('id', 'ASC')

            ->get();
        $news = News::orderBy('id', 'DESC')
            ->limit(7)
            ->get();
        $objects = Objects::orderBy('id', 'ASC')
            ->where('id', 1)
            ->get();
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();

        return view('frontend/home.CategoryProducts', compact('id', 'sliders', 'video', 'contact1', 'activity', 'service', 'categories', 'news', 'main', 'links', 'footer', 'objects', 'objects2', 'contact1', 'contact2', 'headoffice'));
    }

    public function Article() {
        $sliders = Slider::all();
        $categories = Category::orderBy('id', 'DESC')->limit(2)->get();
        $video = video::orderBy('id', 'DESC')->limit(2)->get();
        $links = Link::all();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();

        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();
        $activity = Activity::orderBy('id', 'DESC')

            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $service = Service::orderBy('id', 'ASC')

            ->get();
        $news = Article::orderBy('id', 'DESC')
            ->limit(7)
            ->get();
        $objects = Objects::orderBy('id', 'ASC')
            ->where('id', 1)
            ->get();
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();

        return view('frontend/article.all', compact('sliders', 'video', 'contact1', 'activity', 'service', 'categories', 'news', 'main', 'links', 'footer', 'objects', 'objects2', 'contact1', 'contact2', 'headoffice'));
    }

    public function day() {
        $sliders = Slider::all();
        $categories = Category::orderBy('id', 'DESC')->limit(2)->get();
        $video = video::orderBy('id', 'DESC')->limit(2)->get();
        $links = Link::all();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();

        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();
        $activity = Activity::orderBy('id', 'DESC')

            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $service = Service::orderBy('id', 'ASC')

            ->get();
        $news = News::orderBy('id', 'DESC')
            ->limit(7)
            ->get();
        $objects = Objects::orderBy('id', 'ASC')
            ->where('id', 1)
            ->get();
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();

        return view('frontend/home.day', compact('sliders', 'video', 'contact1', 'activity', 'service', 'categories', 'news', 'main', 'links', 'footer', 'objects', 'objects2', 'contact1', 'contact2', 'headoffice'));
    }

    public function About() {
        $sliders = Slider::all();
        $categories = Category::orderBy('id', 'DESC')->limit(2)->get();
        $video = video::orderBy('id', 'DESC')->limit(2)->get();
        $links = Link::all();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();

        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();
        $activity = Activity::orderBy('id', 'DESC')

            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $service = Service::orderBy('id', 'ASC')

            ->get();
        $news = News::orderBy('id', 'DESC')
            ->limit(7)
            ->get();
        $objects = Objects::orderBy('id', 'ASC')
            ->where('id', 1)
            ->get();
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        // $contact1  =   Others::orderBy('id','ASC')
        //     ->where('id',2)
        //     ->get();
        $contact1 = Others::find(2);
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();
        $footer2 = Menu::orderBy('sequence', 'ASC')
            ->where('footer2', 1)
            ->get();
        $top_header = Menu::orderBy('sequence', 'ASC')
            ->where('top_header', 1)
            ->get();

        return view('frontend/home.About', compact('footer2', 'top_header', 'sliders', 'video', 'contact1', 'activity', 'service', 'categories', 'news', 'main', 'links', 'footer', 'objects', 'objects2', 'contact1', 'contact2', 'headoffice'));
    }
    // public function DirectoreDetails($slug){
    //     $news = LifeMember::where('slug',$slug)->first();
    //     $sliders = Slider::all();
    //     $categories = Category::orderBy('id','DESC')->limit(2)->get();
    //     $video   =   video::orderBy('id','DESC')->limit(2)->get();
    //     $links  =   Link::all();
    //     $main   =   Menu::orderBy('sequence','ASC')
    //         ->where('display',1)
    //         ->get();

    //     $footer   =   Menu::orderBy('sequence','ASC')
    //         ->where('footer1',1)
    //         ->get();
    //     $activity   =   Activity::orderBy('id','DESC')

    //         ->get();
    //     $contact1  =   Others::orderBy('id','ASC')
    //         ->where('id',2)
    //         ->get();
    //     $service   =   Service::orderBy('id','ASC')

    //         ->get();
    //     $news   =   News::orderBy('id','DESC')
    //         ->limit(7)
    //         ->get();
    //     $objects  =   Objects::orderBy('id','ASC')
    //         ->where('id',1)
    //         ->get();
    //     $objects2  =   Objects::orderBy('id','ASC')
    //         ->where('id',2)
    //         ->get();
    //     // $contact1  =   Others::orderBy('id','ASC')
    //     //     ->where('id',2)
    //     //     ->get();
    //     $contact1  =   Others::find(2);
    //     $contact2  =   Others::orderBy('id','ASC')
    //         ->where('id',2)
    //         ->get();
    //     $headoffice  =   Others::orderBy('id','ASC')
    //         ->where('id',4)
    //         ->get();
    //         $footer2   =   Menu::orderBy('sequence','ASC')
    //         ->where('footer2',1)
    //         ->get();
    //     $top_header  =  Menu::orderBy('sequence','ASC')
    //         ->where('top_header',1)
    //         ->get();

    //     return view('frontend/service.details',compact('news','footer2','top_header','sliders','video','contact1','activity','service','categories','news','main','links','footer','objects','objects2','contact1','contact2','headoffice'));
    // }

    public function missionVission() {
        $sliders = Slider::all();
        $categories = Category::orderBy('id', 'DESC')->limit(2)->get();
        $video = video::orderBy('id', 'DESC')->limit(2)->get();
        $links = Link::all();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();

        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();
        $activity = Activity::orderBy('id', 'DESC')

            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $service = Service::orderBy('id', 'ASC')

            ->get();
        $news = News::orderBy('id', 'DESC')
            ->limit(7)
            ->get();
        $objects = Objects::orderBy('id', 'ASC')
            ->where('id', 1)
            ->get();
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        // $contact1  =   Others::orderBy('id','ASC')
        //     ->where('id',2)
        //     ->get();
        $about = Objects::find(4);

        $contact1 = Others::find(2);
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();
        $footer2 = Menu::orderBy('sequence', 'ASC')
            ->where('footer2', 1)
            ->get();
        $top_header = Menu::orderBy('sequence', 'ASC')
            ->where('top_header', 1)
            ->get();

        return view('frontend/company.mission_vission', compact('about', 'footer2', 'top_header', 'sliders', 'video', 'contact1', 'activity', 'service', 'categories', 'news', 'main', 'links', 'footer', 'objects', 'objects2', 'contact1', 'contact2', 'headoffice'));
    }

    public function history() {
        $sliders = Slider::all();
        $categories = Category::orderBy('id', 'DESC')->limit(2)->get();
        $video = video::orderBy('id', 'DESC')->limit(2)->get();
        $links = Link::all();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();

        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();
        $activity = Activity::orderBy('id', 'DESC')

            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $service = Service::orderBy('id', 'ASC')

            ->get();
        $news = News::orderBy('id', 'DESC')
            ->limit(7)
            ->get();
        $objects = Objects::orderBy('id', 'ASC')
            ->where('id', 1)
            ->get();
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        // $contact1  =   Others::orderBy('id','ASC')
        //     ->where('id',2)
        //     ->get();
        $about = Objects::find(4);

        $contact1 = Others::find(2);
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();
        $footer2 = Menu::orderBy('sequence', 'ASC')
            ->where('footer2', 1)
            ->get();
        $top_header = Menu::orderBy('sequence', 'ASC')
            ->where('top_header', 1)
            ->get();

        return view('frontend/company.history', compact('about', 'footer2', 'top_header', 'sliders', 'video', 'contact1', 'activity', 'service', 'categories', 'news', 'main', 'links', 'footer', 'objects', 'objects2', 'contact1', 'contact2', 'headoffice'));
    }

    public function message_chairperson() {
        $sliders = Slider::all();
        $categories = Category::orderBy('id', 'DESC')->limit(2)->get();
        $video = video::orderBy('id', 'DESC')->limit(2)->get();
        $links = Link::all();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();

        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();
        $activity = Activity::orderBy('id', 'DESC')

            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $service = Service::orderBy('id', 'ASC')

            ->get();
        $news = News::orderBy('id', 'DESC')
            ->limit(7)
            ->get();
        $objects = Objects::orderBy('id', 'ASC')
            ->where('id', 1)
            ->get();
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        // $contact1  =   Others::orderBy('id','ASC')
        //     ->where('id',2)
        //     ->get();
        $about = Objects::find(11);

        $contact1 = Others::find(2);
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();
        $footer2 = Menu::orderBy('sequence', 'ASC')
            ->where('footer2', 1)
            ->get();
        $top_header = Menu::orderBy('sequence', 'ASC')
            ->where('top_header', 1)
            ->get();

        return view('frontend/company.message_chairperson', compact('about', 'footer2', 'top_header', 'sliders', 'video', 'contact1', 'activity', 'service', 'categories', 'news', 'main', 'links', 'footer', 'objects', 'objects2', 'contact1', 'contact2', 'headoffice'));
    }
    public function message_managing_director() {
        $sliders = Slider::all();
        $categories = Category::orderBy('id', 'DESC')->limit(2)->get();
        $video = video::orderBy('id', 'DESC')->limit(2)->get();
        $links = Link::all();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();

        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();
        $activity = Activity::orderBy('id', 'DESC')

            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $service = Service::orderBy('id', 'ASC')

            ->get();
        $news = News::orderBy('id', 'DESC')
            ->limit(7)
            ->get();
        $objects = Objects::orderBy('id', 'ASC')
            ->where('id', 1)
            ->get();
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        // $contact1  =   Others::orderBy('id','ASC')
        //     ->where('id',2)
        //     ->get();
        $about = Objects::find(12);

        $contact1 = Others::find(2);
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();
        $footer2 = Menu::orderBy('sequence', 'ASC')
            ->where('footer2', 1)
            ->get();
        $top_header = Menu::orderBy('sequence', 'ASC')
            ->where('top_header', 1)
            ->get();

        return view('frontend/company.message_managing_director', compact('about', 'footer2', 'top_header', 'sliders', 'video', 'contact1', 'activity', 'service', 'categories', 'news', 'main', 'links', 'footer', 'objects', 'objects2', 'contact1', 'contact2', 'headoffice'));
    }

    public function message_dmd_ceo() {
        $sliders = Slider::all();
        $categories = Category::orderBy('id', 'DESC')->limit(2)->get();
        $video = video::orderBy('id', 'DESC')->limit(2)->get();
        $links = Link::all();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();

        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();
        $activity = Activity::orderBy('id', 'DESC')

            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $service = Service::orderBy('id', 'ASC')

            ->get();
        $news = News::orderBy('id', 'DESC')
            ->limit(7)
            ->get();
        $objects = Objects::orderBy('id', 'ASC')
            ->where('id', 1)
            ->get();
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        // $contact1  =   Others::orderBy('id','ASC')
        //     ->where('id',2)
        //     ->get();
        $about = Objects::find(13);

        $contact1 = Others::find(2);
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();
        $footer2 = Menu::orderBy('sequence', 'ASC')
            ->where('footer2', 1)
            ->get();
        $top_header = Menu::orderBy('sequence', 'ASC')
            ->where('top_header', 1)
            ->get();

        return view('frontend/company.message_dmd_ceo', compact('about', 'footer2', 'top_header', 'sliders', 'video', 'contact1', 'activity', 'service', 'categories', 'news', 'main', 'links', 'footer', 'objects', 'objects2', 'contact1', 'contact2', 'headoffice'));
    }
    public function Post() {
        $sliders = Slider::all();
        $categories = Category::orderBy('id', 'DESC')->limit(2)->get();
        $video = video::orderBy('id', 'DESC')->limit(2)->get();
        $links = Link::all();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();

        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();
        $activity = Activity::orderBy('id', 'DESC')

            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $service = Service::orderBy('id', 'ASC')

            ->get();
        $news = News::orderBy('id', 'DESC')
            ->limit(7)
            ->get();
        $objects = Objects::orderBy('id', 'ASC')
            ->where('id', 1)
            ->get();
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        // $contact1 = Others::orderBy('id', 'ASC')
        //     ->where('id', 2)
        //     ->get();
        $contact1 = Others::find(2);
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();
        $footer2 = Menu::orderBy('sequence', 'ASC')
            ->where('footer2', 1)
            ->get();
        $top_header = Menu::orderBy('sequence', 'ASC')
            ->where('top_header', 1)
            ->get();

        return view('frontend/home.Career', compact('sliders', 'footer2', 'top_header', 'video', 'activity', 'service', 'categories', 'news', 'main', 'links', 'footer', 'objects', 'objects2', 'contact1', 'headoffice'));
    }

    public function successapply() {
        $sliders = Slider::all();
        $categories = Category::orderBy('id', 'DESC')->limit(2)->get();
        $video = video::orderBy('id', 'DESC')->limit(2)->get();
        $links = Link::all();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();

        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();
        $activity = Activity::orderBy('id', 'DESC')

            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $service = Service::orderBy('id', 'ASC')

            ->get();
        $news = News::orderBy('id', 'DESC')
            ->limit(7)
            ->get();
        $objects = Objects::orderBy('id', 'ASC')
            ->where('id', 1)
            ->get();
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact1 = Others::find(2);
        // $contact2 = Others::orderBy('id', 'ASC')
        //     ->where('id', 2)
        //     ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();
        $footer2 = Menu::orderBy('sequence', 'ASC')
            ->where('footer2', 1)
            ->get();
        $top_header = Menu::orderBy('sequence', 'ASC')
            ->where('top_header', 1)
            ->get();

        return view('frontend/home.applicationsuccess', compact('sliders', 'footer2', 'top_header', 'video', 'contact1', 'activity', 'service', 'categories', 'news', 'main', 'links', 'footer', 'objects', 'objects2', 'contact1', 'headoffice'));
    }

    public function Global() {
        $sliders = Slider::all();
        $categories = Category::orderBy('id', 'DESC')->limit(2)->get();
        $video = video::orderBy('id', 'DESC')->limit(2)->get();
        $links = Link::all();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();

        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();
        $activity = Activity::orderBy('id', 'DESC')

            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $service = Service::orderBy('id', 'ASC')

            ->get();
        $news = News::orderBy('id', 'DESC')
            ->limit(7)
            ->get();
        $objects = Objects::orderBy('id', 'ASC')
            ->where('id', 1)
            ->get();
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact1 = Others::find(2);

        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();

        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();

        $footer2 = Menu::orderBy('sequence', 'ASC')
            ->where('footer2', 1)
            ->get();
        $top_header = Menu::orderBy('sequence', 'ASC')
            ->where('top_header', 1)
            ->get();

        return view('frontend/home.Global', compact('sliders', 'footer2', 'top_header', 'video', 'contact1', 'activity', 'service', 'categories', 'news', 'main', 'links', 'footer', 'objects', 'objects2', 'contact1', 'contact2', 'headoffice'));
    }

    public function Facilities() {
        $sliders = Slider::all();
        $categories = Category::orderBy('id', 'DESC')->limit(2)->get();
        $video = video::orderBy('id', 'DESC')->limit(2)->get();
        $links = Link::all();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();

        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();
        $activity = Activity::orderBy('id', 'DESC')

            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $service = Service::orderBy('id', 'ASC')

            ->get();
        $news = News::orderBy('id', 'DESC')
            ->limit(7)
            ->get();
        $objects = Objects::orderBy('id', 'ASC')
            ->where('id', 1)
            ->get();
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact1 = Others::find(2);
        // $contact2  =   Others::orderBy('id','ASC')
        //     ->where('id',2)
        //     ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();
        $footer2 = Menu::orderBy('sequence', 'ASC')
            ->where('footer2', 1)
            ->get();
        $top_header = Menu::orderBy('sequence', 'ASC')
            ->where('top_header', 1)
            ->get();

        return view('frontend/home.Facilities', compact('footer2', 'top_header', 'sliders', 'video', 'contact1', 'activity', 'service', 'categories', 'news', 'main', 'links', 'footer', 'objects', 'objects2', 'contact1', 'headoffice'));
    }

    public function Research() {
        $sliders = Slider::all();
        $categories = Category::orderBy('id', 'DESC')->limit(2)->get();
        $video = video::orderBy('id', 'DESC')->limit(2)->get();
        $links = Link::all();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();

        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();
        $activity = Activity::orderBy('id', 'DESC')

            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $service = Service::orderBy('id', 'ASC')

            ->get();
        $news = News::orderBy('id', 'DESC')
            ->limit(7)
            ->get();
        $objects = Objects::orderBy('id', 'ASC')
            ->where('id', 1)
            ->get();
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();

        return view('frontend/home.Research', compact('sliders', 'video', 'contact1', 'activity', 'service', 'categories', 'news', 'main', 'links', 'footer', 'objects', 'objects2', 'contact1', 'contact2', 'headoffice'));
    }

    public function Quality() {
        $sliders = Slider::all();
        $categories = Category::orderBy('id', 'DESC')->limit(2)->get();
        $video = video::orderBy('id', 'DESC')->limit(2)->get();
        $links = Link::all();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();

        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();
        $activity = Activity::orderBy('id', 'DESC')

            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $service = Service::orderBy('id', 'ASC')

            ->get();
        $news = News::orderBy('id', 'DESC')
            ->limit(7)
            ->get();
        $objects = Objects::orderBy('id', 'ASC')
            ->where('id', 1)
            ->get();
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();

        return view('frontend/home.Quality', compact('sliders', 'video', 'contact1', 'activity', 'service', 'categories', 'news', 'main', 'links', 'footer', 'objects', 'objects2', 'contact1', 'contact2', 'headoffice'));
    }

    public function lifemember() {
        $sliders = Slider::all();
        $categories = Category::orderBy('id', 'DESC')->limit(2)->get();
        $video = video::orderBy('id', 'DESC')->limit(2)->get();
        $links = LifeMember::all();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();

        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();
        $activity = Activity::orderBy('id', 'DESC')

            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $service = Service::orderBy('id', 'ASC')

            ->get();
        $news = News::orderBy('id', 'DESC')
            ->limit(7)
            ->get();
        $objects = Objects::orderBy('id', 'ASC')
            ->where('id', 1)
            ->get();
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();

        return view('frontend/home.lifemember', compact('sliders', 'video', 'contact1', 'activity', 'service', 'categories', 'news', 'main', 'links', 'footer', 'objects', 'objects2', 'contact1', 'contact2', 'headoffice'));
    }
    public function medical() {
        $news = News::orderBy('id', 'DESC')

            ->get();
        $publication = Publication::orderBy('id', 'DESC')

            ->get();

        $allnews = News::orderBy('id', 'DESC')

            ->get();
        $medicalslider = MedicalSlider::orderBy('id', 'ASC')
            ->get();
        $medicalfeature = MedicalFeature::orderBy('id', 'ASC')
            ->get();
        $medicalfeaturedata = MedicalFeature::orderBy('id', 'ASC')
            ->get();
        $articles = Service::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $prnews = Activity::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 3)
            ->get();
        $links = Link::all();
        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();
        return view('frontend/medical.all', compact('news', 'publication', 'medicalfeature', 'medicalfeaturedata', 'medicalslider', 'main', 'contact1', 'contact2', 'footer', 'articles', 'prnews', 'links', 'allnews'));
    }

    public function rangpur() {
        $news = News::orderBy('id', 'DESC')

            ->get();
        $publication = Publication::orderBy('id', 'DESC')

            ->get();

        $allnews = News::orderBy('id', 'DESC')

            ->get();
        $medicalslider = MicroSLider::orderBy('id', 'ASC')
            ->get();
        $medicalfeature = MecroFinance::orderBy('id', 'ASC')
            ->get();
        $medicalfeaturedata = MecroFinance::orderBy('id', 'ASC')
            ->get();
        $articles = Service::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $prnews = Activity::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 3)
            ->get();
        $links = Link::all();
        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        return view('frontend/micro.rangpur', compact('objects2', 'news', 'publication', 'medicalfeature', 'medicalfeaturedata', 'medicalslider', 'main', 'contact1', 'contact2', 'footer', 'articles', 'prnews', 'links', 'allnews'));
    }
    public function micro() {
        $news = News::orderBy('id', 'DESC')

            ->get();
        $publication = Publication::orderBy('id', 'DESC')

            ->get();

        $allnews = News::orderBy('id', 'DESC')

            ->get();
        $medicalslider = MicroSLider::orderBy('id', 'ASC')
            ->get();
        $medicalfeature = MecroFinance::orderBy('id', 'ASC')
            ->get();
        $medicalfeaturedata = MecroFinance::orderBy('id', 'ASC')
            ->get();
        $articles = Service::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $prnews = Activity::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 3)
            ->get();
        $links = Link::all();
        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        return view('frontend/micro.dhaka', compact('objects2', 'news', 'publication', 'medicalfeature', 'medicalfeaturedata', 'medicalslider', 'main', 'contact1', 'contact2', 'footer', 'articles', 'prnews', 'links', 'allnews'));
    }

    public function all_news() {
        $news = News::orderBy('id', 'DESC')

            ->get();
        $publication = Publication::orderBy('id', 'DESC')

            ->get();

        $allnews = News::orderBy('id', 'DESC')

            ->get();

        $articles = Service::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $prnews = Activity::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();
        $contact1 = Others::find(2);
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 3)
            ->get();
        $links = Link::all();
        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();

        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $footer2 = Menu::orderBy('sequence', 'ASC')
            ->where('footer2', 1)
            ->get();
        $top_header = Menu::orderBy('sequence', 'ASC')
            ->where('top_header', 1)
            ->get();

        return view('frontend/news.all', compact('news', 'objects2', 'top_header', 'footer2', 'publication', 'main', 'contact1', 'contact2', 'footer', 'articles', 'prnews', 'links', 'allnews'));
    }

    public function all_notice() {
        $news = Service::orderBy('id', 'DESC')

            ->get();
        $publication = Publication::orderBy('id', 'DESC')

            ->get();

        $allnews = News::orderBy('id', 'DESC')

            ->get();

        $articles = Service::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $prnews = Activity::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 3)
            ->get();
        $links = Link::all();
        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();

        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();

        return view('frontend/service.all', compact('news', 'objects2', 'publication', 'main', 'contact1', 'contact2', 'footer', 'articles', 'prnews', 'links', 'allnews'));
    }

    public function districtcommittee() {
        $news = News::orderBy('id', 'DESC')

            ->get();
        $publication = Publication::orderBy('id', 'DESC')

            ->get();

        $allnews = News::orderBy('id', 'DESC')

            ->get();

        $articles = Service::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $prnews = Activity::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 3)
            ->get();
        $links = Link::all();
        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();

        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();

        return view('frontend/member.districtcommittee', compact('news', 'objects2', 'publication', 'main', 'contact1', 'contact2', 'footer', 'articles', 'prnews', 'links', 'allnews'));
    }

    public function need_help() {
        $news = News::orderBy('id', 'DESC')

            ->get();
        $publication = Publication::orderBy('id', 'DESC')

            ->get();

        $allnews = News::orderBy('id', 'DESC')

            ->get();

        $articles = Service::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $prnews = Activity::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 3)
            ->get();
        $links = Link::all();
        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();

        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();

        return view('frontend/need.help', compact('news', 'objects2', 'publication', 'main', 'contact1', 'contact2', 'footer', 'articles', 'prnews', 'links', 'allnews'));
    }

    public function memberlist() {
        $news = News::orderBy('id', 'DESC')

            ->get();
        $publication = Publication::orderBy('id', 'DESC')

            ->get();

        $allnews = News::orderBy('id', 'DESC')

            ->get();

        $articles = Service::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $prnews = Activity::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 3)
            ->get();
        $links = Link::all();
//        $team  =   Team::where('Approved','1')->all();
        $team = Team::orderBy('id', 'ASC')
            ->where('Approved', 1)
            ->get();
        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();

        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();

        return view('frontend/member.list', compact('team', 'news', 'objects2', 'publication', 'main', 'contact1', 'contact2', 'footer', 'articles', 'prnews', 'links', 'allnews'));
    }

    public function reportsearch(Request $request) {

        $news = News::orderBy('id', 'DESC')

            ->get();
        $publication = Publication::orderBy('id', 'DESC')

            ->get();

        $allnews = News::orderBy('id', 'DESC')

            ->get();

        $articles = Service::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $prnews = Activity::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 3)
            ->get();
        $links = Link::all();
//        $team  =   Team::where('Approved','1')->all();
        $team = Team::orderBy('id', 'ASC')
            ->where('Approved', 1)
            ->get();
        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();

        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        //$search =   $request->get('name');
        $ratings = Team::orderBy('id', 'ASC')
            ->where('Name', $request->name)
            ->orwhere('MobileNo', $request->mobile_no)
            ->get();

        return view('frontend/member.reportsearch', compact('ratings', 'team', 'news', 'objects2', 'publication', 'main', 'contact1', 'contact2', 'footer', 'articles', 'prnews', 'links', 'allnews'));
    }

    public function famous() {
        $news = News::orderBy('id', 'DESC')

            ->get();
        $publication = Publication::orderBy('id', 'DESC')

            ->get();

        $allnews = News::orderBy('id', 'DESC')

            ->get();

        $articles = Service::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $prnews = Activity::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 3)
            ->get();
        $links = Link::all();
//        $team  =   Team::where('Approved','1')->all();
        $team = Team::orderBy('id', 'ASC')
            ->where('Approved', 1)
            ->get();
        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();

        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();

        return view('frontend/member.famous', compact('team', 'news', 'objects2', 'publication', 'main', 'contact1', 'contact2', 'footer', 'articles', 'prnews', 'links', 'allnews'));
    }

    public function memberdetails($slug) {
        $teamdetails = Team::where('slug', $slug)->first();
        $news = News::orderBy('id', 'DESC')

            ->get();
        $publication = Publication::orderBy('id', 'DESC')

            ->get();

        $allnews = News::orderBy('id', 'DESC')

            ->get();

        $articles = Service::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $prnews = Activity::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 3)
            ->get();
        $links = Link::all();
        $team = Team::all();
        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();

        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();

        return view('frontend/member.details', compact('teamdetails', 'team', 'news', 'objects2', 'publication', 'main', 'contact1', 'contact2', 'footer', 'articles', 'prnews', 'links', 'allnews'));
    }

    public function committeedetails($slug) {
        $slug = $slug;
        $teamdetails = Team::where('slug', $slug)->first();
        $news = News::orderBy('id', 'DESC')

            ->get();
        $publication = Publication::orderBy('id', 'DESC')

            ->get();

        $allnews = News::orderBy('id', 'DESC')

            ->get();

        $articles = Service::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $prnews = Activity::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 3)
            ->get();
        $links = Link::all();
        $team = Team::all();
        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();

        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();

        return view('frontend/member.committeedetails', compact('slug', 'teamdetails', 'team', 'news', 'objects2', 'publication', 'main', 'contact1', 'contact2', 'footer', 'articles', 'prnews', 'links', 'allnews'));
    }

    public function memberform() {
        $news = News::orderBy('id', 'DESC')

            ->get();
        $publication = Publication::orderBy('id', 'DESC')

            ->get();

        $allnews = News::orderBy('id', 'DESC')

            ->get();

        $articles = Service::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $prnews = Activity::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 3)
            ->get();
        $links = Link::all();
        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();

        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();

        return view('frontend/member.form', compact('news', 'objects2', 'publication', 'main', 'contact1', 'contact2', 'footer', 'articles', 'prnews', 'links', 'allnews'));
    }

    public function team() {
        $news = News::orderBy('id', 'DESC')

            ->get();
        $company = CompanyManagement::orderBy('id', 'ASC')

            ->get();
        $team = Team::orderBy('id', 'ASC')
            ->where('type', 'Main')
            ->get();
        $micro = Team::orderBy('id', 'ASC')
            ->where('type', 'Microfinance')
            ->get();
        $medical = Team::orderBy('id', 'ASC')
            ->where('type', 'Medical')
            ->get();

        $companydata = CompanyManagement::orderBy('id', 'ASC')

            ->get();
        $allnews = News::orderBy('id', 'DESC')

            ->get();

        $articles = Service::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $prnews = Activity::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 3)
            ->get();
        $objects3 = Objects::orderBy('id', 'ASC')
            ->where('id', 3)
            ->get();

        $links = Link::all();
        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();
        return view('frontend/team.all', compact('news', 'company', 'team', 'micro', 'medical', 'companydata', 'objects3', 'main', 'contact1', 'contact2', 'footer', 'articles', 'prnews', 'links', 'allnews'));
    }

    public function previous() {
        $news = News::orderBy('id', 'DESC')

            ->get();
        $company = CompanyManagement::orderBy('id', 'ASC')

            ->get();
        $team = Team::orderBy('id', 'ASC')
            ->where('type', 'Main')
            ->get();
        $previous = PreviousProgram::orderBy('id', 'ASC')

            ->get();
        $medical = Team::orderBy('id', 'ASC')
            ->where('type', 'Medical')
            ->get();

        $companydata = CompanyManagement::orderBy('id', 'ASC')

            ->get();
        $allnews = News::orderBy('id', 'DESC')

            ->get();

        $articles = Service::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $prnews = Activity::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 3)
            ->get();
        $objects3 = Objects::orderBy('id', 'ASC')
            ->where('id', 3)
            ->get();

        $links = Link::all();
        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();
        return view('frontend/previous.all', compact('news', 'company', 'team', 'previous', 'medical', 'companydata', 'objects3', 'main', 'contact1', 'contact2', 'footer', 'articles', 'prnews', 'links', 'allnews'));
    }

    public function executive() {
        $news = News::orderBy('id', 'DESC')

            ->get();
        $company = CompanyManagement::orderBy('id', 'ASC')

            ->get();
        $companydata = CompanyManagement::orderBy('id', 'ASC')

            ->get();
        $allnews = News::orderBy('id', 'DESC')

            ->get();

        $articles = Service::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $prnews = Activity::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();
        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 3)
            ->get();
        $objects3 = Objects::orderBy('id', 'ASC')
            ->where('id', 3)
            ->get();

        $links = Link::all();
        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();
        return view('frontend/company.all', compact('news', 'company', 'companydata', 'objects3', 'main', 'contact1', 'contact2', 'footer', 'articles', 'prnews', 'links', 'allnews'));
    }

    public function initative() {
        $articles = Service::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $initative = Activity::orderBy('id', 'ASC')
            ->limit(3)
            ->get();
        $allprnews = Activity::orderBy('id', 'DESC')

            ->get();

        $main = Menu::orderBy('sequence', 'DESC')
            ->where('display', 1)
            ->get();
        $links = Link::all();
        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();

        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 3)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();

        return view('frontend/initiative.all', compact('initative', 'main', 'footer', 'articles', 'allprnews', 'links', 'contact1', 'contact2', 'headoffice'));
    }

    public function invoice($slug) {

        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();

        $invoice = Dmcday::where('random', $slug)->first();
        $articles = Service::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $initative = Activity::orderBy('id', 'ASC')
            ->limit(3)
            ->get();
        $allprnews = Activity::orderBy('id', 'DESC')
            ->get();

        $main = Menu::orderBy('sequence', 'DESC')
            ->where('display', 1)
            ->get();
        $links = Link::all();
        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();

        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 3)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();

        return view('frontend/home.invoice', compact('objects2', 'invoice', 'initative', 'main', 'footer', 'articles', 'allprnews', 'links', 'contact1', 'contact2', 'headoffice'));
    }

    public function ticket($slug) {
        $invoice = Dmcday::where('random', $slug)->where('display', 1)->first();
        $articles = Service::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $initative = Activity::orderBy('id', 'ASC')
            ->limit(3)
            ->get();
        $allprnews = Activity::orderBy('id', 'DESC')
            ->get();

        $main = Menu::orderBy('sequence', 'DESC')
            ->where('display', 1)
            ->get();
        $links = Link::all();
        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();

        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 3)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();

//        return view('frontend/home.ticket',compact('invoice','initative','main','footer','articles','allprnews','links','contact1','contact2','headoffice'));

//        $pdf = new Dompdf();
//        $pdf->loadHtml(View::make('frontend.home.ticket', compact('main'))->render());
//        $pdf->setPaper('A4', 'portrait');
//        $pdf->render();
//        return $pdf->stream();

//        $pdf = new Dompdf();
//        $pdf->loadHtml(View::make('frontend.home.ticket', compact('main'))->render());
//        $pdf->setPaper('A4', 'portrait');
//        $pdf->render();
//        $response = $pdf->output();
//        $response->header('Content-Type', 'application/pdf');
//        return $response;

        $pdf = new Dompdf();
        $pdf->loadHtml(View::make('frontend.home.ticket', compact('invoice'))->render());
        $pdf->setPaper('A4', 'portrait');
        $pdf->render();

        $pdfContent = $pdf->output();
        $response = response($pdfContent)->header('Content-Type', 'application/pdf')->header('Content-Disposition', 'inline');

        return $response;
    }

    public function career() {
        $career = Post::orderBy('id', 'DESC')

            ->get();
        $initative = Activity::orderBy('id', 'ASC')
            ->limit(3)
            ->get();
        $allprnews = Activity::orderBy('id', 'DESC')

            ->get();

        $main = Menu::orderBy('sequence', 'DESC')
            ->where('display', 1)
            ->get();
        $links = Link::all();
        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();

        $contact1 = Others::find(2);
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 3)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();
        $footer2 = Menu::orderBy('sequence', 'ASC')
            ->where('footer2', 1)
            ->get();
        $top_header = Menu::orderBy('sequence', 'ASC')
            ->where('top_header', 1)
            ->get();

        return view('frontend/career.all', compact('initative', 'footer2', 'top_header', 'main', 'footer', 'career', 'allprnews', 'links', 'contact1', 'contact2', 'headoffice'));
    }

    public function contact() {
        $career = Service::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $contactus = ContactUs::orderBy('id', 'DESC')

            ->get();
        $initative = Activity::orderBy('id', 'ASC')
            ->limit(3)
            ->get();
        $allprnews = Activity::orderBy('id', 'DESC')

            ->get();

        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();
        $links = Link::all();
        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();

        $contact1 = Others::find(2);
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();
        $factory = Others::orderBy('id', 'ASC')
            ->where('id', 5)
            ->get();

        $branch1 = Others::orderBy('id', 'ASC')
            ->where('id', 6)
            ->get();
        $branch2 = Others::orderBy('id', 'ASC')
            ->where('id', 7)
            ->get();
        $branch3 = Others::orderBy('id', 'ASC')
            ->where('id', 8)
            ->get();
        $branch4 = Others::orderBy('id', 'ASC')
            ->where('id', 9)
            ->get();
        $it = Others::orderBy('id', 'ASC')
            ->where('id', 10)
            ->get();
        $objects = Objects::orderBy('id', 'ASC')
            ->where('id', 1)
            ->get();
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $footer2 = Menu::orderBy('sequence', 'ASC')
            ->where('footer2', 1)
            ->get();
        $top_header = Menu::orderBy('sequence', 'ASC')
            ->where('top_header', 1)
            ->get();

        $num1 = rand(1, 10);
        $num2 = rand(1, 10);
        $operation = rand(0, 1) == 0 ? 'addition' : 'multiplication'; // Randomly choose between addition and multiplication

        if ($operation == 'addition') {
            $expectedResult = $num1 + $num2;
            $captchaQuestion = "$num1 + $num2 = ?";
        } else {
            $expectedResult = $num1 * $num2;
            $captchaQuestion = "$num1 * $num2 = ?";
        }

        session()->put('captcha_result', $expectedResult);

        return view('frontend/contact.all', compact('captchaQuestion', 'footer2', 'top_header', 'objects', 'objects2', 'initative', 'main', 'contactus', 'footer', 'career', 'allprnews', 'links', 'contact1', 'contact2', 'headoffice', 'factory', 'branch1', 'branch2', 'branch3', 'branch4', 'it'));
    }

    public function success($slug) {
        $invoice = Dmcday::where('random', $slug)->first();
        $articles = Service::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $initative = Activity::orderBy('id', 'ASC')
            ->limit(3)
            ->get();
        $allprnews = Activity::orderBy('id', 'DESC')
            ->get();

        $main = Menu::orderBy('sequence', 'DESC')
            ->where('display', 1)
            ->get();
        $links = Link::all();
        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();

        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 3)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();

        return view('frontend/home.success', compact('invoice', 'initative', 'main', 'footer', 'articles', 'allprnews', 'links', 'contact1', 'contact2', 'headoffice'));
    }

    public function success2($slug) {
        $invoice = Dmcday::where('random', $slug)->first();
        $articles = Service::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $initative = Activity::orderBy('id', 'ASC')
            ->limit(3)
            ->get();
        $allprnews = Activity::orderBy('id', 'DESC')
            ->get();

        $main = Menu::orderBy('sequence', 'DESC')
            ->where('display', 1)
            ->get();
        $links = Link::all();
        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();

        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 3)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();

        return redirect(route('dmcday.create', compact('invoice', 'initative', 'main', 'footer', 'articles', 'allprnews', 'links', 'contact1', 'contact2', 'headoffice')));
    }

    public function successmessage() {
        $career = Service::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $contactus = ContactUs::orderBy('id', 'DESC')

            ->get();
        $initative = Activity::orderBy('id', 'ASC')
            ->limit(3)
            ->get();
        $allprnews = Activity::orderBy('id', 'DESC')

            ->get();

        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();
        $links = Link::all();
        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();

        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();
        $factory = Others::orderBy('id', 'ASC')
            ->where('id', 5)
            ->get();

        $branch1 = Others::orderBy('id', 'ASC')
            ->where('id', 6)
            ->get();
        $branch2 = Others::orderBy('id', 'ASC')
            ->where('id', 7)
            ->get();
        $branch3 = Others::orderBy('id', 'ASC')
            ->where('id', 8)
            ->get();
        $branch4 = Others::orderBy('id', 'ASC')
            ->where('id', 9)
            ->get();
        $it = Others::orderBy('id', 'ASC')
            ->where('id', 10)
            ->get();
        $objects = Objects::orderBy('id', 'ASC')
            ->where('id', 1)
            ->get();
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();

        return view('frontend/home.successmessage', compact('objects', 'objects2', 'initative', 'main', 'contactus', 'footer', 'career', 'allprnews', 'links', 'contact1', 'contact2', 'headoffice', 'factory', 'branch1', 'branch2', 'branch3', 'branch4', 'it'));
    }
    public function failed() {
        $career = Service::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $contactus = ContactUs::orderBy('id', 'DESC')

            ->get();
        $initative = Activity::orderBy('id', 'ASC')
            ->limit(3)
            ->get();
        $allprnews = Activity::orderBy('id', 'DESC')

            ->get();

        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();
        $links = Link::all();
        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();

        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();
        $factory = Others::orderBy('id', 'ASC')
            ->where('id', 5)
            ->get();

        $branch1 = Others::orderBy('id', 'ASC')
            ->where('id', 6)
            ->get();
        $branch2 = Others::orderBy('id', 'ASC')
            ->where('id', 7)
            ->get();
        $branch3 = Others::orderBy('id', 'ASC')
            ->where('id', 8)
            ->get();
        $branch4 = Others::orderBy('id', 'ASC')
            ->where('id', 9)
            ->get();
        $it = Others::orderBy('id', 'ASC')
            ->where('id', 10)
            ->get();
        $objects = Objects::orderBy('id', 'ASC')
            ->where('id', 1)
            ->get();
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();

        return view('frontend/home.failed', compact('objects', 'objects2', 'initative', 'main', 'contactus', 'footer', 'career', 'allprnews', 'links', 'contact1', 'contact2', 'headoffice', 'factory', 'branch1', 'branch2', 'branch3', 'branch4', 'it'));
    }

    public function contactmail(Request $request) {
        // Validate form fields including the captcha
        $data = $request->validate([
            'name'                 => 'required',

            'email'                => 'required|email',
            'phone'                => 'required',
            'country'              => 'required',
            //'product_trade_name' => 'required',
            'question'             => 'required',
            //'captcha' => 'required|numeric', // Ensure CAPTCHA is provided and is a number
            'g-recaptcha-response' => 'required|captcha',
        ]);

        // Retrieve the expected captcha result from the session
        //$captchaResult = session()->get('captcha_result');

        // Check if the provided CAPTCHA is correct
        // if ($request->input('captcha') != $captchaResult) {
        //     return back()->withErrors(['captcha' => 'Incorrect CAPTCHA answer. Please try again.'])->withInput();
        // }

        // Send the email if CAPTCHA is correct
        Mail::to('info@zahid.com.bd')->send(new ContactFormMail($data));

        // Redirect back to the contact page with a success message
        return redirect('contact')->with('success', 'Your message has been sent successfully.');
    }

    public function apply(Request $request) {
        $this->validate($request, [
            'name'  => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png,pdf|max:2048',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->name);
        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!file_exists('uploads/application')) {
                mkdir('uploads/application', 0777, true);
            }
            $image->move('uploads/application', $imagename);
        } else {
            $imagename = 'dafault.png';
        }

        $news = new Application();
        $news->name = $request->name;
        $news->email = $request->email;
        $news->post_id = $request->post_id;
        $news->postname = $request->postname;
        $news->subject = $request->subject;
        $news->phone = $request->phone;
        $news->image = $imagename;
        $news->save();
        return redirect()->route('Career.success')->with('successMsg', 'Application Have Been Submitted Successfully');
        // return redirect()->back()->with('successMsg', 'Application Have Been Submitted Successfully');
    }

    public function dmcday(Request $request) {

        $this->validate($request, [
            'name' => 'required',
        ]);

//        $slug = str_slug($request->title);
        $needhelp = Dmcday::create();
        $needhelp->name = $request->name;
        $needhelp->mobile = $request->mobile;
        $needhelp->email = $request->email;
        $needhelp->gender = $request->gender;
        $needhelp->address = $request->address;
        $needhelp->size = $request->size;
        $needhelp->batch = $request->batch;
        $needhelp->acoompany = $request->acoompany;

        $needhelp->acoompanytype = $request->acoompanytype;
        $needhelp->belowperson = $request->belowperson;
        $needhelp->aboveperson = $request->aboveperson;

        $needhelp->btprice = $request->btprice;
        $needhelp->currentdesignation = $request->currentdesignation;
        $needhelp->game = $request->game;
        $needhelp->lifemember = $request->lifemember;
        $needhelp->lifeno = $request->lifeno;

        if ($request->acoompany == "Yes") {
            $needhelp->spouse = $request->spouse;
            $needhelp->free = $request->free;
            $needhelp->plus10 = $request->plus10;
        }

        $insertedId = $needhelp->id;

        $randomNumber = random_int(100, 999);
        $dmcCode = $insertedId . $randomNumber;
        $needhelp->random = $dmcCode;

        $needhelp->save();
        return redirect()->route('dmc.invoice', $dmcCode)->with('successMsg', 'Your Request Has Benn Successfully Submitted!');
    }

    // public function dmcpay(Request $request)
    // {

    //     $data = request()->validate([
    //         'name' => 'required',
    //         'email' => 'required',
    //         'random' => 'required'
    //     ]);
    //     $random = $request->random;
    //     $needhelp = Dmcday::where('random', $random)->first();
    //     $needhelp->display = 1;
    //     $needhelp->save();
    //     Mail::to($request->email)->send(new DmcMail($data));
    //     return redirect()->route('dmc.successmessage')->with('successMsg','Your Request Has Benn Successfully Submitted!');
    // }

    public function dmcpay(Request $request) {
        $career = Service::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $contactus = ContactUs::orderBy('id', 'DESC')

            ->get();
        $initative = Activity::orderBy('id', 'ASC')
            ->limit(3)
            ->get();
        $allprnews = Activity::orderBy('id', 'DESC')

            ->get();

        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();
        $links = Link::all();
        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();

        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();
        $factory = Others::orderBy('id', 'ASC')
            ->where('id', 5)
            ->get();

        $branch1 = Others::orderBy('id', 'ASC')
            ->where('id', 6)
            ->get();
        $branch2 = Others::orderBy('id', 'ASC')
            ->where('id', 7)
            ->get();
        $branch3 = Others::orderBy('id', 'ASC')
            ->where('id', 8)
            ->get();
        $branch4 = Others::orderBy('id', 'ASC')
            ->where('id', 9)
            ->get();
        $it = Others::orderBy('id', 'ASC')
            ->where('id', 10)
            ->get();
        $objects = Objects::orderBy('id', 'ASC')
            ->where('id', 1)
            ->get();
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();

        $data = request()->validate([
            'name'   => 'required',
            'email'  => 'required',
            'random' => 'required',
        ]);
        $random = $request->random;
        $needhelp = Dmcday::where('random', $random)->first();
        $needhelp->display = 1;
        $needhelp->save();
        Mail::to($request->email)->send(new DmcMail($data));
//        return redirect()->route('dmc.successmessage')->with('successMsg','Your Request Has Benn Successfully Submitted!');

        return view('frontend/home.successmessage', compact('random', 'objects', 'objects2', 'initative', 'main', 'contactus', 'footer', 'career', 'allprnews', 'links', 'contact1', 'contact2', 'headoffice', 'factory', 'branch1', 'branch2', 'branch3', 'branch4', 'it'));

    }

    public function shurjopaysubmission(Request $request) {

        $shurjopay_service = new ShurjopayController();
//        $tx_id = $shurjopay_service->generateTxId();
        $type = 'nonsubfee';
        $info = array('currency' => "BDT", 'amount' => $request->amount, 'order_id' => "$request->random", 'discsount_amount' => '', 'disc_percent' => '', 'client_ip' => "", 'customer_name' => $request->name, 'customer_phone' => $request->mobile, 'email' => $request->email, 'customer_address' => "$request->batch", 'customer_city' => "Dhaka", 'customer_state' => "Dhaka", 'customer_postcode' => "1212", 'customer_country' => "Bangladesh", 'value1' => "nonrenew", 'value2' => "$request->mobile", 'value3' => "$request->mobile", 'value4' => "$request->mobile");
        $shurjopay_service = new ShurjopayController();
        return $shurjopay_service->checkout($info);
    }

    public function helpform(Request $request) {

        $this->validate($request, [
            'fname' => 'required',

        ]);

//        $slug = str_slug($request->title);
        $needhelp = new NeedHelp();
        $needhelp->name = $request->name;
        $needhelp->lname = $request->lname;
        $needhelp->email = $request->email;
        $needhelp->phone = $request->phone;
        $needhelp->address = $request->address;
        $needhelp->message = $request->message;

        $needhelp->save();
        return redirect()->route('need.help')->with('successMsg', 'Your Request Has Benn Successfully Submitted!');

    }

    public function payment_response() {
        $shurjopay_service = new ShurjopayController();
        $actual_link = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        $query_str = parse_url($actual_link, PHP_URL_QUERY);
        parse_str($query_str, $query_params);
        $orderid = $query_params['order_id'];
        $response = $shurjopay_service->verify($orderid);
//       dd($response);

        $decryptValues = json_decode($response);
        $status = $decryptValues[0]->sp_code;

        $value1 = $decryptValues[0]->value1;

        $payable_amount = $decryptValues[0]->payable_amount;
        $recived_amount = $decryptValues[0]->recived_amount;

        if ($value1 == 'nonrenew') {

            $userid = $decryptValues[0]->customer_order_id;
            $subscriptionid = $decryptValues[0]->value3;
            $name = $decryptValues[0]->name;
            $email = $decryptValues[0]->value4;
            $year = $decryptValues[0]->value2;
            $subscriber_number = $decryptValues[0]->address;
            $amount = $decryptValues[0]->amount;
            $invoice_no = $decryptValues[0]->invoice_no;

            if ($status == '1000') {
                if ($payable_amount == $recived_amount) {
                    return redirect(route('dmc.success', ['random' => $userid]));
                    die();
                } else {
                    return redirect(route('dmc.success', ['random' => $userid]));
                    //return redirect(route('dmc.failed'));
                    die();
                }
            } else {

                return redirect(route('dmc.failed'));
                die();
            }
        }

    }

    public function memberformstore(Request $request) {

        $this->validate($request, [
            'Name'  => 'required',
            'image' => 'mimes:jpeg,jpg,bmp,png',
        ]);
        $image = $request->file('image');
        $slug = str_slug($request->Name);
        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imagename = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();
            if (!file_exists('uploads/team')) {
                mkdir('uploads/team', 0777, true);
            }
            $image->move('uploads/team', $imagename);
        } else {
            $imagename = 'dafault.png';
        }

//        $slug = str_slug($request->title);
        $needhelp = new Team();
        $needhelp->Name = $request->Name;
        $needhelp->FatherMotherHusband = $request->FatherMotherHusband;
        $needhelp->Age = $request->Age;
        $needhelp->Occupation = $request->Occupation;
        $needhelp->EducationQuali = $request->EducationQuali;
        $needhelp->districtId = $request->districtId;
        $needhelp->VillageHome = $request->VillageHome;
        $needhelp->UnionMunicipality = $request->UnionMunicipality;
        $needhelp->ThanaUpazila = $request->ThanaUpazila;
        $needhelp->NID = $request->NID;
        $needhelp->MobileNo = $request->MobileNo;
        $needhelp->Email = $request->Email;
        $needhelp->Yes = $request->Yes;
        $needhelp->past = $request->past;
        $needhelp->slug = $slug;

        $needhelp->image = $imagename;

        $needhelp->save();
        return redirect()->route('member.form')->with('successMsg', 'Your Request Has Benn Successfully Submitted!');

    }

    public function category() {
        $career = Service::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $initative = Activity::orderBy('id', 'ASC')
            ->limit(3)
            ->get();
        $category = Category::orderBy('id', 'ASC')
            ->get();

        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();
        $links = Link::all();
        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();

        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 3)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();
        $factory = Others::orderBy('id', 'ASC')
            ->where('id', 5)
            ->get();

        $branch1 = Others::orderBy('id', 'ASC')
            ->where('id', 6)
            ->get();
        $branch2 = Others::orderBy('id', 'ASC')
            ->where('id', 7)
            ->get();
        $branch3 = Others::orderBy('id', 'ASC')
            ->where('id', 8)
            ->get();
        $branch4 = Others::orderBy('id', 'ASC')
            ->where('id', 9)
            ->get();
        $it = Others::orderBy('id', 'ASC')
            ->where('id', 10)
            ->get();
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();

        return view('frontend/category.all', compact('objects2', 'initative', 'main', 'footer', 'career', 'category', 'links', 'contact1', 'contact2', 'headoffice', 'factory', 'branch1', 'branch2', 'branch3', 'branch4', 'it'));
    }

    public function video() {
        $career = Service::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $initative = Activity::orderBy('id', 'ASC')
            ->limit(3)
            ->get();
        $category = Category::orderBy('id', 'DESC')
            ->get();

        $main = Menu::orderBy('sequence', 'DESC')
            ->where('display', 1)
            ->get();
        $links = Link::all();
        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();

        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 3)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();
        $factory = Others::orderBy('id', 'ASC')
            ->where('id', 5)
            ->get();

        $branch1 = Others::orderBy('id', 'ASC')
            ->where('id', 6)
            ->get();
        $branch2 = Others::orderBy('id', 'ASC')
            ->where('id', 7)
            ->get();
        $branch3 = Others::orderBy('id', 'ASC')
            ->where('id', 8)
            ->get();
        $branch4 = Others::orderBy('id', 'ASC')
            ->where('id', 9)
            ->get();
        $it = Others::orderBy('id', 'ASC')
            ->where('id', 10)
            ->get();
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();

        $video = video::orderBy('id', 'ASC')
            ->get();

        return view('frontend/video.all', compact('video', 'objects2', 'initative', 'main', 'footer', 'career', 'category', 'links', 'contact1', 'contact2', 'headoffice', 'factory', 'branch1', 'branch2', 'branch3', 'branch4', 'it'));
    }

    public function item($id) {
        $category = Category::where('id', $id)->first();

        $career = Service::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $initative = Activity::orderBy('id', 'ASC')
            ->limit(3)
            ->get();
        $item = Item::orderBy('id', 'DESC')
            ->where('category_id', $id)
            ->get();

        $main = Menu::orderBy('sequence', 'DESC')
            ->where('display', 1)
            ->get();
        $links = Link::all();
        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();

        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 3)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();
        $factory = Others::orderBy('id', 'ASC')
            ->where('id', 5)
            ->get();

        $branch1 = Others::orderBy('id', 'ASC')
            ->where('id', 6)
            ->get();
        $branch2 = Others::orderBy('id', 'ASC')
            ->where('id', 7)
            ->get();
        $branch3 = Others::orderBy('id', 'ASC')
            ->where('id', 8)
            ->get();
        $branch4 = Others::orderBy('id', 'ASC')
            ->where('id', 9)
            ->get();
        $it = Others::orderBy('id', 'ASC')
            ->where('id', 10)
            ->get();
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();

        return view('frontend/item.all', compact('objects2', 'category', 'initative', 'main', 'footer', 'career', 'item', 'links', 'contact1', 'contact2', 'headoffice', 'factory', 'branch1', 'branch2', 'branch3', 'branch4', 'it'));
    }
    public function product_details($slug) {
        $product = Product::where('slug', $slug)->first();

        $career = Service::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $initative = Activity::orderBy('id', 'ASC')
            ->limit(3)
            ->get();

        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();
        $links = Link::all();
        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();

        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 3)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();
        $factory = Others::orderBy('id', 'ASC')
            ->where('id', 5)
            ->get();

        $branch1 = Others::orderBy('id', 'ASC')
            ->where('id', 6)
            ->get();
        $branch2 = Others::orderBy('id', 'ASC')
            ->where('id', 7)
            ->get();
        $branch3 = Others::orderBy('id', 'ASC')
            ->where('id', 8)
            ->get();
        $branch4 = Others::orderBy('id', 'ASC')
            ->where('id', 9)
            ->get();
        $it = Others::orderBy('id', 'ASC')
            ->where('id', 10)
            ->get();
        $objects2 = Objects::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();

        return view('frontend/home/product_details', compact('objects2', 'product', 'initative', 'main', 'footer', 'career', 'links', 'contact1', 'contact2', 'headoffice', 'factory', 'branch1', 'branch2', 'branch3', 'branch4', 'it'));
    }

    public function gallery() {
        $career = Service::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $photo = photo_gallery_table::orderBy('id', 'ASC')

            ->get();

        $video = video::orderBy('id', 'ASC')

            ->get();
        $allprnews = Activity::orderBy('id', 'DESC')

            ->get();

        $main = Menu::orderBy('sequence', 'DESC')
            ->where('display', 1)
            ->get();
        $links = Link::all();
        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();

        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 3)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();

        return view('frontend/gallery.all', compact('photo', 'video', 'main', 'footer', 'career', 'allprnews', 'links', 'contact1', 'contact2', 'headoffice'));
    }
    public function mission_vission() {
        $career = Service::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $company = CompanyManagement::orderBy('id', 'ASC')

            ->get();

        $video = video::orderBy('id', 'ASC')

            ->get();
        $allprnews = Activity::orderBy('id', 'DESC')

            ->get();

        $main = Menu::orderBy('sequence', 'DESC')
            ->where('display', 1)
            ->get();
        $links = Link::all();
        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();

        $contact1 = Others::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $contact2 = Others::orderBy('id', 'ASC')
            ->where('id', 3)
            ->get();
        $headoffice = Others::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();
        $mission = Mission::orderBy('id', 'ASC')
            ->where('id', 1)
            ->get();
        $chairman = Mission::orderBy('id', 'ASC')
            ->where('id', 2)
            ->get();
        $director = Mission::orderBy('id', 'ASC')
            ->where('id', 3)
            ->get();
        $agm = Mission::orderBy('id', 'ASC')
            ->where('id', 4)
            ->get();

        return view('frontend/company.all', compact('agm', 'director', 'chairman', 'mission', 'company', 'video', 'main', 'footer', 'career', 'allprnews', 'links', 'contact1', 'contact2', 'headoffice'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }
    public function search(Request $request) {
        $sector = Sector::all();
        $industry = Industry::all();
        $ratingtype = Ratingtype::all();
        $ratinglist = Ratinglist::all();
        $outlook = Outlook::all();
        $articles = Service::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $prnews = Activity::orderBy('id', 'DESC')
            ->limit(3)
            ->get();

        $main = Menu::orderBy('id', 'DESC')
            ->where('display', 1)
            ->get();
        $links = Link::all();
        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();

        $search = $request->get('query');
        $ratings = Rating::where('title', 'like', '%' . $search . '%')->paginate(5);
        return view('frontend/rating.search', compact('ratings', 'articles', 'prnews', 'main', 'links', 'footer', 'sector', 'industry', 'ratingtype', 'ratinglist', 'outlook'));
    }

    public function rating_search(Request $request) {

        $links = Link::all();
        $rating = Rating::all();
        $sector = Sector::all();
        $industry = Industry::all();
        $ratingtype = Ratingtype::all();
        $ratinglist = Ratinglist::all();
        $outlook = Outlook::all();

        $main = Menu::orderBy('sequence', 'ASC')
            ->where('display', 1)
            ->get();
        $footer = Menu::orderBy('sequence', 'ASC')
            ->where('footer1', 1)
            ->get();

        $news = News::orderBy('id', 'DESC')
            ->limit(7)
            ->get();
        $prnews = Activity::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $articles = Service::orderBy('id', 'DESC')
            ->limit(3)
            ->get();
        $sectorsearch = $request->get('sector');
        $industrysearch = $request->get('industry');
        $ratingtypesearch = $request->get('ratingtype');
        $ratinglistsearch = $request->get('ratinglist');
        $outlooksearch = $request->get('outlook');
        $ratings = Rating::where('sector', $sectorsearch)
            ->where('industry', $industrysearch)
            ->where('type', $ratingtypesearch)
            ->where('type', $ratingtypesearch)
            ->where('rating', $ratinglistsearch)
            ->where('outlook', $outlooksearch)
            ->paginate(50);

        return view('frontend/rating.search_result', compact('ratings', 'news', 'main', 'links', 'footer', 'prnews', 'articles', 'rating', 'sector', 'industry', 'ratingtype', 'ratinglist', 'outlook'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
