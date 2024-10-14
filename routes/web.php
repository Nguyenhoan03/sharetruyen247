<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChatController;
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
Route::get('/sitemap',function(){
       $path = public_path('sitemap.xml');
          if (!file_exists($path)) {
        abort(404);
    }

    return response()->file($path, [
        'Content-Type' => 'application/xml'
    ]);
});
Route::group(['prefix' => 'crawler'], function () {
    Route::get('/{category}', [App\Http\Controllers\crawlcontroller::class, 'scrapeMainPage'])
        ->where('category', 'tien-hiep|ngon-tinh|quan-truong|khoa-huyen|huyen-huyen|di-nang|kiem-hiep|dam-my|vong-du|hai-huoc|kinh-di|do-thi|lich-su|truyen-ngan|truyen-ma|tieu-thuyet|truyen-teen|quan-su|xuyen-khong|trinh-tham');
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
    Route::get('/thong-ke-doanh-thu-admin', 'App\Http\Controllers\admincontroller@thongkedoanhthuadmin');

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
  
    Route::get('/', 'App\Http\Controllers\storyusercontroller@index');
    Route::get('/createstory', 'App\Http\Controllers\storyusercontroller@createstory');
    Route::post('/postcreatestory', 'App\Http\Controllers\storyusercontroller@postcreatestory');
    Route::get('/danhsachstory', 'App\Http\Controllers\storyusercontroller@danhsachstory');
    Route::get('/deletestoryuser/{id}', 'App\Http\Controllers\storyusercontroller@deletestoryuser');
    Route::get('/createchapterstory/{title}', 'App\Http\Controllers\storyusercontroller@createchapterstory');
    Route::post('/putediterstory/{title}', 'App\Http\Controllers\storyusercontroller@putediterstory');
    Route::get('/editerstory/{title}', 'App\Http\Controllers\storyusercontroller@editerstory');
    Route::post('/postediterstory/{title}', 'App\Http\Controllers\storyusercontroller@postediterstory');
    Route::get('/danhsachchapter/{title}', 'App\Http\Controllers\storyusercontroller@danhsachchapter');
    Route::get('/editerchapter/{title}/{chapter}', 'App\Http\Controllers\storyusercontroller@editerchapter');
    Route::post('/postediterchapter/{title}/{chapter}', 'App\Http\Controllers\storyusercontroller@postediterchapter');
    Route::get('/views', 'App\Http\Controllers\storyusercontroller@views');
    Route::get('/billingsetup', 'App\Http\Controllers\storyusercontroller@billingsetup');
    Route::post('/createpptt', 'App\Http\Controllers\storyusercontroller@createpptt');
    Route::get('/deletebillingsetup/{id}', 'App\Http\Controllers\storyusercontroller@deletebillingsetup');
    
    Route::get('/thu-phi-user/{title}', 'App\Http\Controllers\storyusercontroller@thuphiuser');
    Route::post('/post-thu-phi-user', 'App\Http\Controllers\storyusercontroller@postthuphiuser');
    Route::post('/traphichapter', 'App\Http\Controllers\storyusercontroller@traphichapter');
   
});
Route::group([ 'middleware' => 'checklogin'], function (){
    Route::get('/roomchat', [ChatController::class, 'index']);
    Route::post('/send', [ChatController::class, 'send']);
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


