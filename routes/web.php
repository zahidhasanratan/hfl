<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
//Route::get('/','frontend\HomeController@index')->name('welcome');
Route::get('/','frontend\HomeController@index')->name('welcome');
Route::get('products_details/{slug}','frontend\HomeController@product_details')->name('product.details');
Route::get('post_details/{slug}','frontend\HomeController@show')->name('post.show.view');

Route::get('/Search','frontend\HomeController@SearchProduct')->name('search.product');


Route::get('/search-product','frontend\HomeController@searchProductAjax')->name('search.product.ajax');



route::get('all_product','frontend\HomeController@AllProduct')->name('AllProduct');
route::get('single_product/{slug}','fontend\FontController@SingleProduct')->name('SingleProduct');

route::get('category_product/{cat_id}','frontend\HomeController@CategoryProduct')->name('CategoryProduct');
route::get('sub_category_product/{cat_id}','frontend\HomeController@SubCategoryProduct')->name('SubCategoryProduct');


route::get('All_Product_character_search/{cat_id}/{Char}','fontend\FontController@AllProductCharacterSearch')->name('AllProductCharacterSearch');

route::get('All_product_character_search_therap/{cat_id}/{C}','frontend\HomeController@ProductCharacterSearchTherape')->name('ProductCharacterSearchTherape');
// route::get('All_product_character_search_generic/{cat_id}/{C}','frontend\HomeController@ProductCharacterSearchGeneric')->name('ProductCharacterSearchGeneric');
Route::get('All_product_character_search_generic/{cat_id}/{Char}', 'frontend\HomeController@ProductCharacterSearchGeneric')
    ->name('ProductCharacterSearchGeneric');


Route::get('/day','frontend\HomeController@day')->name('day');
// Route::get('/About','frontend\HomeController@About')->name('About');
Route::get('/direcotr','frontend\HomeController@About')->name('About');

Route::get('/Pipeline','frontend\HomeController@Pipeline')->name('Pipeline');
Route::get('/Career','frontend\HomeController@Post')->name('Career');
Route::get('/Career-Sucess','frontend\HomeController@successapply')->name('Career.success');
Route::get('/Career/{slug}','admin\PostController@details')->name('career.details');
Route::get('/Newsroom','frontend\HomeController@Newsroom')->name('About');
Route::get('/Products','frontend\HomeController@Products')->name('product.all');
Route::get('/Category/{slug}','frontend\HomeController@CategoryProducts')->name('category.product.all');
Route::get('/Article','frontend\HomeController@Article')->name('About');
Route::get('/Global-Colaboration','frontend\HomeController@Global')->name('Global');
Route::get('/Facilities','frontend\HomeController@Facilities')->name('Facilities');
Route::get('/Research-Development','frontend\HomeController@Research')->name('research');
Route::get('/Quality-Management-System','frontend\HomeController@Quality')->name('quality');
Route::get('/Facility-Details/{slug}','admin\FacilityController@details')->name('facility.details');


Route::get('/Life-Member','frontend\HomeController@lifemember')->name('life.member');
Route::get('/Team-Details/{slug}','admin\LifeMemberController@details')->name('life.details');
// Route::get('/Team-Details/{slug}','frontend\HomeController@DirectoreDetails')->name('life.details');
//Route::get('/day2','frontend\HomeController@index')->name('day2');


Route::get('Ho/Yesg/{slug}','admin\MoneyReceiptController@details')->name('money.details');
Route::get('money/pdf/{slug}','admin\MoneyReceiptController@pdf')->name('money.pdf');
Route::post('dmc/day','frontend\HomeController@dmcday')->name('dmc.day');
Route::get('dmc/invoice/{slug}','frontend\HomeController@invoice')->name('dmc.invoice');
Route::post('dmc/pay/success','frontend\HomeController@dmcpay')->name('dmc.pay.success');
//Route::get('dmc/success/{slug}','frontend\HomeController@success')->name('dmc.success');
Route::get('dmc/ticket/{slug}','frontend\HomeController@ticket')->name('dmc.ticket');
Route::get('dmc/successmessage','frontend\HomeController@successmessage')->name('dmc.successmessage');
Route::get('dmc/failed','frontend\HomeController@failed')->name('dmc.failed');

Route::post('dmc/fee-shurjopay-submission','frontend\HomeController@shurjopaysubmission')->name('dmc.shurjopay.submission');

Route::get('/payment-response','frontend\HomeController@payment_response')->name('payment-response');

Route::get('dmc/success/{slug}','frontend\HomeController@success')->name('dmc.success');

Route::get('dmc/success/admin/{slug}','frontend\HomeController@success2')->name('dmc.success.admin');

//Route::get('Non/subscriber-fee-payement-submission/{id}/{subscriptionid}/{name}/{email}/{amount}/{year}/{subscriber_number}/{tx_id}', [App\Http\Controllers\Subscriber\SubscriberDashboardController::class, 'nonsubfee_payment_submit'])->name('nonsubfees-payment-submission');

Route::get('news/details/{slug}','admin\NewsController@details')->name('news.details');
Route::get('article/details/{slug}','admin\ArticleController@details')->name('article.details');
Route::get('CommitteeMeetting/details/{slug}','admin\ActivityController@details')->name('com.details');

//Route::get('news/{slug}','NewsController@details')->name('news.details');

Route::get('committee/details/{slug}','frontend\HomeController@committeedetails')->name('committee.details');

Route::get('publication-details/{slug}','admin\PublicationController@details')->name('publication.details');
Route::get('publication-details/{slug}','admin\PublicationController@details')->name('publication.details');
Route::get('medical-feature-details/{slug}','admin\MedicalFeatureController@details')->name('medicalfeature.details');
Route::get('micro-finance-details/{slug}','admin\MicroFinanceController@details')->name('microfeature.details');
Route::get('service-details/{slug}','admin\ServiceController@details')->name('service.details');
Route::get('Mission-details/{slug}','admin\ObjectsController@details')->name('object.details');
Route::get('article-research/{slug}','admin\ServiceController@details')->name('article.details.details');


Route::get('mission-vission','frontend\HomeController@missionVission');
Route::get('history','frontend\HomeController@history');
Route::get('message_chairperson','frontend\HomeController@message_chairperson');
Route::get('managing_director','frontend\HomeController@message_managing_director');
Route::get('chief_operating_officer','frontend\HomeController@message_dmd_ceo');


Route::get('news','frontend\HomeController@all_news')->name('news.all');

Route::get('events','frontend\HomeController@all_notice')->name('notice.all');
Route::get('district-committee','frontend\HomeController@districtcommittee')->name('district.committee');
Route::get('Dhaka','frontend\HomeController@micro')->name('museum.dhaka');
Route::get('Rangpur','frontend\HomeController@rangpur')->name('museum.rangpur');

Route::post('member-search','frontend\HomeController@reportsearch')->name('report.search');


Route::get('need-help','frontend\HomeController@need_help')->name('need.help');
Route::get('committee-list','frontend\HomeController@memberlist')->name('member-list');
Route::get('past-leader','frontend\HomeController@famous')->name('past-leader');

Route::get('Member-Details/{slug}','frontend\HomeController@memberdetails')->name('member.details');


Route::get('member-form','frontend\HomeController@memberform')->name('member.form');
Route::get('Medical-Waste-Management','frontend\HomeController@medical')->name('medical.waste.all');
Route::get('Micro-Finance','frontend\HomeController@micro')->name('micro.finance.all');
Route::get('team','frontend\HomeController@team')->name('team.all');
Route::get('previous-program','frontend\HomeController@previous')->name('previous.all');
Route::get('Executive-Committee','frontend\HomeController@executive')->name('executive.committee.all');
Route::get('initative','frontend\HomeController@initative')->name('pr.news.all');
//Route::get('career','frontend\HomeController@career');
Route::get('Gallery','frontend\HomeController@category');
Route::get('video','frontend\HomeController@video');

Route::get('Contact','frontend\HomeController@contact');
Route::post('contactus','frontend\HomeController@contactmail')->name('contact.us');
Route::post('Application-Formm','frontend\HomeController@apply')->name('application.form');
Route::post('helpform','frontend\HomeController@helpform')->name('help.form');
Route::post('membership','frontend\HomeController@memberformstore')->name('member.submit');

Route::get('product_category','frontend\HomeController@category');
Route::get('products_item/{id}','frontend\HomeController@item');
Route::get('mission_vission','frontend\HomeController@mission_vission');

Route::get('article-research','frontend\HomeController@all_article')->name('article.news.all');
Route::get('page/{slug}','admin\PageController@details')->name('page.details');
Route::get('Texpeon/{slug}','admin\ObjectsController@details')->name('about.details');
Route::get('rating-details/{slug}','admin\RatingController@details')->name('rating.details');
//Registration

//
//Search
//

Route::get('/search','frontend\HomeController@search')->name('company.search');
Route::get('/rating-search','frontend\HomeController@rating_search')->name('rating.search');

Route::get('register','frontend\RegistrationController@index')->name('register');
Route::post('register','frontend\RegistrationController@registration')->name('register');
Route::get('register/pending','frontend\RegistrationController@pending')->name('ragistration.index');






//Route::prefix('rating-information')->group(function (){
//Route::get('/login','Auth\AdminLoginController@showLoginForm')->name('admin.login');
//Route::post('/login','Auth\AdminLoginController@login')->name('admin.login.submit');
//Route::get('/rating','Auth\AdminLoginController@index')->name('rating.dashboard');
//Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
//});


Route::group( ['middleware' => 'guest:admin' ], function()
{
    Route::get('rating-information', 'frontend\AdminController@index');
});

Auth::routes();


Route::group(['prefix'=>'admin','middleware' => 'auth','namespace'=>'admin'], function() {

    Route::get('/overview/create/{id}','OverviewController@create')->name('overview2.create');
    Route::get('/professional/create/{id}','ProfessionalController@create')->name('professional2.create');

//    Route::get('/dmcday','DmcDayController@pending')->name('dmcday.pending');



    Route::get('districtall/{slug}','ServiceController@index')->name('district.all');
    Route::get('adddistrict/{slug}','ServiceController@create')->name('district.add');
    Route::get('service/view/{slug}','ServiceController@view')->name('service.view');
    Route::get('committee/add/{slug}','PreviousProgramController@create')->name('committee.add');

    Route::get('branch/{slug}','MoneyReceiptController@alluser')->name('money.all');



    Route::get('dashboard', 'DashboardController@index')->name('admin.dashboard');
    Route::get('passwordchange', 'ChangePasswordController@index')->name('password.change');
    Route::post('passwordchange', 'ChangePasswordController@changePassword')->name('password.update');
    Route::resource('slider','SliderController');
    Route::resource('money_receipt','MoneyReceiptController');
    Route::resource('medicalslider','MedicalSliderController');
    Route::resource('microslider','MicroSliderController');
    Route::resource('activity','ActivityController');
    Route::resource('contactus','ContactUsController');
    Route::resource('menu','MenuController');
    Route::resource('page','PageController');
    Route::resource('service','ServiceController');
    Route::resource('life','LifeMemberController');
    Route::resource('news','NewsController');
    Route::resource('facility','FacilityController');

    Route::resource('article','ArticleController');
    Route::resource('research','ResearchController');
    Route::resource('quality','QuailityController');
    Route::resource('post','PostController');
    Route::resource('applicant','ApplicantController');
    Route::resource('dmcday','DmcDayController');

    Route::resource('medicalfeature','MedicalFeatureController');
    Route::resource('microfinancefeature','MicroFinanceController');
    Route::resource('team','TeamController');
    Route::resource('previous','PreviousProgramController');
    Route::resource('publication','PublicationController');
    //Route::resource('category','CategoryController');
    //................................Category Manage .............................
    route::get('Category/category-create','CategoryController@CategoryCreate')->name('CategoryCreate');
    route::post('Category/category-store','CategoryController@CategoryStore')->name('CategoryStore');
    route::get('Category/category-index','CategoryController@CategoryIndex')->name('CategoryIndex');
	route::get('Category/category-edite/{id}','CategoryController@CategoryEdite')->name('CategoryEdite');
	route::post('Category/category-update','CategoryController@CategoryUpdate')->name('CategoryUpdate');
	route::get('Category/category-delete/{id}','CategoryController@CategoryDelete')->name('CategoryDelete');
    //................................Sub Category Manage .............................
    route::get('SubCategory/category-create','SubCategoryManageController@CategoryCreate')->name('SubCategoryCreate');
    route::post('SubCategory/category-store','SubCategoryManageController@CategoryStore')->name('SubCategoryStore');
    route::get('SubCategory/category-index','SubCategoryManageController@CategoryIndex')->name('SubCategoryIndex');
	route::get('SubCategory/category-edite/{id}','SubCategoryManageController@CategoryEdite')->name('SubCategoryEdite');
	route::post('SubCategory/category-update','SubCategoryManageController@CategoryUpdate')->name('SubCategoryUpdate');
	route::get('SubCategory/category-delete/{id}','SubCategoryManageController@CategoryDelete')->name('SubCategoryDelete');


	//................................Generic Category Manage .............................
    route::get('Generic/generic-category-create','GcategoryManageController@GenericCategoryCreate')->name('GenericCategoryCreate');
    route::post('Generic/generic-category-store','GcategoryManageController@GenericCategoryStore')->name('GenericCategoryStore');
    route::get('Generic/generic-category-index','GcategoryManageController@GenericCategoryIndex')->name('GenericCategoryIndex');
    route::get('Generic/generic-category-edite/{id}','GcategoryManageController@GenericCategoryEdite')->name('GenericCategoryEdite');
    route::post('Generic/generic-category-update','GcategoryManageController@GenericCategoryUpdate')->name('GenericCategoryUpdate');
    route::get('Generic/generic-category-delete/{id}','GcategoryManageController@GenericCategoryDelete')->name('GenericCategoryDelete');

       //................................Therapeutic Category Manage .............................
       route::get('TheraCategory/therapeutic-category-create','TherapeuticCategoryController@TheraCategoryCreate')->name('TheraCategoryCreate');
       route::post('TheraCategory/therapeutic-category-store','TherapeuticCategoryController@TheraCategoryStore')->name('TheraCategoryStore');
       route::get('TheraCategory/therapeutic-category-index','TherapeuticCategoryController@TheraCategoryIndex')->name('TheraCategoryIndex');
       route::get('TheraCategory/therapeutic-category-edite/{id}','TherapeuticCategoryController@TheraCategoryEdite')->name('TheraCategoryEdite');
       route::post('TheraCategory/therapeutic-category-update','TherapeuticCategoryController@TheraCategoryUpdate')->name('TheraCategoryUpdate');
       route::get('TheraCategory/therapeutic-category-delete/{id}','TherapeuticCategoryController@TheraCategoryDelete')->name('TheraCategoryDelete');

       //................................Product Manage  .............................
       route::get('ProductManages/product-manage-create','ProductManageController@ProductManageCreate')->name('ProductManageCreate');
       route::post('ProductManages/product-manage-store','ProductManageController@ProductManageStore')->name('ProductManageStore');
       route::get('ProductManages/product-manage-index','ProductManageController@ProductManageIndex')->name('ProductManageIndex');
       route::get('ProductManages/product-manage-edite/{id}','ProductManageController@ProductManageEdite')->name('ProductManageEdite');
       route::post('ProductManages/product-manage-update','ProductManageController@ProductManageUpdate')->name('ProductManageUpdate');
       route::get('ProductManages/product-manage-delete/{id}','ProductManageController@ProductManageDelete')->name('ProductManageDelete');
       route::get('ProductManages/product-manage-view/{id}','ProductManageController@ProductManageView')->name('ProductManageView');
       route::get('ProductManages/product-manage-active/{id}','ProductManageController@ProductManageActive')->name('ProductManageActive');
       route::get('ProductManages/product-manage-deactive/{id}','ProductManageController@ProductManageDeactive')->name('ProductManageDeactive');

       route::get('ProductManages/product-manage-panding','ProductManageController@ProductManagePanding')->name('ProductManagePanding');
       route::get('ProductManages/product-manage-approve','ProductManageController@ProductManageApprove')->name('ProductManageApprove');

    Route::resource('pcategory','PcategoryController');
    Route::resource('product','ProductController');
    Route::resource('overview','OverviewController');
    Route::resource('professional','ProfessionalController');
    Route::resource('item','ItemController');
    Route::resource('photo','PhotoGalleryController');
    Route::resource('video','VideoController');
    Route::resource('company','CompanyManagementController');
    Route::resource('flag','FlagController');
    Route::resource('gmp','GmpController');
    Route::resource('technology','TechnologyController');
    Route::resource('project','ProjectController');
    Route::resource('award','AwardController');
    Route::resource('link','LinkController');
    Route::resource('others','OthersController');
    Route::resource('NeedHelp','NeedHelpController');
    Route::resource('mission','MissionController');
    Route::resource('objects','ObjectsController');
    Route::resource('rating','RatingController');
    Route::resource('sector','SectorMyController');
    Route::resource('industry','IndustryController');
    Route::resource('ratingtype','RatingTypeController');
    Route::resource('ratinglist','RatingListController');
    Route::resource('outlook','OutlookController');
    Route::resource('adminuser','AdminUser');
    Route::resource('user','UserController');

    Route::get('/approve','AdminUser@pending')->name('adminuser.approve');
    Route::get('edituser/{slug}','AdminUser@edituser')->name('adminuser.edituser');
    Route::put('deactive/{id}','AdminUser@updatedeactive')->name('adminuser.updatedeactive');

	Route::get('/ajaxsearch','MenuController@searchajax')->name('menu.ajaxsearch');

});
