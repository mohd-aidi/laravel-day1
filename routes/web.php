<?php
Route::get('/', 'PagesController@home');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');

Route::get('product/list', 'ProductController@index');
Route::get('product/view/{id}', 'ProductController@view');
Route::get('product/search/{query}', 'ProductController@search');

Route::get('blade', function (){
    $products = array('Seluar Jeans','Iphone 8','Leather Jacket');
    return view('page',array('name' => 'The Shop', 'day' => 'Friday','products' => $products));
});