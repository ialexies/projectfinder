<?php

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

use App\Tag;
use App\Company;
use App\Project;
use App\Category;
use App\Tagoption;
use App\Projecttag;


/*
|--------------------------------------------------------------------------
| Navigation Route
|--------------------------------------------------------------------------
|
|
*/

Route::get('/project/{id}/tag', function ($id) {
  $projects = Project::find($id);
  $projects->tags;
  foreach($projects->tags as $tag){
    echo $tag->name;
  }
});


  ///////////  Client Side  ////////////////

    Route::get('/test', function (){
      return 'hello test';   
      
    });

    // Route::get('/', 'ControllerPages@getHome');
    
    Route::get('/', 'ControllerProject@showall');

    Route::get('/about', 'ControllerPages@getAbout');

    Route::get('/projects', 'ControllerProject@showall');

    Route::get('/projects/read', function () {
      $projects=Project::all();
      foreach($projects as $project){
          echo $project->title. '<br>';}
    });

    
  ///////////  Admin Navigations ////////////////
    Route::get('/admin', 'ControllerPages@get_admin_dashboard');
    Route::get('/admin_tags', 'tagController@show_all');
    Route::post('/admin_tags/store', 'TagController@store');
    Route::resource('tags', 'TagController');
 
  

/*
|--------------------------------------------------------------------------
| Static Read Data
|--------------------------------------------------------------------------
|
|
*/
Route::get('/projects/{id}/tags', function ($id) {
  $project = Project::find($id);
  echo "The tags of $project->title are: <br>";
  // foreach($project->tags as $tag){
  //   echo $tag->name." " ; 
  // }

  echo $project->tags;
});



Route::get('/projects/{id}/companies', function ($id) {
  
  $company = Company::find($id);   //Take note that it is searching for user id
  foreach($company->projects as $project){
    echo $project->title . "<br>";   // use echo to list all,  return will overwrite and show only 1.
  }

});



Route::get('/projects/{id}/category', function ($id) {
  
  return Project::find($id)->category->name;
  
});

/*
|--------------------------------------------------------------------------
| Static Insert of Data
|--------------------------------------------------------------------------
|
|
*/

Route::get('/insert', function (){
  $proj_arr= array("PSD to Wordpress", "Need Help in C Language", "Build a Website", "Website Designer", "Php script to get pivot", "Create Wordpress Plugin", "Create MT4EA", "Senior PHP freelancers", "Need Web Designer", "Remove Background of Image", "Facebook Add & Analytics", "Marketing Assistant" );

  for ($x=1; $x<=5;$x++){
    $project = new Project;
    $project->title="$proj_arr[$x]";
    $project->description="The quick brown fox jumps over the lazy dog. The quick brown fox jumps over the lazy dog. Because the dog is a stupid dumb ass dog";
    $project->budget=$x."000-".$x."500";
    $project->category_id="Company $x";
    $project->tag_id="Programming HTML Website PSD Song Video";
    $project->company_id=rand(1,3);
    $project->save();
  }

  $cat_arr= array("Wordpress", "Web App", "Movie", "Animation", " Vector Art" );
  for ($x=0; $x<=4;$x++){
    $category = new Category;
    $category->project_id="$x";
    $category->name="$cat_arr[$x]";
    $category->save();
  }


//     $tagoptions_arr= array("psd", "Illustrator", "Mysql", "Php", "Bootstrap", "Angular", "HTML", "Aftereffects" );
//     for ($x=0; $x<=7;$x++){
//         $Tagoptions = new Tagoption;
//         $Tagoptions->Tagoptions_id="$x";
//         $Tagoptions->name="$tagoptions_arr[$x]";
//         $Tagoptions->save();
//     }

  $tags_arr= array("psd", "Illustrator", "Mysql", "Php", "Bootstrap", "Angular", "HTML", "Aftereffects" );
  for ($x=0; $x<=7;$x++){
    $tags = new Tag;
    $tags->name="$tags_arr[$x]";
    $tags->save();
  }

  $companies_name= array("Captivate Solution", "Safira Philippines", "KS Digital", "Meralco", "Maynilad", "NSA", "National Geographic", "Times Magazine" );
  $companies_contact= array("09496663545", "256-987", "092563694", "634-65723", "963548333", "09296589878", "09344563233", "222-2851" );
  $companies_add= array("518 pdro gil malate manila", "542 brgy. 678 Quezyo City", "Brgy. Dimakita Caloocan", "Brgy Sibul, Leyte", "Tipo Hermosa Bataan", "Marikit rod Olongapo City", "Neww Kalalake Olongapo City", "245 Woodhouse Gordon Heights" );
  $companies_email=array("1243@gmail.com","xygerma@yahoo.com", "monkeydluffy@gmail.com", "zoro@onepiece.com", "einstein.geniusblog.com", "safehaven@safe.com", "angelfist@gmail.com", "Times@gmail.com");
  for ($x=0; $x<=7;$x++){
    $companies = new Company;
    $companies->name="$companies_name[$x]";
    $companies->contactno="$companies_contact[$x]";
    $companies->address="$companies_add[$x]";
    $companies->email="$companies_email[$x]";
    $companies->save();
  }
});

Route::group(['prefix' => '/admin/tags'], function () {
  Route::get('/', 'AdminTagCrudController@index');
  Route::match(['get', 'post'], 'create', 'AdminTagCrudController@create');
  Route::match(['get', 'put'], 'update/{id}', 'AdminTagCrudController@update');
  Route::delete('delete/{id}', 'AdminTagCrudController@delete');
});

Route::group(['prefix' => '/admin/categories'], function () {
  Route::get('/', 'AdminCategoryCrudController@index');
  Route::match(['get', 'post'], 'create', 'AdminCategoryCrudController@create');
  Route::match(['get', 'put'], 'update/{id}', 'AdminCategoryCrudController@update');
  Route::delete('delete/{id}', 'AdminCategoryCrudController@delete');
});


Route::group(['prefix' => '/admin/companies'], function () {
  Route::get('/', 'AdminCompanyCrudController@index');
  Route::match(['get', 'post'], 'create', 'AdminCompanyCrudController@create');
  Route::match(['get', 'put'], 'update/{id}', 'AdminCompanyCrudController@update');
  Route::delete('delete/{id}', 'AAdminCompanyCrudController@delete');
});

Route::group(['prefix' => '/admin/projects'], function () {
  Route::get('/', 'AdminProjectCrudController@index');
  Route::match(['get', 'post'], 'create', 'AdminProjectCrudController@create');
  Route::match(['get', 'put'], 'update/{id}', 'AdminProjectCrudController@update');
  Route::delete('delete/{id}', 'AdminProjectCrudController@delete');
});





Route::get('/admin/sync', function () {
	$user = Project::findOrFail(1);
	$user->tags()->sync([1,2,3]); 
	// So it will sync the data from role to the user with an array that. For example
	// you have a user id that has multiple roles id of 1,2,4,5 
	// It will enter all the the data to the role_user with different types, if there is any 
	// data that entered with the following user id but not in the value of the sync array, it will be deleted. 
});