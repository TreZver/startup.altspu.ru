<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckProject;
use App\Http\Middleware\CheckStatusProject;

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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['namespace' => 'Projects'], function() {
    Route::get('/projects','IndexController@index')->name('projects');
    Route::post('/projects/likeData','IndexController@getListLike')->name('likedata');
    Route::get('/projects/setlike','IndexController@setLike1')->name('setLike');
});



Route::get('/help', function(){
    return view('help.index');
})->name('help');

Route::group(['namespace' => 'User','prefix' => 'user', 'middleware' => ['verified','role:user']], function() {

    Route::group(['middleware' => [CheckProject::class]], function() {
        Route::get('/', 'IndexController@index')->name('user.index');
        Route::group(['middleware' => [CheckStatusProject::class]], function() {
            Route::get('/edit', 'IndexController@edit')->name('user.edit.index');
            Route::patch('/', 'IndexController@actionUpdate')->name('user.edit.action');
        });
        Route::group(['namespace' => 'Participant','prefix' => 'participant'], function() {
            Route::get('/new', 'IndexController@new')->name('user.participant.new.index');
            Route::get('/edit/{id}', 'IndexController@edit')->name('user.participant.edit');
            Route::get('/{id}', 'IndexController@index')->name('user.participant.index');
            
            Route::post('/', 'IndexController@ActionNew')->name('user.participant.new.action');
            Route::patch('/edit/{id}', 'IndexController@actionUpdate1')->name('user.participant.edit.action');
            Route::patch('/delete/{id}', 'IndexController@actionDelete1')->name('user.participant.delete.action');
        });
    });

    Route::group(['middleware' => [CheckProject::class]], function() {
        Route::get('/new', 'IndexController@new'      )->name('user.new.index');
        Route::post('/'  , 'IndexController@ActionNew')->name('user.new.action');
    });

});



Route::group(['namespace' => 'Main'], function() {
    Route::get('/', 'IndexController');
});

# Admin
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['role:admin']], function() {
    Route::group(['namespace' => 'Main'], function(){
        Route::get('/', IndexController::class)->name('admin.index');
    });

    Route::group(['namespace' => 'ThematicDirection','prefix' => 'thematicdirection'], function(){
        Route::get('/', 'IndexController@index')->name('admin.thematicdirection.index');
        Route::get('/create', 'IndexController@create')->name('admin.thematicdirection.create');
        Route::patch('/{ThematicDirection}', 'IndexController@update')->name('admin.thematicdirection.update');
        Route::delete('/{ThematicDirection}', 'IndexController@delete')->name('admin.thematicdirection.delete');
        Route::post('/', 'IndexController@store')->name('admin.thematicdirection.store');
        Route::get('/{ThematicDirection}/edit', 'IndexController@edit')->name('admin.thematicdirection.edit');
    });
});
Auth::routes(['verify' => true]);

Route::get('/ttt', function(){
    ini_set('max_execution_time', '0');
    $arResult = \App\Models\ProjectLike::where([
        'country' => ''
    ])->get();
    foreach ($arResult as $key => $row) {
        $country = geoip_country_code_by_name($row->ip);
        if ($country === false){
            $row->country = "LOCAL";
        }else{
            $row->country = $country;
        }
        $row->save();
    }
    return "Готово";
});