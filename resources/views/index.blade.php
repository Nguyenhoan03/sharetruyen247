<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  
       <meta name="description" content="TruyenHay247 là trang web đọc truyện online với hàng ngàn truyện hay nhất. Cập nhật nhanh các thể loại truyện ngôn tình, tiên hiệp, đô thị, huyền huyễn, và nhiều thể loại khác.">
    
    <!-- Meta Keywords -->
    <meta name="keywords" content="truyenhay247, đọc truyện, truyện ngôn tình, truyện tiên hiệp, truyện đô thị, truyện huyền huyễn, truyện hay, truyện online, đọc truyện miễn phí, truyện mới cập nhật">

    <!-- Open Graph Meta Tags (for social sharing) -->
    <meta property="og:title" content="TruyenHay247 - Đọc truyện online hay nhất">
    <meta property="og:description" content="Đọc truyện online miễn phí với những truyện ngôn tình, tiên hiệp, đô thị, huyền huyễn mới nhất được cập nhật mỗi ngày tại TruyenHay247.">
    <meta property="og:url" content="https://truyenhay247.click/">
    <meta property="og:type" content="website">
    
    <!-- Twitter Cards Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="TruyenHay247 - Đọc truyện online hay nhất">
    <meta name="twitter:description" content="Khám phá những câu chuyện ngôn tình, tiên hiệp, đô thị và nhiều thể loại truyện hấp dẫn khác trên TruyenHay247.">
    <!-- Canonical URL -->
    <link rel="canonical" href="https://truyenhay247.click/">
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
                    <div class="row">
                        <div class="col-12">
                            <div class="section-stories-hot__list">
                            @foreach($truyenhot as $th)
        <div class="story-item">
            <a href="/{{$th->title}}" class="d-block text-decoration-none">
                <div class="story-item__image">
                    <!-- <img loading="lazy" src="{{ $th->image }}" alt="" class="img-fluid" width="150" height="230" loading="lazy"> -->
                    @if (Str::startsWith($th->image, 'https://') || Str::startsWith($th->image, 'http://'))
            {{-- Nếu đường dẫn bắt đầu bằng 'https://' hoặc 'http://', đây là URL trực tiếp --}}
            <img loading="lazy" src="{{ $th->image }}" alt="" class="img-fluid" width="150" height="230" >
        @else
            {{-- Nếu không phải là URL trực tiếp, đây là đường dẫn đến thư mục --}}
            <img loading="lazy" src="{{ asset('upload/' . $th->image) }}" alt="" class="img-fluid" width="150" height="230" >
        @endif
                </div>
                <h3 class="story-item__name text-one-row story-name">{{ $th->title }}</h3>

                <div class="list-badge">
                    <span class="story-item__badge badge text-bg-success">{{ $th->trangthai }}</span>

                    <span class="story-item__badge story-item__badge-hot badge text-bg-danger">Hot</span>

                    <span class="story-item__badge story-item__badge-new badge text-bg-info text-light">New</span>
                </div>
            </a>
        </div>
    @endforeach

                         
                        </div>

                        <div class="section-stories-hot__list wrapper-skeleton d-none">
                            <div class="skeleton" style="max-width: 150px; width: 100%; height: 230px;"></div>
                            <div class="skeleton" style="max-width: 150px; width: 100%; height: 230px;"></div>
                            <div class="skeleton" style="max-width: 150px; width: 100%; height: 230px;"></div>
                            <div class="skeleton" style="max-width: 150px; width: 100%; height: 230px;"></div>
                            <div class="skeleton" style="max-width: 150px; width: 100%; height: 230px;"></div>
                            <div class="skeleton" style="max-width: 150px; width: 100%; height: 230px;"></div>
                            <div class="skeleton" style="max-width: 150px; width: 100%; height: 230px;"></div>
                            <div class="skeleton" style="max-width: 150px; width: 100%; height: 230px;"></div>
                            <div class="skeleton" style="max-width: 150px; width: 100%; height: 230px;"></div>
                            <div class="skeleton" style="max-width: 150px; width: 100%; height: 230px;"></div>
                            <div class="skeleton" style="max-width: 150px; width: 100%; height: 230px;"></div>
                            <div class="skeleton" style="max-width: 150px; width: 100%; height: 230px;"></div>
                            <div class="skeleton" style="max-width: 150px; width: 100%; height: 230px;"></div>
                            <div class="skeleton" style="max-width: 150px; width: 100%; height: 230px;"></div>
                            <div class="skeleton" style="max-width: 150px; width: 100%; height: 230px;"></div>
                            <div class="skeleton" style="max-width: 150px; width: 100%; height: 230px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row align-items-start">
                <div class="col-12 col-md-8 col-lg-9">
                    <div class="section-stories-new mb-3">
                        <div class="row">
                            <div class="head-title-global d-flex justify-content-between mb-2">
                                <div class="col-6 col-md-4 col-lg-4 head-title-global__left d-flex align-items-center">
                                    <h2 class="me-2 mb-0 border-bottom border-secondary pb-1">
                                        <a href="https://suustore.com/#"
                                            class="d-block text-decoration-none text-dark fs-4 story-name"
                                            title="Truyện Mới">Truyện Mới</a>
                                    </h2>
                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="section-stories-new__list">

                                @foreach($truyenmoi as $tm)
                                    <div class="story-item-no-image">
                                        <div class="story-item-no-image__name d-flex align-items-center">
                                            <h3 class="me-1 mb-0 d-flex align-items-center">

                                                <svg style="width: 10px; margin-right: 5px;"
                                                    xmlns="http://www.w3.org/2000/svg" height="1em"
                                                    viewBox="0 0 320 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                    <path
                                                        d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z">
                                                    </path>
                                                </svg>  
                                                <a href="/{{$tm->title}}"
                                                    class="text-decoration-none text-dark fs-6 hover-title text-one-row story-name"> {{ $tm->title}}</a>
                                            </h3>
                                            <span class="badge text-bg-info text-light me-1">New</span>

                                            <span class="badge text-bg-success text-light me-1">{{$tm->trangthai}}</span>

                                            <span class="badge text-bg-danger text-light">Hot</span>
                                        </div>

                                        <div class="story-item-no-image__categories ms-2 d-none d-lg-block">
                                            <p class="mb-0">
                                                <a href="#"
                                                    class="hover-title text-decoration-none text-dark category-name">{{$tm->theloai}}</a>
                                                <!-- <a href="#"
                                                    class="hover-title text-decoration-none text-dark category-name">Kiếm
                                                    Hiệp, </a>
                                                <a href="#"
                                                    class="hover-title text-decoration-none text-dark category-name">Dị
                                                    Giới, </a> -->
                                            </p>
                                        </div>

                                        <div class="story-item-no-image__chapters ms-2">
                                            <a href="/{{$tm->title}}/{{$tm->chapter}}" class="hover-title text-decoration-none text-info">
                                                {{$tm->chapter}}</a>
                                        </div>


                                    </div>
                                    @endforeach
                                  
                            
                                </div>
                               
                            </div>
                            <div class="d-flex justify-content-center">
                                        {{ $truyenmoi->onEachSide(2)->links('pagination::bootstrap-4') }}
                                    </div>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-4 col-lg-3 sticky-md-top">
                    <div class="row">

                        <div  class="col-12">
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
                                        @foreach($dmcategory as $dmct)
                                       
                                        <li class="">
                                            <a href="/the-loai/{{ $dmct->namecategory }}" class="text-decoration-none text-dark hover-title">{{ $dmct->namecategory }}</a>
                                        </li>
                                       @endforeach
                                    </ul>
                                </div>
                            </div>


                        </div>

                     
                    </div>

                    <div class="row">

<div  class="col-12" style="margin-top: 20px">
    <div class="section-list-category bg-light p-2 rounded card-custom">
        <div class="head-title-global mb-2">
            <div class="col-12 col-md-12 head-title-global__left">
                <h2 class="mb-0 border-bottom border-secondary pb-1">
                    <span href="#" class="d-block text-decoration-none text-dark fs-4"
                        title="Truyện đang đọc">Top truyện ngắn</span>
                </h2>
            </div>
        </div>
        <div class="row">
            <!-- Horizontal under breakpoint -->
        @foreach($toptruyen as $key => $ttn)
         <div class="toptruyen" >
         
         <div style="display:flex">
         <div style="width: 20%; display: flex; align-items: center; justify-content: center;">
                <p>{{$key+1}}</p>
            </div>



            <div style="width: 75%;">
   
    <ul style="list-style: none; padding: 0; margin: 0;">
        <li style="margin-top: 0;"> 
            <p style="font-size: 15px;font-weight:500;"><a href="{{$ttn->title}}" class="text-decoration-none text-dark hover-title">{{$ttn->title}} - {{$ttn->total_chapters}} chapter</a></p>
          
            <p style="font-size: 13px; margin-top: -17px;"><i class="fas fa-eye"></i> {{$ttn->viewers}}</p>
        </li>
    </ul>
</div>
    </div>
         </div>
         <hr>
@endforeach

         
        
       
      
               
              
            
    </div>


</div>


</div>
                
                </div>

                
            </div>
        </div>

        <div class="section-stories-full mb-3 mt-3">
            <div class="container">
                <div class="row">
                    <div class="head-title-global d-flex justify-content-between mb-2">
                        <div class="col-12 col-md-4 head-title-global__left d-flex">
                            <h2 class="me-2 mb-0 border-bottom border-secondary pb-1">
                                <span class="d-block text-decoration-none text-dark fs-4 title-head-name"
                                    title="Truyện đã hoàn thành">Truyện đã hoàn thành</span>
                            </h2>
                            <!-- <i class="fa-solid fa-fire-flame-curved"></i> -->
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="section-stories-full__list">
                            @foreach( $truyenfull as $tf)
                            <div class="story-item-full text-center">
                                <a href="/{{$tf->title}}" class="d-block story-item-full__image">
                                   
                                        @if (Str::startsWith($tf->image, 'https://') || Str::startsWith($tf->image, 'http://'))
        {{-- Nếu đường dẫn bắt đầu bằng 'https://' hoặc 'http://', đây là URL trực tiếp --}}
        <img loading="lazy" src="{{ $tf->image }}" alt="" class="img-fluid" width="150" height="230" >
    @else
        {{-- Nếu không phải là URL trực tiếp, đây là đường dẫn đến thư mục --}}
        <img loading="lazy" src="{{ asset('upload/' . $tf->image) }}" alt="" class="img-fluid" width="150" height="230" >
    @endif
                                </a>
                                <h3 class="fs-6 story-item-full__name fw-bold text-center mb-0">
                                    <a href="/{{$tf->title}}"
                                        class="text-decoration-none text-one-row story-name">
                                        {{$tf->title}}
                                    </a>
                                </h3>
                                <span class="story-item-full__badge badge text-bg-success">Full - {{$tf->total_chapters}} chương</span>
                            </div>
                        @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div id="footer" class="footer border-top pt-2">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-5">
                    <strong>Suu Truyện</strong> - <a title="Đọc truyện online" class="text-dark text-decoration-none"
                        href="#">Đọc truyện</a> online một cách nhanh nhất. Hỗ trợ mọi thiết bị như
                    di
                    động và máy tính bảng.
                </div>
                <ul class="col-12 col-md-7 list-unstyled d-flex flex-wrap list-tag">
                    <li class="me-1">
                        <span class="badge text-bg-light"><a class="text-dark text-decoration-none"
                                href="#" title="đam mỹ hài">đam mỹ
                                hài</a></span>
                    </li>
                    <li>
                        <span class="badge text-bg-light"><a class="text-dark text-decoration-none"
                                href="#" title="truyện xuyên nhanh">truyện
                                xuyên
                                nhanh</a></span>
                    </li>
                    <li class="me-1">
                        <span class="badge text-bg-light"><a class="text-dark text-decoration-none"
                                href="#" title="đam mỹ hài">đam mỹ
                                hài</a></span>
                    </li>
                    <li>
                        <span class="badge text-bg-light"><a class="text-dark text-decoration-none"
                                href="#" title="truyện xuyên nhanh">truyện
                                xuyên
                                nhanh</a></span>
                    </li>
                    <li class="me-1">
                        <span class="badge text-bg-light"><a class="text-dark text-decoration-none"
                                href="#" title="đam mỹ hài">đam mỹ
                                hài</a></span>
                    </li>
                    <li>
                        <span class="badge text-bg-light"><a class="text-dark text-decoration-none"
                                href="#" title="truyện xuyên nhanh">truyện
                                xuyên
                                nhanh</a></span>
                    </li>
                    <li class="me-1">
                        <span class="badge text-bg-light"><a class="text-dark text-decoration-none"
                                href="#" title="đam mỹ hài">đam mỹ
                                hài</a></span>
                    </li>
                    <li>
                        <span class="badge text-bg-light"><a class="text-dark text-decoration-none"
                                href="#" title="truyện xuyên nhanh">truyện
                                xuyên
                                nhanh</a></span>
                    </li>
                    <li class="me-1">
                        <span class="badge text-bg-light"><a class="text-dark text-decoration-none"
                                href="#" title="đam mỹ hài">đam mỹ
                                hài</a></span>
                    </li>
                    <li>
                        <span class="badge text-bg-light"><a class="text-dark text-decoration-none"
                                href="#" title="truyện xuyên nhanh">truyện
                                xuyên
                                nhanh</a></span>
                    </li>
                    <li class="me-1">
                        <span class="badge text-bg-light"><a class="text-dark text-decoration-none"
                                href="#" title="đam mỹ hài">đam mỹ
                                hài</a></span>
                    </li>
                    <li>
                        <span class="badge text-bg-light"><a class="text-dark text-decoration-none"
                                href="#" title="truyện xuyên nhanh">truyện
                                xuyên
                                nhanh</a></span>
                    </li>
                </ul>

                <div class="col-12"> <a rel="license" href="http://creativecommons.org/licenses/by/4.0/"><img
                            alt="Creative Commons License" style="border-width:0;margin-bottom: 10px"
                            src="./assets/images/88x31.png"></a><br>
                    <p>Website hoạt động dưới Giấy phép truy cập mở <a rel="license"
                            class="text-decoration-none text-dark hover-title"
                            href="http://creativecommons.org/licenses/by/4.0/">Creative Commons Attribution 4.0
                            International License</a></p>
                </div>
            </div>
        </div>
    </div>

    <script src="./assets/jquery.min.js">
    </script>

    <script src="./assets/popper.min.js">
    </script>

    <script src="./assets/bootstrap.min.js">
    </script>



    <script src="./assets/app.js">
    </script>
    <script src="./assets/common.js"></script>

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


    <div id="loadingPage" class="loading-full">
        <div class="loading-full_icon">
            <div class="spinner-grow"><span class="visually-hidden">Loading...</span></div>
        </div>
    </div>



</body>

</html>