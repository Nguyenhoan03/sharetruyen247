<?php

use Illuminate\Support\Facades\Route;

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
Route::group(['prefix'=>'crawler'],function(){
    Route::get('/tien-hiep','App\Http\Controllers\crawler\tienhiep@scrapeMainPage');
    Route::get('/ngon-tinh','App\Http\Controllers\crawler\ngontinh@scrapeMainPage');
    Route::get('/quan-truong','App\Http\Controllers\crawler\quantruong@scrapeMainPage');
    Route::get('/khoa-huyen','App\Http\Controllers\crawler\khoahuyen@scrapeMainPage');
    Route::get('/huyen-huyen','App\Http\Controllers\crawler\huyenhuyen@scrapeMainPage');
    Route::get('/di-nang','App\Http\Controllers\crawler\dinang@scrapeMainPage');
    Route::get('/kiem-hiep','App\Http\Controllers\crawler\kiemhiep@scrapeMainPage');
    Route::get('/dam-my','App\Http\Controllers\crawler\dammy@scrapeMainPage');
    Route::get('/vong-du','App\Http\Controllers\crawler\vongdu@scrapeMainPage');
    Route::get('/hai-huoc','App\Http\Controllers\crawler\haihuoc@scrapeMainPage');
    Route::get('/kinh-di','App\Http\Controllers\crawler\kinhdi@scrapeMainPage');
    Route::get('/do-thi','App\Http\Controllers\crawler\dothi@scrapeMainPage');
    Route::get('/lich-su','App\Http\Controllers\crawler\lichsu@scrapeMainPage');
    Route::get('/truyen-ngan','App\Http\Controllers\crawler\truyenngan@scrapeMainPage');
    Route::get('/truyen-ma','App\Http\Controllers\crawler\truyenma@scrapeMainPage');
    Route::get('/tieu-thuyet','App\Http\Controllers\crawler\tieuthuyet@scrapeMainPage');
    Route::get('/truyen-teen','App\Http\Controllers\crawler\truyenteen@scrapeMainPage');
    Route::get('/quan-su','App\Http\Controllers\crawler\quansu@scrapeMainPage');
    Route::get('/xuyen-khong','App\Http\Controllers\crawler\xuyenkhong@scrapeMainPage');
    Route::get('/trinh-tham','App\Http\Controllers\crawler\trinhtham@scrapeMainPage');

});


Route::group(['prefix' => 'pageadmin'],function(){
    Route::get('/','App\Http\Controllers\admincontroller@dashboardadmin');
    Route::get('/thong_tin_user','App\Http\Controllers\admincontroller@thong_tin_user');
    Route::get('/lich_su_nap_linh_thach_user','App\Http\Controllers\admincontroller@lich_su_nap_linh_thach_user');
    Route::get('/adminnaplinhthachforuser/{id}','App\Http\Controllers\admincontroller@nap_linh_thach_user');
    Route::post('/postnap_linh_thach_user','App\Http\Controllers\admincontroller@postnap_linh_thach_user');
    Route::get('/duyettruyenuser','App\Http\Controllers\admincontroller@duyettruyenuser');
    Route::post('/update-trang-thai', 'App\Http\Controllers\admincontroller@updateTrangThai');
    Route::get('/xem-chapter/{title}', 'App\Http\Controllers\admincontroller@xemchapter');

});


Route::group(['prefix' => 'author'], function (){
    Route::get('/loginuser','App\Http\Controllers\homecontroller@loginuser');
    Route::get('/registeruser','App\Http\Controllers\homecontroller@registeruser');
    Route::post('/postregisteruser','App\Http\Controllers\homecontroller@postregisteruser');
    Route::post('/postloginuser','App\Http\Controllers\homecontroller@postloginuser');
    Route::get('/logout','App\Http\Controllers\homecontroller@logout');
});

Route::get('/truyen-tien-hiep-full','App\Http\Controllers\danhmuccategorycontroller@truyentienhiepfull');
Route::get('/truyen-tien-hiep-hot','App\Http\Controllers\danhmuccategorycontroller@truyentienhiephot');

Route::get('/truyen-kiem-hiep-full','App\Http\Controllers\danhmuccategorycontroller@truyenkiemhiepfull');
Route::get('/truyen-kiem-hiep-hot','App\Http\Controllers\danhmuccategorycontroller@truyenkiemhiephot');

Route::group(['prefix' => 'story_user', 'middleware' => 'checklogin'], function () {
    Route::get('/', 'App\Http\Controllers\StoryUserController@index');
    Route::get('/createstory', 'App\Http\Controllers\StoryUserController@createstory');
    Route::post('/postcreatestory', 'App\Http\Controllers\StoryUserController@postcreatestory');
    Route::get('/danhsachstory', 'App\Http\Controllers\StoryUserController@danhsachstory');
    Route::get('/deletestoryuser/{id}', 'App\Http\Controllers\StoryUserController@deletestoryuser');
    Route::get('/createchapterstory/{title}', 'App\Http\Controllers\StoryUserController@createchapterstory');
    Route::post('/putediterstory/{title}', 'App\Http\Controllers\StoryUserController@putediterstory');
    Route::get('/editerstory/{title}', 'App\Http\Controllers\StoryUserController@editerstory');
    Route::post('/postediterstory/{title}', 'App\Http\Controllers\StoryUserController@postediterstory');
    Route::get('/danhsachchapter/{title}', 'App\Http\Controllers\StoryUserController@danhsachchapter');
    Route::get('/editerchapter/{title}/{chapter}', 'App\Http\Controllers\StoryUserController@editerchapter');
    Route::post('/postediterchapter/{title}/{chapter}', 'App\Http\Controllers\StoryUserController@postediterchapter');
    Route::get('/views', 'App\Http\Controllers\StoryUserController@views');
    Route::get('/billingsetup', 'App\Http\Controllers\StoryUserController@billingsetup');
    Route::post('/createpptt', 'App\Http\Controllers\StoryUserController@createpptt');
    Route::get('/deletebillingsetup/{id}', 'App\Http\Controllers\StoryUserController@deletebillingsetup');
    
    Route::get('/thu-phi-user/{title}', 'App\Http\Controllers\StoryUserController@thuphiuser');
    Route::post('/post-thu-phi-user', 'App\Http\Controllers\StoryUserController@postthuphiuser');
    Route::post('/traphichapter', 'App\Http\Controllers\StoryUserController@traphichapter');
 
});




Route::group(['prefix' => 'the-loai'], function () {
    Route::get('/Tiên Hiệp', 'App\Http\Controllers\danhmuccategorycontroller@tienhiep');
    Route::get('/Ngôn Tình', 'App\Http\Controllers\danhmuccategorycontroller@ngontinh');
    Route::get('/Quan Trường', 'App\Http\Controllers\danhmuccategorycontroller@quantruong');
    Route::get('/Khoa Nguyễn', 'App\Http\Controllers\danhmuccategorycontroller@khoanguyen');
    Route::get('/Huyền Huyễn', 'App\Http\Controllers\danhmuccategorycontroller@huyenhuyen');
    Route::get('/Dị Năng', 'App\Http\Controllers\danhmuccategorycontroller@dinang');
    Route::get('/Kiếm Hiệp', 'App\Http\Controllers\danhmuccategorycontroller@kiemhiep');
    Route::get('/Đam Mỹ', 'App\Http\Controllers\danhmuccategorycontroller@dammy');
    Route::get('/Võng Du', 'App\Http\Controllers\danhmuccategorycontroller@vongdu');
    Route::get('/Hài Hước', 'App\Http\Controllers\danhmuccategorycontroller@haihuoc');
    Route::get('/Kinh Dị', 'App\Http\Controllers\danhmuccategorycontroller@kinhdi');
    Route::get('/Đô Thị', 'App\Http\Controllers\danhmuccategorycontroller@dothi');
    Route::get('/Lịch Sử', 'App\Http\Controllers\danhmuccategorycontroller@lichsu');
    Route::get('/Truyện Ma', 'App\Http\Controllers\danhmuccategorycontroller@truyenma');
    Route::get('/Truyện Ngắn', 'App\Http\Controllers\danhmuccategorycontroller@truyenngan');
    Route::get('/Tiểu Thuyết', 'App\Http\Controllers\danhmuccategorycontroller@tieuthuyet');
    Route::get('/Truyện Teen', 'App\Http\Controllers\danhmuccategorycontroller@truyenteen');
    Route::get('/Quân Sự', 'App\Http\Controllers\danhmuccategorycontroller@quansu');
    Route::get('/Xuyên Không', 'App\Http\Controllers\danhmuccategorycontroller@xuyenkhong');
    Route::get('/Trinh Thám', 'App\Http\Controllers\danhmuccategorycontroller@trinhtham');
});




Route::post('/grant_linhthach','App\Http\Controllers\chaptercontroller@grant_linhthach');

Route::get('/','App\Http\Controllers\homecontroller@index');
Route::get('/search','App\Http\Controllers\homecontroller@search');
Route::get('/{title}','App\Http\Controllers\detailcontroller@index');
Route::get('/{title}/{chapter}','App\Http\Controllers\chaptercontroller@index');



