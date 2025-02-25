<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <title>truyenhay247 - {{$data->title}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  
 

    <link href="{{asset('assets/bootstrap.min.css')}}" rel="stylesheet">

    <link rel="shortcut icon" href="https://suustore.com/assets/frontend/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('/assets/app.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script data-cfasync='false' src='//wwr.hlinit.com/?tag=1e572c05'></script>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-QH7RWSDBDK"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-QH7RWSDBDK');
</script>
<style>
    .payment-container {
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    margin: 20px auto;
    max-width: 600px;
}

.payment-title {
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 10px;
}

.payment-info, .payment-methods, .payment-qr, .payment-note, .payment-security {
    margin-bottom: 20px;
}

.user-info {
    display: inline-block;
}

.payment-method, .payment-note p {
    margin: 5px 0;
}

.payment-security img {
    vertical-align: middle;
    margin-right: 10px;
}
.payment-container{
    display: none;
}

</style>
    </header>

<body>
@include('header')


    <main>

        <input type="hidden" id="story_slug" value="nang-khong-muon-lam-hoang-hau">
        <div class="container" style="margin-top:-10px">
            <div class="row align-items-start">
                <div class="col-12 col-md-7 col-lg-8">
                    <div class="head-title-global d-flex justify-content-between mb-4">
                        <div class="col-12 col-md-12 col-lg-4 head-title-global__left d-flex">
                            <h2 class="me-2 mb-0 border-bottom border-secondary pb-1">
                                <span class="d-block text-decoration-none text-dark fs-4 title-head-name"
                                    title="Thông tin truyện">Thông
                                    tin truyện</span>
                            </h2>
                        </div>
                    </div>

                    <div class="story-detail">
                        <div class="story-detail__top d-flex align-items-start">
                            <div class="row align-items-start">
                                <div class="col-12 col-md-12 col-lg-3 story-detail__top--image">
                                    <div class="book-3d">
                                      
@if ($data && (Str::startsWith($data->image, 'https://') || Str::startsWith($data->image, 'http://')))
    <img loading="lazy" src="{{ $data->image }}" alt="" class="img-fluid" width="150" height="230" loading="lazy">
@elseif ($data)
    <img loading="lazy" src="{{ asset('upload/' . $data->image) }}" alt="" class="img-fluid" width="150" height="230" loading="lazy">
@else
    <p>No image data available.</p>
@endif



                                    </div>
                                </div>
                                <div class="col-12 col-md-12 col-lg-9">
                                    <h3 class="text-center story-name">{{$data->title}}</h3>
                                    <div class="rate-story mb-2">
                                        <div class="rate-story__holder" data-score="7.0">


                                            <img alt="1" src="./assets/images/star-on.png">



                                            <img alt="2" src="./assets/images/star-on.png">



                                            <img alt="3" src="./assets/images/star-on.png">



                                            <img alt="4" src="./assets/images/star-on.png">



                                            <img alt="5" src="./assets/images/star-on.png">



                                            <img alt="6" src="./assets/images/star-on.png">



                                            <img alt="7" src="./assets/images/star-half.png">



                                            <img alt="8" src="./assets/images/star-off.png">



                                            <img alt="9" src="./assets/images/star-off.png">



                                            <img alt="10" src="./assets/images/star-off.png">




                                        </div>
                                        <em class="rate-story__text"></em>
                                        <div class="rate-story__value" itemprop="aggregateRating" itemscope=""
                                            itemtype="https://schema.org/AggregateRating">
                                            <em>Đánh giá:
                                                <strong>
                                                    <span itemprop="ratingValue">7.0</span>
                                                </strong>
                                                /
                                                <span class="" itemprop="bestRating">10</span>
                                                từ
                                                <strong>
                                                    <span itemprop="ratingCount">415</span>
                                                    lượt
                                                </strong>
                                            </em>
                                        </div>
                                    </div>

                                    <div class="story-detail__top--desc px-3" style="max-height: 285px;">
                                        {{$data->descripts}}
                                    </div>

                                    <div class="info-more">
                                        <div class="info-more--more active" id="info_more">
                                            <span class="me-1 text-dark">Xem thêm</span>
                                            <svg width="14" height="8" viewBox="0 0 14 8" fill="none"
                                                xmlns="{{$data->image}}">
                                                <path
                                                    d="M7.70749 7.70718L13.7059 1.71002C14.336 1.08008 13.8899 0.00283241 12.9989 0.00283241L1.002 0.00283241C0.111048 0.00283241 -0.335095 1.08008 0.294974 1.71002L6.29343 7.70718C6.68394 8.09761 7.31699 8.09761 7.70749 7.70718Z"
                                                    fill="#2C2C37"></path>
                                            </svg>
                                        </div>

                                        <a class="info-more--collapse text-decoration-none"
                                            href="#">
                                            <span class="me-1 text-dark">Thu gọn</span>
                                            <svg width="14" height="8" viewBox="0 0 14 8" fill="none"
                                                xmlns="{{$data->image}}">
                                                <path
                                                    d="M7.70749 0.292817L13.7059 6.28998C14.336 6.91992 13.8899 7.99717 12.9989 7.99717L1.002 7.99717C0.111048 7.99717 -0.335095 6.91992 0.294974 6.28998L6.29343 0.292817C6.68394 -0.097606 7.31699 -0.0976055 7.70749 0.292817Z"
                                                    fill="#2C2C37"></path>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="story-detail__bottom mb-3">
                            <div class="row">
                                <div class="col-12 col-md-12 col-lg-3 story-detail__bottom--info">
                                    <p class="mb-1">
                                        <strong>Tác giả:</strong>
                                        <a href="#"
                                            class="text-decoration-none text-dark hover-title">{{$data->tacgia}}</a>
                                    </p>
                                    <div class="d-flex align-items-center mb-1 flex-wrap">
                                        <strong class="me-1">Thể loại:</strong>
                                        <div class="d-flex align-items-center flex-warp">
                                            <a href="category.html"
                                                class="text-decoration-none text-dark hover-title  me-1 "
                                                style="width: max-content;">{{$data->theloai}}
                                            </a>


                                           
                                        </div>
                                    </div>

                                    <p class="mb-1">
                                        <strong>Trạng thái:</strong>
                                        <span class="">{{$data->trangthai}}</span>
                                    </p>

                                    <p class="mb-1">
                                        <strong>Nguồn:</strong>
                                        <span class="">{{$data->nguon}}</span>
                                    </p>

                                    <p class="mb-1">
                                        <strong>Lượt xem:</strong>
                                        <span class="">{{$data->viewers}}</span>
                                    </p>
                                </div>

                            </div>
                        </div>

                        <div class="story-detail__list-chapter" >
                            <div class="head-title-global d-flex justify-content-between mb-4">
                                <div class="col-6 col-md-12 col-lg-4 head-title-global__left d-flex">
                                    <h2 class="me-2 mb-0 border-bottom border-secondary pb-1">
                                        <span href="#"
                                            class="d-block text-decoration-none text-dark fs-4 title-head-name"
                                            title="Truyện hot">Danh sách chương</span>
                                    </h2>
                                </div>
                            </div>

                            <div class="story-detail__list-chapter--list">
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-lg-6 story-detail__list-chapter--list__item">
                                    <ul class="list-group" >
                                        @foreach($datachapter as $chapter)
                                            <li class="list-group-item" style="width: 100%">
                                                <a href="/{{$chapter->title}}/{{$chapter->chapter}}" class="text-decoration-none text-dark hover-title">
                                                    {{ $chapter->chapter }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>

                                    <!-- Hiển thị nút phân trang với Bootstrap styling -->
                                    <div class="d-flex justify-content-center">
                                        {{ $datachapter->onEachSide(2)->links('pagination::bootstrap-4') }}
                                    </div>
                                     
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <div class="pagination" style="justify-content: center;">
                            <ul>
                                <li class="pagination__item  page-current">
                                    <a class="page-link story-ajax-paginate"
                                        data-url="https://suustore.com/truyen/nang-khong-muon-lam-hoang-hau?page=1"
                                        style="cursor: pointer;">1</a>
                                </li>
                                <li class="pagination__item ">
                                    <a class="page-link story-ajax-paginate"
                                        data-url="https://suustore.com/truyen/nang-khong-muon-lam-hoang-hau?page=2"
                                        style="cursor: pointer;">2</a>
                                </li>

                                <div class="dropup-center dropup choose-paginate me-1">
                                    <button class="btn btn-success dropdown-toggle" type="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Chọn trang
                                    </button>
                                    <div class="dropdown-menu">
                                        <input type="number" class="form-control input-paginate me-1" value="">
                                        <button class="btn btn-success btn-go-paginate">
                                            Đi
                                        </button>
                                    </div>
                                </div>

                                <li class="pagination__arrow pagination__item">
                                    <a data-url="https://suustore.com/truyen/nang-khong-muon-lam-hoang-hau?page=2"
                                        style="cursor: pointer;"
                                        class="text-decoration-none w-100 h-100 d-flex justify-content-center align-items-center story-ajax-paginate">
                                        &gt;&gt;
                                    </a>
                                </li>
                            </ul>

                        </div> -->
                    </div>
                </div>

                <div class="col-12 col-md-5 col-lg-4 sticky-md-top">

                    <div class="row top-ratings">
                        <div class="col-12 top-ratings__tab mb-2">
                            <div class="list-group d-flex flex-row" id="list-tab" role="tablist">
                                <a class="list-group-item list-group-item-action active" id="top-day-list"
                                    data-bs-toggle="list"
                                    href="https://suustore.com/truyen/nang-khong-muon-lam-hoang-hau#top-day" role="tab"
                                    aria-controls="top-day" aria-selected="true">Ngày</a>
                                <a class="list-group-item list-group-item-action" id="top-month-list"
                                    data-bs-toggle="list"
                                    href="https://suustore.com/truyen/nang-khong-muon-lam-hoang-hau#top-month"
                                    role="tab" aria-controls="top-month" aria-selected="false" tabindex="-1">Tháng</a>
                                <a class="list-group-item list-group-item-action" id="top-all-time-list"
                                    data-bs-toggle="list"
                                    href="https://suustore.com/truyen/nang-khong-muon-lam-hoang-hau#top-all-time"
                                    role="tab" aria-controls="top-all-time" aria-selected="false" tabindex="-1">All
                                    time</a>
                            </div>
                        </div>
                        <div class="col-12 top-ratings__content">
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="top-day" role="tabpanel"
                                    aria-labelledby="top-day-list">
                                    <ul>
                                        <li>
                                            <div class="rating-item d-flex align-items-center">
                                                <div class="rating-item__number bg-danger rounded-circle">
                                                    <span class="text-light">1</span>
                                                </div>
                                                <div class="rating-item__story">
                                                    <a href="https://suustore.com/truyen/linh-vu-thien-ha"
                                                        class="text-decoration-none hover-title rating-item__story--name text-one-row">Linh
                                                        Vũ Thiên Hạ</a>
                                                    <div class="d-flex flex-wrap rating-item__story--categories">
                                                        <a href="https://suustore.com/the-loai/tien-hiep"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Tiên
                                                            Hiệp
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/di-gioi"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Dị
                                                            Giới
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/huyen-huyen"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Huyền
                                                            Huyễn
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/xuyen-khong"
                                                            class="text-decoration-none text-dark hover-title ">Xuyên
                                                            Không
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="rating-item d-flex align-items-center">
                                                <div class="rating-item__number bg-success rounded-circle">
                                                    <span class="text-light">2</span>
                                                </div>
                                                <div class="rating-item__story">
                                                    <a href="https://suustore.com/truyen/than-dao-dan-ton"
                                                        class="text-decoration-none hover-title rating-item__story--name text-one-row">Thần
                                                        Đạo Đan Tôn</a>
                                                    <div class="d-flex flex-wrap rating-item__story--categories">
                                                        <a href="https://suustore.com/the-loai/tien-hiep"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Tiên
                                                            Hiệp
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/huyen-huyen"
                                                            class="text-decoration-none text-dark hover-title ">Huyền
                                                            Huyễn
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="rating-item d-flex align-items-center">
                                                <div class="rating-item__number bg-info rounded-circle">
                                                    <span class="text-light">3</span>
                                                </div>
                                                <div class="rating-item__story">
                                                    <a href="https://suustore.com/truyen/me-vo-khong-loi-ve"
                                                        class="text-decoration-none hover-title rating-item__story--name text-one-row">Mê
                                                        Vợ Không Lối Về</a>
                                                    <div class="d-flex flex-wrap rating-item__story--categories">
                                                        <a href="https://suustore.com/the-loai/ngon-tinh"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Ngôn
                                                            Tình
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/nguoc"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Ngược
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/sung"
                                                            class="text-decoration-none text-dark hover-title ">Sủng
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="rating-item d-flex align-items-center">
                                                <div class="rating-item__number bg-light border rounded-circle">
                                                    <span class="text-dark">4</span>
                                                </div>
                                                <div class="rating-item__story">
                                                    <a href="https://suustore.com/truyen/dau-pha-thuong-khung"
                                                        class="text-decoration-none hover-title rating-item__story--name text-one-row">Đấu
                                                        Phá Thương Khung</a>
                                                    <div class="d-flex flex-wrap rating-item__story--categories">
                                                        <a href="https://suustore.com/the-loai/tien-hiep"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Tiên
                                                            Hiệp
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/di-gioi"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Dị
                                                            Giới
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/huyen-huyen"
                                                            class="text-decoration-none text-dark hover-title ">Huyền
                                                            Huyễn
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="rating-item d-flex align-items-center">
                                                <div class="rating-item__number bg-light border rounded-circle">
                                                    <span class="text-dark">5</span>
                                                </div>
                                                <div class="rating-item__story">
                                                    <a href="https://suustore.com/truyen/the-gioi-hoan-my"
                                                        class="text-decoration-none hover-title rating-item__story--name text-one-row">Thế
                                                        Giới Hoàn Mỹ</a>
                                                    <div class="d-flex flex-wrap rating-item__story--categories">
                                                        <a href="https://suustore.com/the-loai/tien-hiep"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Tiên
                                                            Hiệp
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/kiem-hiep"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Kiếm
                                                            Hiệp
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/huyen-huyen"
                                                            class="text-decoration-none text-dark hover-title ">Huyền
                                                            Huyễn
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="rating-item d-flex align-items-center">
                                                <div class="rating-item__number bg-light border rounded-circle">
                                                    <span class="text-dark">6</span>
                                                </div>
                                                <div class="rating-item__story">
                                                    <a href="https://suustore.com/truyen/co-vo-ngot-ngao-co-chut-bat-luong-vo-moi-bat-luong-co-chut-ngot"
                                                        class="text-decoration-none hover-title rating-item__story--name text-one-row">Cô
                                                        Vợ Ngọt Ngào Có Chút Bất Lương (Vợ Mới Bất Lương Có Chút
                                                        Ngọt)</a>
                                                    <div class="d-flex flex-wrap rating-item__story--categories">
                                                        <a href="https://suustore.com/the-loai/ngon-tinh"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Ngôn
                                                            Tình
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/trong-sinh"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Trọng
                                                            Sinh
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/sung"
                                                            class="text-decoration-none text-dark hover-title ">Sủng
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="rating-item d-flex align-items-center">
                                                <div class="rating-item__number bg-light border rounded-circle">
                                                    <span class="text-dark">7</span>
                                                </div>
                                                <div class="rating-item__story">
                                                    <a href="https://suustore.com/truyen/pham-nhan-tu-tien"
                                                        class="text-decoration-none hover-title rating-item__story--name text-one-row">Phàm
                                                        Nhân Tu Tiên</a>
                                                    <div class="d-flex flex-wrap rating-item__story--categories">
                                                        <a href="https://suustore.com/the-loai/tien-hiep"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Tiên
                                                            Hiệp
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/kiem-hiep"
                                                            class="text-decoration-none text-dark hover-title ">Kiếm
                                                            Hiệp
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="rating-item d-flex align-items-center">
                                                <div class="rating-item__number bg-light border rounded-circle">
                                                    <span class="text-dark">8</span>
                                                </div>
                                                <div class="rating-item__story">
                                                    <a href="https://suustore.com/truyen/nhat-niem-vinh-hang"
                                                        class="text-decoration-none hover-title rating-item__story--name text-one-row">Nhất
                                                        Niệm Vĩnh Hằng</a>
                                                    <div class="d-flex flex-wrap rating-item__story--categories">
                                                        <a href="https://suustore.com/the-loai/tien-hiep"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Tiên
                                                            Hiệp
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/huyen-huyen"
                                                            class="text-decoration-none text-dark hover-title ">Huyền
                                                            Huyễn
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="rating-item d-flex align-items-center">
                                                <div class="rating-item__number bg-light border rounded-circle">
                                                    <span class="text-dark">9</span>
                                                </div>
                                                <div class="rating-item__story">
                                                    <a href="https://suustore.com/truyen/de-ba"
                                                        class="text-decoration-none hover-title rating-item__story--name text-one-row">Đế
                                                        Bá</a>
                                                    <div class="d-flex flex-wrap rating-item__story--categories">
                                                        <a href="https://suustore.com/the-loai/huyen-huyen"
                                                            class="text-decoration-none text-dark hover-title ">Huyền
                                                            Huyễn
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="rating-item d-flex align-items-center">
                                                <div class="rating-item__number bg-light border rounded-circle">
                                                    <span class="text-dark">10</span>
                                                </div>
                                                <div class="rating-item__story">
                                                    <a href="https://suustore.com/truyen/re-quy-troi-cho"
                                                        class="text-decoration-none hover-title rating-item__story--name text-one-row">Rể
                                                        Quý Trời Cho</a>
                                                    <div class="d-flex flex-wrap rating-item__story--categories">
                                                        <a href="https://suustore.com/the-loai/ngon-tinh"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Ngôn
                                                            Tình
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/do-thi"
                                                            class="text-decoration-none text-dark hover-title ">Đô Thị
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="tab-pane fade" id="top-month" role="tabpanel"
                                    aria-labelledby="top-month-list">
                                    <ul>
                                        <li>
                                            <div class="rating-item d-flex align-items-center">
                                                <div class="rating-item__number bg-danger rounded-circle">
                                                    <span class="text-light">1</span>
                                                </div>
                                                <div class="rating-item__story">
                                                    <a href="https://suustore.com/truyen/linh-vu-thien-ha"
                                                        class="text-decoration-none hover-title rating-item__story--name text-one-row">Linh
                                                        Vũ Thiên Hạ</a>
                                                    <div class="d-flex flex-wrap rating-item__story--categories">
                                                        <a href="https://suustore.com/the-loai/tien-hiep"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Tiên
                                                            Hiệp
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/di-gioi"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Dị
                                                            Giới
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/huyen-huyen"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Huyền
                                                            Huyễn
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/xuyen-khong"
                                                            class="text-decoration-none text-dark hover-title ">Xuyên
                                                            Không
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="rating-item d-flex align-items-center">
                                                <div class="rating-item__number bg-success rounded-circle">
                                                    <span class="text-light">2</span>
                                                </div>
                                                <div class="rating-item__story">
                                                    <a href="https://suustore.com/truyen/than-dao-dan-ton"
                                                        class="text-decoration-none hover-title rating-item__story--name text-one-row">Thần
                                                        Đạo Đan Tôn</a>
                                                    <div class="d-flex flex-wrap rating-item__story--categories">
                                                        <a href="https://suustore.com/the-loai/tien-hiep"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Tiên
                                                            Hiệp
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/huyen-huyen"
                                                            class="text-decoration-none text-dark hover-title ">Huyền
                                                            Huyễn
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="rating-item d-flex align-items-center">
                                                <div class="rating-item__number bg-info rounded-circle">
                                                    <span class="text-light">3</span>
                                                </div>
                                                <div class="rating-item__story">
                                                    <a href="https://suustore.com/truyen/me-vo-khong-loi-ve"
                                                        class="text-decoration-none hover-title rating-item__story--name text-one-row">Mê
                                                        Vợ Không Lối Về</a>
                                                    <div class="d-flex flex-wrap rating-item__story--categories">
                                                        <a href="https://suustore.com/the-loai/ngon-tinh"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Ngôn
                                                            Tình
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/nguoc"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Ngược
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/sung"
                                                            class="text-decoration-none text-dark hover-title ">Sủng
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="rating-item d-flex align-items-center">
                                                <div class="rating-item__number bg-light border rounded-circle">
                                                    <span class="text-dark">4</span>
                                                </div>
                                                <div class="rating-item__story">
                                                    <a href="https://suustore.com/truyen/dau-pha-thuong-khung"
                                                        class="text-decoration-none hover-title rating-item__story--name text-one-row">Đấu
                                                        Phá Thương Khung</a>
                                                    <div class="d-flex flex-wrap rating-item__story--categories">
                                                        <a href="https://suustore.com/the-loai/tien-hiep"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Tiên
                                                            Hiệp
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/di-gioi"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Dị
                                                            Giới
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/huyen-huyen"
                                                            class="text-decoration-none text-dark hover-title ">Huyền
                                                            Huyễn
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="rating-item d-flex align-items-center">
                                                <div class="rating-item__number bg-light border rounded-circle">
                                                    <span class="text-dark">5</span>
                                                </div>
                                                <div class="rating-item__story">
                                                    <a href="https://suustore.com/truyen/the-gioi-hoan-my"
                                                        class="text-decoration-none hover-title rating-item__story--name text-one-row">Thế
                                                        Giới Hoàn Mỹ</a>
                                                    <div class="d-flex flex-wrap rating-item__story--categories">
                                                        <a href="https://suustore.com/the-loai/tien-hiep"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Tiên
                                                            Hiệp
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/kiem-hiep"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Kiếm
                                                            Hiệp
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/huyen-huyen"
                                                            class="text-decoration-none text-dark hover-title ">Huyền
                                                            Huyễn
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="rating-item d-flex align-items-center">
                                                <div class="rating-item__number bg-light border rounded-circle">
                                                    <span class="text-dark">6</span>
                                                </div>
                                                <div class="rating-item__story">
                                                    <a href="https://suustore.com/truyen/co-vo-ngot-ngao-co-chut-bat-luong-vo-moi-bat-luong-co-chut-ngot"
                                                        class="text-decoration-none hover-title rating-item__story--name text-one-row">Cô
                                                        Vợ Ngọt Ngào Có Chút Bất Lương (Vợ Mới Bất Lương Có Chút
                                                        Ngọt)</a>
                                                    <div class="d-flex flex-wrap rating-item__story--categories">
                                                        <a href="https://suustore.com/the-loai/ngon-tinh"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Ngôn
                                                            Tình
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/trong-sinh"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Trọng
                                                            Sinh
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/sung"
                                                            class="text-decoration-none text-dark hover-title ">Sủng
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="rating-item d-flex align-items-center">
                                                <div class="rating-item__number bg-light border rounded-circle">
                                                    <span class="text-dark">7</span>
                                                </div>
                                                <div class="rating-item__story">
                                                    <a href="https://suustore.com/truyen/pham-nhan-tu-tien"
                                                        class="text-decoration-none hover-title rating-item__story--name text-one-row">Phàm
                                                        Nhân Tu Tiên</a>
                                                    <div class="d-flex flex-wrap rating-item__story--categories">
                                                        <a href="https://suustore.com/the-loai/tien-hiep"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Tiên
                                                            Hiệp
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/kiem-hiep"
                                                            class="text-decoration-none text-dark hover-title ">Kiếm
                                                            Hiệp
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="rating-item d-flex align-items-center">
                                                <div class="rating-item__number bg-light border rounded-circle">
                                                    <span class="text-dark">8</span>
                                                </div>
                                                <div class="rating-item__story">
                                                    <a href="https://suustore.com/truyen/nhat-niem-vinh-hang"
                                                        class="text-decoration-none hover-title rating-item__story--name text-one-row">Nhất
                                                        Niệm Vĩnh Hằng</a>
                                                    <div class="d-flex flex-wrap rating-item__story--categories">
                                                        <a href="https://suustore.com/the-loai/tien-hiep"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Tiên
                                                            Hiệp
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/huyen-huyen"
                                                            class="text-decoration-none text-dark hover-title ">Huyền
                                                            Huyễn
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="rating-item d-flex align-items-center">
                                                <div class="rating-item__number bg-light border rounded-circle">
                                                    <span class="text-dark">9</span>
                                                </div>
                                                <div class="rating-item__story">
                                                    <a href="https://suustore.com/truyen/de-ba"
                                                        class="text-decoration-none hover-title rating-item__story--name text-one-row">Đế
                                                        Bá</a>
                                                    <div class="d-flex flex-wrap rating-item__story--categories">
                                                        <a href="https://suustore.com/the-loai/huyen-huyen"
                                                            class="text-decoration-none text-dark hover-title ">Huyền
                                                            Huyễn
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="rating-item d-flex align-items-center">
                                                <div class="rating-item__number bg-light border rounded-circle">
                                                    <span class="text-dark">10</span>
                                                </div>
                                                <div class="rating-item__story">
                                                    <a href="https://suustore.com/truyen/re-quy-troi-cho"
                                                        class="text-decoration-none hover-title rating-item__story--name text-one-row">Rể
                                                        Quý Trời Cho</a>
                                                    <div class="d-flex flex-wrap rating-item__story--categories">
                                                        <a href="https://suustore.com/the-loai/ngon-tinh"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Ngôn
                                                            Tình
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/do-thi"
                                                            class="text-decoration-none text-dark hover-title ">Đô Thị
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>

                                <div class="tab-pane fade" id="top-all-time" role="tabpanel"
                                    aria-labelledby="top-all-time-list">
                                    <ul>
                                        <li>
                                            <div class="rating-item d-flex align-items-center">
                                                <div class="rating-item__number bg-danger rounded-circle">
                                                    <span class="text-light">1</span>
                                                </div>
                                                <div class="rating-item__story">
                                                    <a href="https://suustore.com/truyen/linh-vu-thien-ha"
                                                        class="text-decoration-none hover-title rating-item__story--name text-one-row">Linh
                                                        Vũ Thiên Hạ</a>
                                                    <div class="d-flex flex-wrap rating-item__story--categories">
                                                        <a href="https://suustore.com/the-loai/tien-hiep"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Tiên
                                                            Hiệp
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/di-gioi"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Dị
                                                            Giới
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/huyen-huyen"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Huyền
                                                            Huyễn
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/xuyen-khong"
                                                            class="text-decoration-none text-dark hover-title ">Xuyên
                                                            Không
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="rating-item d-flex align-items-center">
                                                <div class="rating-item__number bg-success rounded-circle">
                                                    <span class="text-light">2</span>
                                                </div>
                                                <div class="rating-item__story">
                                                    <a href="https://suustore.com/truyen/than-dao-dan-ton"
                                                        class="text-decoration-none hover-title rating-item__story--name text-one-row">Thần
                                                        Đạo Đan Tôn</a>
                                                    <div class="d-flex flex-wrap rating-item__story--categories">
                                                        <a href="https://suustore.com/the-loai/tien-hiep"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Tiên
                                                            Hiệp
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/huyen-huyen"
                                                            class="text-decoration-none text-dark hover-title ">Huyền
                                                            Huyễn
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="rating-item d-flex align-items-center">
                                                <div class="rating-item__number bg-info rounded-circle">
                                                    <span class="text-light">3</span>
                                                </div>
                                                <div class="rating-item__story">
                                                    <a href="https://suustore.com/truyen/dau-pha-thuong-khung"
                                                        class="text-decoration-none hover-title rating-item__story--name text-one-row">Đấu
                                                        Phá Thương Khung</a>
                                                    <div class="d-flex flex-wrap rating-item__story--categories">
                                                        <a href="https://suustore.com/the-loai/tien-hiep"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Tiên
                                                            Hiệp
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/di-gioi"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Dị
                                                            Giới
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/huyen-huyen"
                                                            class="text-decoration-none text-dark hover-title ">Huyền
                                                            Huyễn
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="rating-item d-flex align-items-center">
                                                <div class="rating-item__number bg-light border rounded-circle">
                                                    <span class="text-dark">4</span>
                                                </div>
                                                <div class="rating-item__story">
                                                    <a href="https://suustore.com/truyen/co-vo-ngot-ngao-co-chut-bat-luong-vo-moi-bat-luong-co-chut-ngot"
                                                        class="text-decoration-none hover-title rating-item__story--name text-one-row">Cô
                                                        Vợ Ngọt Ngào Có Chút Bất Lương (Vợ Mới Bất Lương Có Chút
                                                        Ngọt)</a>
                                                    <div class="d-flex flex-wrap rating-item__story--categories">
                                                        <a href="https://suustore.com/the-loai/ngon-tinh"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Ngôn
                                                            Tình
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/trong-sinh"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Trọng
                                                            Sinh
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/sung"
                                                            class="text-decoration-none text-dark hover-title ">Sủng
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="rating-item d-flex align-items-center">
                                                <div class="rating-item__number bg-light border rounded-circle">
                                                    <span class="text-dark">5</span>
                                                </div>
                                                <div class="rating-item__story">
                                                    <a href="https://suustore.com/truyen/pham-nhan-tu-tien"
                                                        class="text-decoration-none hover-title rating-item__story--name text-one-row">Phàm
                                                        Nhân Tu Tiên</a>
                                                    <div class="d-flex flex-wrap rating-item__story--categories">
                                                        <a href="https://suustore.com/the-loai/tien-hiep"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Tiên
                                                            Hiệp
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/kiem-hiep"
                                                            class="text-decoration-none text-dark hover-title ">Kiếm
                                                            Hiệp
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="rating-item d-flex align-items-center">
                                                <div class="rating-item__number bg-light border rounded-circle">
                                                    <span class="text-dark">6</span>
                                                </div>
                                                <div class="rating-item__story">
                                                    <a href="https://suustore.com/truyen/nhat-niem-vinh-hang"
                                                        class="text-decoration-none hover-title rating-item__story--name text-one-row">Nhất
                                                        Niệm Vĩnh Hằng</a>
                                                    <div class="d-flex flex-wrap rating-item__story--categories">
                                                        <a href="https://suustore.com/the-loai/tien-hiep"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Tiên
                                                            Hiệp
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/huyen-huyen"
                                                            class="text-decoration-none text-dark hover-title ">Huyền
                                                            Huyễn
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="rating-item d-flex align-items-center">
                                                <div class="rating-item__number bg-light border rounded-circle">
                                                    <span class="text-dark">7</span>
                                                </div>
                                                <div class="rating-item__story">
                                                    <a href="https://suustore.com/truyen/de-ba"
                                                        class="text-decoration-none hover-title rating-item__story--name text-one-row">Đế
                                                        Bá</a>
                                                    <div class="d-flex flex-wrap rating-item__story--categories">
                                                        <a href="https://suustore.com/the-loai/huyen-huyen"
                                                            class="text-decoration-none text-dark hover-title ">Huyền
                                                            Huyễn
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="rating-item d-flex align-items-center">
                                                <div class="rating-item__number bg-light border rounded-circle">
                                                    <span class="text-dark">8</span>
                                                </div>
                                                <div class="rating-item__story">
                                                    <a href="https://suustore.com/truyen/vu-dong-can-khon"
                                                        class="text-decoration-none hover-title rating-item__story--name text-one-row">Vũ
                                                        Động Càn Khôn</a>
                                                    <div class="d-flex flex-wrap rating-item__story--categories">
                                                        <a href="https://suustore.com/the-loai/tien-hiep"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Tiên
                                                            Hiệp
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/huyen-huyen"
                                                            class="text-decoration-none text-dark hover-title ">Huyền
                                                            Huyễn
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="rating-item d-flex align-items-center">
                                                <div class="rating-item__number bg-light border rounded-circle">
                                                    <span class="text-dark">9</span>
                                                </div>
                                                <div class="rating-item__story">
                                                    <a href="https://suustore.com/truyen/doc-ton-tam-gioi"
                                                        class="text-decoration-none hover-title rating-item__story--name text-one-row">Độc
                                                        Tôn Tam Giới</a>
                                                    <div class="d-flex flex-wrap rating-item__story--categories">
                                                        <a href="https://suustore.com/the-loai/tien-hiep"
                                                            class="text-decoration-none text-dark hover-title  me-1 ">Tiên
                                                            Hiệp
                                                            ,
                                                        </a>
                                                        <a href="https://suustore.com/the-loai/huyen-huyen"
                                                            class="text-decoration-none text-dark hover-title ">Huyền
                                                            Huyễn
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="section-list-category bg-light p-2 rounded card-custom">
                        <div class="head-title-global mb-2">
                            <div class="col-12 col-md-12 head-title-global__left">
                                <h2 class="mb-0 border-bottom border-secondary pb-1">
                                    <span href="#" class="d-block text-decoration-none text-dark fs-4"
                                        title="Truyện đang đọc">Thể loại truyện</span>
                                </h2>
                            </div>
                        </div>
                        <div class="row">
                            <!-- Horizontal under breakpoint -->
                            <ul class="list-category">
                                <li class="">
                                    <a href="https://suustore.com/the-loai/ngon-tinh"
                                        class="text-decoration-none text-dark hover-title">Ngôn Tình</a>
                                </li>
                                <li class="">
                                    <a href="https://suustore.com/the-loai/trong-sinh"
                                        class="text-decoration-none text-dark hover-title">Trọng Sinh</a>
                                </li>
                                <li class="">
                                    <a href="https://suustore.com/the-loai/co-dai"
                                        class="text-decoration-none text-dark hover-title">Cổ Đại</a>
                                </li>
                                <li class="">
                                    <a href="https://suustore.com/the-loai/tien-hiep"
                                        class="text-decoration-none text-dark hover-title">Tiên Hiệp</a>
                                </li>
                                <li class="">
                                    <a href="https://suustore.com/the-loai/nguoc"
                                        class="text-decoration-none text-dark hover-title">Ngược</a>
                                </li>
                                <li class="">
                                    <a href="https://suustore.com/the-loai/khac"
                                        class="text-decoration-none text-dark hover-title">Khác</a>
                                </li>
                                <li class="">
                                    <a href="https://suustore.com/the-loai/di-gioi"
                                        class="text-decoration-none text-dark hover-title">Dị Giới</a>
                                </li>
                                <li class="">
                                    <a href="https://suustore.com/the-loai/huyen-huyen"
                                        class="text-decoration-none text-dark hover-title">Huyền Huyễn</a>
                                </li>
                                <li class="">
                                    <a href="https://suustore.com/the-loai/xuyen-khong"
                                        class="text-decoration-none text-dark hover-title">Xuyên Không</a>
                                </li>
                                <li class="">
                                    <a href="https://suustore.com/the-loai/sung"
                                        class="text-decoration-none text-dark hover-title">Sủng</a>
                                </li>
                                <li class="">
                                    <a href="https://suustore.com/the-loai/cung-dau"
                                        class="text-decoration-none text-dark hover-title">Cung Đấu</a>
                                </li>
                                <li class="">
                                    <a href="https://suustore.com/the-loai/gia-dau"
                                        class="text-decoration-none text-dark hover-title">Gia Đấu</a>
                                </li>
                                <li class="">
                                    <a href="https://suustore.com/the-loai/dien-van"
                                        class="text-decoration-none text-dark hover-title">Điền Văn</a>
                                </li>
                                <li class="">
                                    <a href="https://suustore.com/the-loai/do-thi"
                                        class="text-decoration-none text-dark hover-title">Đô Thị</a>
                                </li>
                                <li class="">
                                    <a href="https://suustore.com/the-loai/truyen-teen"
                                        class="text-decoration-none text-dark hover-title">Truyện Teen</a>
                                </li>
                                <li class="">
                                    <a href="https://suustore.com/the-loai/hai-huoc"
                                        class="text-decoration-none text-dark hover-title">Hài Hước</a>
                                </li>
                                <li class="">
                                    <a href="https://suustore.com/the-loai/kiem-hiep"
                                        class="text-decoration-none text-dark hover-title">Kiếm Hiệp</a>
                                </li>
                                <li class="">
                                    <a href="https://suustore.com/the-loai/dong-phuong"
                                        class="text-decoration-none text-dark hover-title">Đông Phương</a>
                                </li>
                                <li class="">
                                    <a href="https://suustore.com/the-loai/trinh-tham"
                                        class="text-decoration-none text-dark hover-title">Trinh Thám</a>
                                </li>
                                <li class="">
                                    <a href="https://suustore.com/the-loai/quan-truong"
                                        class="text-decoration-none text-dark hover-title">Quan Trường</a>
                                </li>
                                <li class="">
                                    <a href="https://suustore.com/the-loai/linh-di"
                                        class="text-decoration-none text-dark hover-title">Linh Dị</a>
                                </li>
                                <li class="">
                                    <a href="https://suustore.com/the-loai/dam-my"
                                        class="text-decoration-none text-dark hover-title">Đam Mỹ</a>
                                </li>
                                <li class="">
                                    <a href="https://suustore.com/the-loai/quan-su"
                                        class="text-decoration-none text-dark hover-title">Quân Sự</a>
                                </li>
                                <li class="">
                                    <a href="https://suustore.com/the-loai/khoa-huyen"
                                        class="text-decoration-none text-dark hover-title">Khoa Huyễn</a>
                                </li>
                                <li class="">
                                    <a href="https://suustore.com/the-loai/mat-the"
                                        class="text-decoration-none text-dark hover-title">Mạt Thế</a>
                                </li>
                                <li class="">
                                    <a href="https://suustore.com/the-loai/xuyen-nhanh"
                                        class="text-decoration-none text-dark hover-title">Xuyên Nhanh</a>
                                </li>
                                <li class="">
                                    <a href="https://suustore.com/the-loai/he-thong"
                                        class="text-decoration-none text-dark hover-title">Hệ Thống</a>
                                </li>
                                <li class="">
                                    <a href="https://suustore.com/the-loai/nu-cuong"
                                        class="text-decoration-none text-dark hover-title">Nữ Cường</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </main>


    @include('footer')

    <script src="./assets/jquery.min.js">
    </script>

    <script src="./assets/popper.min.js">
    </script>

    <script src="./assets/bootstrap.min.js">
    </script>



    <script src="./assets/app.js">
    </script>
    <script src="./assets/common.js"></script>
    <script src="./assets/story.js"></script>



    <div id="loadingPage" class="loading-full">
        <div class="loading-full_icon">
            <div class="spinner-grow"><span class="visually-hidden">Loading...</span></div>
        </div>
    </div>


    <script>
    function openPurchaseForm() {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (!isAuthenticated()) {
            // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập
            window.location.href = "/author/loginuser";
        } else {
            // Nếu đã đăng nhập, mở form mua linh thạch
            document.querySelector(".payment-container").style.display = "block";
        }
    }

    function isAuthenticated() {
        // Kiểm tra xem người dùng đã đăng nhập hay chưa bằng cách sử dụng Auth::check()
        return {{ Auth::check() ? 'true' : 'false' }};
    }

    function closeForm() {
        document.querySelector(".payment-container").style.display = "none";
    }
</script>
</body>
</html>
