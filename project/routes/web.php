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
use Illuminate\Support\Facades\Input;
use App\Article;

Route::get('/','PagesController@index');
Route::get('/sample','PagesController@sample');
Route::post('/article',function(){
    $q= Input::get('q');
    if($q != ""){
        $search = Article::where('title', 'LIKE', '%' . $q .'%')
                            ->orWhere('description','LIKE', '%'. $q .'%')
                            ->get();
        if(count($search) > 0)
        return view('pages.article')->with('details',$search)->withQuery($q);
        
    }
    return view('pages.article')->withMessage("NO data");
});
Route::get('/blog','PagesController@blog');


Route::resource('/dashboard','DashboardController');
Route::resource('/services','ServicesController')->middleware('auth');
Route::resource('/blogs','BlogController');
Route::resource('/contact','ContactController');
Route::resource('/faq','FaqController');
Route::resource('/product','ProductController');
Route::resource('/testimonials','TestimonialsController');
Route::resource('/dashsample','SampleController');
Route::resource('/dasharticle','ArticleController');
Route::post('/mail','PagesController@sendMail');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
