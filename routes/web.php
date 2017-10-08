<?php
use App\Property;
use Intervention\Image\Facades\Image;
use App\Mail\PropertyCreated;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {

});*/


Route::get('/resize-property', function()
{

    ini_set('memory_limit','256M');
    ini_set('max_execution_time', 600);
    for($i = 1;$i<=20;$i++){
        $image_path = public_path().'/uploads/h'.$i.'.jpeg';

        Image::make($image_path)
            ->resize(99, 99)
            ->save(public_path().'/images/properties/bottom_slider_99x99/h'.$i.'.jpeg');

        Image::make($image_path)
            ->resize(370, 202)
            ->save(public_path().'/images/properties/featured_slider_370x202/h'.$i.'.jpeg');

        Image::make($image_path)
            ->resize(355, 240)
            ->save(public_path().'/images/properties/latest_home_and_best_property_355x240/h'.$i.'.jpeg');

        Image::make($image_path)
            ->resize(50, 50)
            ->save(public_path().'/images/properties/latest_reviews_50x50/h'.$i.'.jpeg');

        Image::make($image_path)
            ->resize(100, 75)
            ->save(public_path().'/images/properties/others_100x75/h'.$i.'.jpeg');

        Image::make($image_path)
            ->resize(370, 370)
            ->save(public_path().'/images/properties/our_location_370x370/h'.$i.'.jpeg');

        Image::make($image_path)
            ->resize(770, 370)
            ->save(public_path().'/images/properties/our_location_770x370/h'.$i.'.jpeg');

        Image::make($image_path)
            ->resize(2000, 440)
            ->save(public_path().'/images/properties/parallax_banner_2000x1440/h'.$i.'.jpeg');

        Image::make($image_path)
            ->resize(364, 244)
            ->save(public_path().'/images/properties/property_listing_364x244/h'.$i.'.jpeg');

        Image::make($image_path)
            ->resize(1170, 600)
            ->save(public_path().'/images/properties/single_property_1170x600/h'.$i.'.jpeg');

        Image::make($image_path)
            ->resize(150, 110)
            ->save(public_path().'/images/properties/agent_properties_150x110/h'.$i.'.jpeg');

    }

});


Route::get('/resize-agents', function()
{

    ini_set('memory_limit','256M');
    ini_set('max_execution_time', 600);
    for($i = 1;$i<=20;$i++){
        $image_path = public_path().'/uploads/agents/a'.$i.'.jpg';

        Image::make($image_path)
            ->resize(239, 239)
            ->save(public_path().'/images/agents/all_agents_239x239/a'.$i.'.jpg');

        Image::make($image_path)
            ->resize(74, 74)
            ->save(public_path().'/images/agents/contact_agent_74x74/a'.$i.'.jpg');

        Image::make($image_path)
            ->resize(71, 71)
            ->save(public_path().'/images/agents/home_71x71/a'.$i.'.jpg');

        Image::make($image_path)
            ->resize(330, 330)
            ->save(public_path().'/images/agents/profile_330x330/a'.$i.'.jpg');

    }

});

Route::get('/resize-misc', function()
{

    ini_set('memory_limit','256M');
    ini_set('max_execution_time', 600);
    for($i = 1;$i<=5;$i++){
        $image_path = public_path().'/uploads/locations/l'.$i.'.jpeg';

        Image::make($image_path)
            ->resize(770, 370)
            ->save(public_path().'/images/misc/locations/loc_770x370/l'.$i.'.jpeg');

        Image::make($image_path)
            ->resize(370, 370)
            ->save(public_path().'/images/misc/locations/loc_370x370/l'.$i.'.jpeg');

    }

});

Route::get('/resize-banner', function()
{

    ini_set('memory_limit','256M');
    ini_set('max_execution_time', 600);
    for($i = 1;$i<=5;$i++){
        $image_path = public_path().'/uploads/banner/b'.$i.'.jpeg';

        Image::make($image_path)
            ->resize(1423, 603)
            ->save(public_path().'/images/banner/banner_1423x603/b'.$i.'.jpeg');

    }

});

//property routes
Route::get('/property-listings','User\ListingsController@getAll')->name('listings.all');
Route::get('/property-listings/for-sale','User\ListingsController@getForSale')->name('listings.sale');
Route::get('/property-listings/for-rent','User\ListingsController@getForRent')->name('listings.rent');
Route::get('/property-details/{id}','User\ListingsController@getPropertyDetails')->name('property.detail');
Route::get('/property-favourite/{id}','User\FavouriteController@favouriteProperty')->name('property.favourite');
Route::get('/property-category/{id}','User\ListingsController@categoryProperty')->name('property.category');
Route::post('review','User\ListingsController@propertyReview')->name('user.review.submit');

//Agents routes
Route::get('/property-agents','User\AgentsController@getAllAgents')->name('agents.all');
Route::get('/agent-details/{id}','User\AgentsController@getAgentDetails')->name('agent.detail');
Route::get('/agent-details/{id}/for_sale','User\AgentsController@getForSale')->name('agent.detail.sale');
Route::get('/agent-details/{id}/for_rent','User\AgentsController@getForRent')->name('agent.detail.rent');

Route::get('/get-more-images','User\HomeController@getMoreImages')
->name('get.more.images');



Route::resource('users','UserController');

Route::resource('listings', 'ListingsController');

//------------------------------------------------------------------------------
/*
* Admin routes
*/

Route::get('/admin', 'Admin\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin','Admin\AdminLoginController@login')->name('admin.login.submit');
Route::get('/admin/register','Admin\AdminRegistrationController@showRegistrationForm')->name('admin.register.form');
Route::post('/admin/register','Admin\AdminRegistrationController@saveUser')->name('admin.register.submit');

Route::get('/admin/users','Admin\AdminUsersController@getAllUsers')->name('admin.user.list');
Route::get('/admin/users/{id}','Admin\AdminUsersController@showUser')->name('admin.user');
Route::get('/admin/users/{id}/edit','Admin\AdminUsersController@editUser')->name('admin.user.edit.form');
Route::post('/admin/users/save','Admin\AdminUsersController@save')->name('admin.user.edit.submit');

Route::get('/admin/users/{id}/delete','Admin\AdminUsersController@delete')->name('admin.user.delete');

Route::post('/admin/users/delete','Admin\AdminUsersController@destroy')->name('admin.user.destroy');

Route::get('/admin/dashboard','Admin\AdminDashboard@index')->name('admin.dashboard');
Route::get('/admin/property-listings','Admin\AdminPropertyListingsController@getAllProperties')
    ->name('admin.property.listings');
Route::get('/admin/property/{id}','Admin\AdminPropertyListingsController@getProperty')
        ->name('admin.property.show');
Route::get('/admin/property/{id}/delete','Admin\AdminPropertyListingsController@delete')
        ->name('admin.property.delete');
Route::post('/admin/property/delete','Admin\AdminPropertyListingsController@destroy')
        ->name('admin.property.destroy');
Route::get('/admin/properties-for-approval','Admin\AdminPropertyForApprovalController@getAllProperties')
        ->name('admin.property.approval');

Route::post('/admin/properties-for-approval/save','Admin\AdminPropertyForApprovalController@save')
                ->name('admin.property.approval.save');
Route::get('/admin/featured-properties','Admin\AdminFeaturedPropertiesController@getFeaturedProperties')
                                        ->name('admin.featured.properties');
Route::post('/admin/featured-properties/un-feature','Admin\AdminFeaturedPropertiesController@unfeature')
                                        ->name('admin.featured.properties.unfeature');
Route::get('/admin/expired-properties','Admin\AdminExpiredPropertiesController@getExpiredProperties')
                                        ->name('admin.expired.properties');
Route::get('/admin/expire-property','Admin\AdminPropertyExpireController@expireProperty')
                                        ->name('admin.expire.property');


Route::get('/admin/partners','Admin\AdminPartnersController@getAllPartners')
                                        ->name('admin.partners.listings');
Route::get('/admin/partners/create','Admin\AdminPartnersController@showNewPartnersForm')
                                        ->name('admin.partners.new.form');
Route::post('/admin/partners/save','Admin\AdminPartnersController@saveNewPartner')
                                        ->name('admin.partners.new.submit');
Route::get('/admin/partners/{id}/edit','Admin\AdminPartnersController@edit')
                                        ->name('admin.partners.edit.form');
Route::post('/admin/partners/edit','Admin\AdminPartnersController@saveEdit')
                                        ->name('admin.partners.edit.save');
Route::get('/admin/partners/{id}/delete','Admin\AdminPartnersController@delete')
                                        ->name('admin.partners.delete');
Route::post('/admin/partners/delete','Admin\AdminPartnersController@destroy')
                                        ->name('admin.partners.destroy');

Route::get('/admin/property-types','Admin\AdminPropertyTypesController@getPropertyTypes')
                                        ->name('admin.property.types.list');
Route::get('/admin/property-types/create','Admin\AdminPropertyTypesController@addPropertyType')
                                        ->name('admin.property.type.add.form');
Route::post('/admin/property-types/save','Admin\AdminPropertyTypesController@savePropertyType')
                                        ->name('admin.property.type.submit');

Route::get('/admin/property-types/{id}/edit','Admin\AdminPropertyTypesController@editPropertyType')
                                        ->name('admin.property.type.edit.form');
Route::post('/admin/property-types/edit','Admin\AdminPropertyTypesController@saveEdit')
                                        ->name('admin.property.type.edit.save');
Route::get('/admin/property-types/{id}/delete','Admin\AdminPropertyTypesController@deletePropertyType')
                                        ->name('admin.property.type.delete');
Route::post('/admin/property-types/delete','Admin\AdminPropertyTypesController@destroy')
                                        ->name('admin.property.type.destroy');

Route::get('/admin/house-features','Admin\AdminHouseFeaturesController@getHouseFeatures')
                                        ->name('admin.house.feature.list');
Route::get('/admin/house-features/create','Admin\AdminHouseFeaturesController@addHouseFeature')
                                        ->name('admin.house.feature.add.form');
Route::post('/admin/house-features/save','Admin\AdminHouseFeaturesController@saveHouseFeature')
                                        ->name('admin.house.feature.save');

Route::get('/admin/subscribers','Admin\AdminNewsLetterSubscribersController@getSubscribers')
          ->name('admin.subscribers.listings');

Route::get('/delete','Admin\AdminDashboard@delete_db')
                        ->name('admin.db.delete');
Route::get('/admin/agent-listings','Admin\AdminAgentListingsController@getAllAgents')
    ->name('admin.agent.listings');

Route::get('/admin/agent/{id}/agent-property-listings/','Admin\AdminAgentPropertiesController@propertyTabs')
        ->name('admin.agent.properties');

Route::post('/admin/logout','Admin\AdminLoginController@logout')->name('admin.logout');

//Admin blog routes
Route::get('/admin/blog','Admin\AdminBlogPostsController@createPost')
          ->name('admin.create.post.form');
Route::post('/admin/blog','Admin\AdminBlogPostsController@savePost')
          ->name('admin.create.post.submit');
Route::get('/admin/blog/posts','Admin\AdminBlogPostsController@getAllPosts')
          ->name('admin.blog.list');
Route::get('/admin/blog/posts/{id}/edit','Admin\AdminBlogPostsController@edit')
          ->name('admin.post.edit.form');
Route::post('/admin/blog/posts/edit','Admin\AdminBlogPostsController@save')
          ->name('admin.post.edit.submit');
Route::get('/admin/blog/posts/{id}/delete','Admin\AdminBlogPostsController@delete')
          ->name('admin.post.delete');
Route::post('/admin/blog/posts/delete','Admin\AdminBlogPostsController@destroy')
          ->name('admin.post.destroy');

//Admin news letter routes
Route::get('/admin/news-letters','Admin\AdminNewsLetterController@createNewsLetter')
          ->name('admin.create.news.letter.form');
Route::post('/admin/news-letters','Admin\AdminNewsLetterController@saveNewsLetter')
          ->name('admin.create.news.letter.submit');
// end admin news letter routes

Route::get('/admin/packages','Admin\AdminPackagesController@getPackages')
          ->name('admin.packages.listing');
Route::get('/admin/packages/{id}/edit','Admin\AdminPackagesController@edit')
          ->name('admin.packages.edit');
Route::post('/admin/packages/edit','Admin\AdminPackagesController@update')
          ->name('admin.packages.update');


//User blog routes
Route::get('blog','User\UserBlogPostsController@getAllPosts')->name('user.blog.posts');
Route::get('blog/{slug}','User\UserBlogPostsController@showPost')->name('user.show.posts');
Route::post('comment','User\UserBlogPostsController@postComment')->name('user.comment.submit');

//User home routes
Route::get('/','User\HomeController@index')->name('user.home');
Route::get('contact-us','User\HomeController@contact')->name('user.contact');
Route::get('about-us','User\HomeController@about')->name('user.about');
Route::get('terms-and-conditions','User\HomeController@termsofUse')->name('user.termsofUse');
Route::get('Privacy','User\HomeController@privacy')->name('user.privacy');
Route::get('Personal-Safety','User\HomeController@personalsafety')->name('user.personalsafety');
Route::get('Disclaimer','User\HomeController@disclaimer')->name('user.disclaimer');
Route::get('/search','User\SearchController@search')->name('user.search');

//Add to favorites Routes
Route::get('/add-to-favorites','User\AddToFavoritesController@addToFavorites')
            ->name('add.to.favorites');
Route::get('/get-favorites','User\AddToFavoritesController@getFavorites')
            ->name('get.favorites');
Route::get('/remove-favorite','User\AddToFavoritesController@removeFavorite')
            ->name('remove.favorite');

//Recommend property
Route::get('/recommend-property','Admin\AdminRecommendPropertiesController@recommendProperty')
            ->name('recommend.property');
Route::get('/get-recommended-properties','Admin\AdminRecommendPropertiesController@getRecommended')
            ->name('recommended.properties');

//Suspend agent
Route::get('/suspend-agent','Admin\AdminSuspendAgentsController@suspendAgent')
            ->name('suspend.agent');
Route::get('/get-suspended-agents','Admin\AdminSuspendAgentsController@getSuspendedAgents')
            ->name('suspended.agents');

//Suspend property
Route::get('/suspend-property','Admin\AdminSuspendPropertiesController@suspendProperty')
            ->name('suspend.property');
Route::get('/get-suspended-properties','Admin\AdminSuspendPropertiesController@getSuspendedProperties')
            ->name('suspended.properties');

//Show in banner
Route::get('/show-in-banner','Admin\AdminShowInBannerController@showInBanner')
            ->name('show.in.banner');
Route::get('/get-showing-in-banner','Admin\AdminShowInBannerController@getShowInBanner')
            ->name('get.show.in.banner');

//Agent routes
Route::get('/login','Agent\AgentLoginController@showLoginForm')->name('agent.login.form');
Route::post('/login','Agent\AgentLoginController@login')->name('agent.login.submit');
Route::post('/logout','Agent\AgentLoginController@logout')->name('agent.logout');


Route::get('/agent','Agent\AgentProfileController@showAgentProfile')->name('agent.profile');
Route::get('/agent/{agentId}/properties','Agent\AgentPropertiesController@getAgentProperties')->name('agent.properties');
Route::get('/agent/{agentId}/favourites','User\AddToFavoritesController@getAgentFavourites')->name('agent.favourites');
Route::get('/agent/{agentId}/properties/suspended','Agent\AgentPropertiesController@getAgentSuspendedProperties')
->name('agent.properties.suspended');
Route::get('/agent/{agentId}/properties/expired','Agent\AgentPropertiesController@getAgentExpiredProperties')
->name('agent.properties.expired');
Route::get('/agent/add-new-property','Agent\AgentCreateListingsController@showNewPropertyForm')->name('agent.create.listing');
Route::get('/agent/{id}/edit-property','Agent\AgentCreateListingsController@editPropertyForm')->name('agent.edit.listing');
Route::get('/agent/{id}/delete-property','Agent\AgentCreateListingsController@deleteProperty')->name('agent.delete.listing');
Route::post('/agent/add-new-property','Agent\AgentCreateListingsController@createListing')->name('agent.create.listing.submit');
Route::post('/agent/edit-property','Agent\AgentCreateListingsController@editListing')->name('agent.edit.listing.submit');
Route::get('/agent/select-package','Agent\AgentCreateListingsController@showSelectPackage')->name('agent.select.package');
/* debug routes*/
Route::get('/agent/package-testing','Agent\AgentCreateListingsController@showNewPropertyForm');
Route::get('/agent/test','Agent\TController@test');
/* end of debug routes */
Route::post('/agent/select-package','Agent\AgentCreateListingsController@addPackage')->name('agent.select.package.submit');
Route::get('/agent/add-payment','Agent\AgentCreateListingsController@showPaymentForm')->name('agent.payment.form');
Route::post('/agent/add-payment','Agent\AgentCreateListingsController@addPayment')->name('agent.payment.submit');

//new routes
Route::post('/agent/register','Agent\AgentLoginController@register')->name('register.submit');
Route::get('/agent/register/other-details','Agent\AgentLoginController@agent_details')->name('agent_details.form');
Route::post('/agent/agent_details','Agent\AgentLoginController@agent_details_submit')->name('agent.agent_details.submit');
Route::get('/agent/register','Agent\AgentLoginController@showRegisterForm')->name('agent.register.form');
Route::post('/agent/edit','Agent\AgentLoginController@agent_edit_submit')->name('agent.edit.submit');
Route::post('/agent/update','Agent\AgentLoginController@agent_update_password')->name('agent.update.submit');

//newsletter routes
Route::post('/subscribe-to-newsletter','User\NewsletterSubscriptionController@subscribe')
            ->name('subscribe.to.newsletter');



//Socialite logins
Route::get('auth/{provider}', 'Auth\RegisterController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\RegisterController@handleProviderCallback');

Route::get('/time',function(){

    $future = strtotime('2017-05-12 14:00:36'); //Future date.
    $timefromdb = strtotime('2017-05-02 14:00:36');
    $timeleft = $future-$timefromdb;
    $daysleft = round((($timeleft/24)/60)/60);
    echo $daysleft;

});

Route::get('/new-date',function(){
    $datetime = new DateTime('2017-05-02 14:00:36');
    $datetime->modify('+10 day');
    echo $datetime->format('Y-m-d H:i:s');
});


Route::post('/test','Agent\AgentCreateListingsController@cl');


Route::get('/send-m',function(){
  Mail::to('kenedyakenakenedy@gmail.com')->send(new PropertyCreated());
});

Route::get('/t',function(){
  //date_default_timezone_set("Africa/Kampala");
  return date("Y-m-d h:i:s");
});
