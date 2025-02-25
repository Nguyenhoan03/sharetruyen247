<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    Admincontroller,
    Homecontroller,
    Chatcontroller,
    crawlcontroller,
    Storyusercontroller,
    danhmuccategorycontroller,
    detailcontroller,
    chaptercontroller,
    paymentcontroller
};



// Sitemap Route
Route::get('/sitemap', function() {
    $path = public_path('sitemap.xml');
    if (!file_exists($path)) {
        abort(404);
    }
    return response()->file($path, ['Content-Type' => 'application/xml']);
});



Route::group(['prefix' => 'crawler'], function () {
    Route::get('/{category}', [crawlcontroller::class, 'scrapeMainPage'])
        ->where('category', implode('|', [
            'tien-hiep', 'ngon-tinh', 'quan-truong', 'khoa-huyen',
            'huyen-huyen', 'di-nang', 'kiem-hiep', 'dam-my',
            'vong-du', 'hai-huoc', 'kinh-di', 'do-thi',
            'lich-su', 'truyen-ngan', 'truyen-ma', 'tieu-thuyet',
            'truyen-teen', 'quan-su', 'xuyen-khong', 'trinh-tham'
        ]));
});



Route::group(['prefix' => 'pageadmin','middleware' => 'checklogin'], function() {
    Route::controller(Admincontroller::class)->group(function () {
        Route::get('/', 'dashboardadmin');
        Route::get('/thong_tin_user', 'thong_tin_user');
        Route::get('/lich_su_nap_linh_thach_user', 'lich_su_nap_linh_thach_user');
        Route::get('/adminnaplinhthachforuser/{id}', 'nap_linh_thach_user');
        Route::post('/postnap_linh_thach_user', 'post_nap_linh_thach_user');
        Route::get('/duyettruyenuser', 'duyettruyenuser');
        Route::post('/update-trang-thai', 'updateTrangThai');
        Route::get('/xem-chapter/{title}', 'xemchapter');
        Route::get('/thong-ke-doanh-thu-admin', 'thongkedoanhthuadmin');
    });
});



Route::group(['prefix' => 'author'], function () {
    Route::controller(Homecontroller::class)->group(function () {
        Route::get('/loginuser', 'loginuser');
        Route::get('/registeruser', 'registeruser');
        Route::post('/postregisteruser', 'postregisteruser');
        Route::post('/postloginuser', 'postloginuser');
        Route::get('/logout', 'logout');
    });
});



Route::group(['prefix' => 'story_user', 'middleware' => 'checklogin'], function () {
    Route::controller(StoryUserController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/createstory', 'createstory');
        Route::post('/postcreatestory', 'postcreatestory');
        Route::get('/danhsachstory', 'danhsachstory');
        Route::get('/deletestoryuser/{id}', 'deletestoryuser');
        Route::get('/createchapterstory/{title}', 'createchapterstory');
        Route::post('/putediterstory/{title}', 'putediterstory');
        Route::get('/editerstory/{title}', 'editerstory');
        Route::post('/postediterstory/{title}', 'postediterstory');
        Route::get('/danhsachchapter/{title}', 'danhsachchapter');
        Route::get('/editerchapter/{title}/{chapter}', 'editerchapter');
        Route::post('/postediterchapter/{title}/{chapter}', 'postediterchapter');
        Route::get('/views', 'views');
        Route::get('/billingsetup', 'billingsetup');
        Route::post('/createpptt', 'createpptt');
        Route::get('/deletebillingsetup/{id}', 'deletebillingsetup');
        Route::get('/thu-phi-user/{title}', 'thuphiuser');
        Route::post('/post-thu-phi-user', 'postthuphiuser');
        Route::post('/traphichapter', 'traphichapter');
    });
});



Route::group(['middleware' => 'checklogin'], function () {
    Route::get('/roomchat', [Chatcontroller::class, 'index']);
    Route::post('/send', [Chatcontroller::class, 'send']);
});



Route::controller(danhmuccategorycontroller::class)->group(function () {
    // Full Stories Routes
    Route::get('/truyen-tien-hiep-full', 'truyentienhiepfull');
    Route::get('/truyen-kiem-hiep-full', 'truyenkiemhiepfull');
    
    // Hot Stories Routes
    Route::get('/truyen-tien-hiep-hot', 'truyentienhiephot');
    Route::get('/truyen-kiem-hiep-hot', 'truyenkiemhiephot');
    
    // Category Routes
    Route::group(['prefix' => 'the-loai'], function () {
        Route::get('/Tiên Hiệp', 'tienhiep');
        Route::get('/Ngôn Tình', 'ngontinh');
        Route::get('/Quan Trường', 'quantruong');
        Route::get('/Khoa Nguyễn', 'khoanguyen');
        Route::get('/Huyền Huyễn', 'huyenhuyen');
        Route::get('/Dị Năng', 'dinang');
        Route::get('/Kiếm Hiệp', 'kiemhiep');
        Route::get('/Đam Mỹ', 'dammy');
        Route::get('/Võng Du', 'vongdu');
        Route::get('/Hài Hước', 'haihuoc');
        Route::get('/Kinh Dị', 'kinhdi');
        Route::get('/Đô Thị', 'dothi');
        Route::get('/Lịch Sử', 'lichsu');
        Route::get('/Truyện Ma', 'truyenma');
        Route::get('/Truyện Ngắn', 'truyenngan');
        Route::get('/Tiểu Thuyết', 'tieuthuyet');
        Route::get('/Truyện Teen', 'truyenteen');
        Route::get('/Quân Sự', 'quansu');
        Route::get('/Xuyên Không', 'xuyenkhong');
        Route::get('/Trinh Thám', 'trinhtham');
    });
});


Route::post('/payment/vnpay', [paymentcontroller::class, 'createPayment'])->name('payment.vnpay');
Route::get('/payment/vnpay-return', [paymentcontroller::class, 'paymentReturn'])->name('payment.vnpay.return');
Route::post('/grant_linhthach', [chaptercontroller::class, 'grant_linhthach']);
Route::get('/', [Homecontroller::class, 'index']);
Route::get('/search', [Homecontroller::class, 'search']);
Route::get('/{title}', [detailcontroller::class, 'index']);
Route::get('/{title}/{chapter}', [chaptercontroller::class, 'index']);

