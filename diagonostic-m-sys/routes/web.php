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


//Route::get('/all-user', [
//    'uses' => 'UserController@index2',
//    'as' => 'all-user'
//]);
//Route::get('/', [
//    'uses' => 'PrankerController@index',
//    'as' => ''
//]);
//Route::get('/posts', [
//    'uses' => 'PostController@posts',
//    'as' => 'posts'
//]);
Route::get('/', [
    'uses' => 'FrontEndController@index',
    'as' => '/'
]);
Route::get('/unpaid-bill/{from}/{to}', [
    'uses' => 'TestRequestController@unpaidBillList',
    'as' => '/unpaid-bill'
]);
Route::get('/pay-bill/{id}', [
    'uses' => 'TestRequestController@payBill',
    'as' => '/pay-bill'
]);
Route::get('/search-by-bill', [
    'uses' => 'TestController@searchByBillNo',
    'as' => '/search-by-bill'
]);
Route::get('/search-by-mobile', [
    'uses' => 'TestRequestController@searchForPaymentByMobile',
    'as' => '/search-by-mobile'
]);
Route::get('/pdf', [
    'uses' => 'TestRequestController@pdf',
    'as' => '/pdf'
]);
Route::get('/fetch-test-type', [
    'uses' => 'TestTypeController@fetchTypeName',
    'as' => '/fetch-test-type'
]);
Route::get('/fetch-test-info', [
    'uses' => 'TestController@fetchTestName',
    'as' => '/fetch-test-info'
]);
Route::get('/extract-fee/{id}', [
    'uses' => 'TestController@extractFee',
    'as' => '/extract-fee/'
]);
Route::post('/test-type-info', [
    'uses' => 'TestTypeController@saveTestTypeInfo',
    'as' => '/test-type-info'
]);
Route::post('/test-info', [
    'uses' => 'TestController@saveTestInfo',
    'as' => '/test-info'
]);
Route::post('/test-request-info', [
    'uses' => 'TestRequestController@saveTestRequestInfo',
    'as' => '/test-request-info'
]);
