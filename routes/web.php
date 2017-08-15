<?php
Route::get('/', 'PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'TicketsController@create');
Route::post('/contact', 'TicketsController@store');

Route::get('product/list', 'ProductController@index');
Route::get('product/view/{id}', 'ProductController@view');
Route::get('product/search/{query}', 'ProductController@search');

Route::get('blade', function (){
    $products = array('Seluar Jeans','Iphone 8','Leather Jacket');
    return view('page',array('name' => 'The Shop', 'day' => 'Friday','products' => $products));
});

Route::get('/tickets', 'TicketsController@index')->middleware('auth');
Route::get('/ticket/{slug?}', 'TicketsController@show');
Route::get('/ticket/{slug?}/edit','TicketsController@edit');
Route::post('/ticket/{slug?}/edit','TicketsController@update');
Route::post('/ticket/{slug?}/delete','TicketsController@destroy');

Route::get('sendemail', function () {
    $data = array(
        'name' => "Learning Laravel",
    );
    Mail::send('emails.welcome', $data, function ($message) {
        $message->from('aidi@kodewave.my', 'Learning Laravel');
        $message->to('aidi@kodewave.my')->subject('Learning Laravel test email');
    });
    return "Your email has been sent successfully";
});

Route::post('/comment', 'CommentsController@newComment');
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(array('prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'manager'), function () {

    Route::get('/', 'PagesController@home');    

    Route::get('users', [ 'as' => 'admin.user.index', 'uses' => 'UsersController@index']);
    Route::get('roles', 'RolesController@index');
    Route::get('roles/create', 'RolesController@create');
    Route::post('roles/create', 'RolesController@store');

    Route::get('users/{id?}/edit', 'UsersController@edit');
    Route::post('users/{id?}/edit','UsersController@update');


});