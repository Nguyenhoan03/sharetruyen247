<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
   <title>truyenhay247-Tổng hợp truyện hài hước hay và mới nhất</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{asset('assets/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('/assets/app.css')}}">
</head>

<body>
@include('danhmuccategory.header')

   


    <main>
        <div class="section-stories-hot mb-3">
            <div class="container">
           
            </div>
        </div>
        <div class="container">
            <div class="row align-items-start">
                <div class="col-12 col-md-8 col-lg-9">
                    <div class="section-stories-new mb-3">
                        <div style="width:100%" class="row">
                            <div style="width:100%" class="head-title-global d-flex justify-content-between mb-2">
                                <div style="width:100%" class="col-6 col-md-4 col-lg-4 head-title-global__left d-flex align-items-center">
                                    <h2 style="width:100%" class="me-2 mb-0 border-bottom border-secondary pb-1">
                                        <a href="https://suustore.com/#"
                                            class="d-block text-decoration-none text-dark fs-4 story-name"
                                            title="Truyện Mới">Truyện Hài Hước</a>
                                    </h2>
                                   
                                </div>
                            </div>
                          
                        </div>
                       
                        <div class="contentdm">
                            <div>
                            <button onclick="handlefull()">truyện hài hước full</button>
                            <button onclick="handlehot()">truyện hài hước hot</button>
                            </div>
                            <div class="lkdjf">
                            @foreach($data as $dt)
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
                                                <img loading="lazy" src="{{$dt->image}}" style="width:15%;border-radius:7px" alt="">
                                                <a href="/{{$dt->title}}"
                                                    class="text-decoration-none text-dark fs-6 hover-title text-one-row story-name">
                                                    {{$dt->title}}</a>
                                            
                                            </h3>
                                            <span class="badge text-bg-info text-light me-1">New</span>

                                            <span class="badge text-bg-success text-light me-1">{{$dt->trangthai}}</span>

                                            <span class="badge text-bg-danger text-light">Hot</span>
                                        </div>

                                        <div class="story-item-no-image__categories ms-2 d-none d-lg-block">
                                            <p class="mb-0">
                                                <a href="#"
                                                    class="hover-title text-decoration-none text-dark category-name">{{$dt->theloai}}</a>
                                            
                                            </p>
                                        </div>

                                        <div class="story-item-no-image__chapters ms-2">
                                            <a href="#" class="hover-title text-decoration-none text-info">{{$dt->chapter}}</a>
                                        </div>


                                    </div>
                                    @endforeach
                                    </div>
                                    <div id="storyList">
   
</div>
                        </div>
    </div>
                    </div>
                   
    

 

                <div class="col-12 col-md-4 col-lg-3 sticky-md-top">


                    <div class="row">
                  
                        <div  class="col-12" style="margin-top: 20px">
            <div class="section-list-category bg-light p-2 rounded card-custom">
                <div class="head-title-global mb-2">
                   
                </div>
                <div class="row">
               <div class="overviewtienhiep">
            <p>Tuyển tập truyện hài hước ngôn tình, tiên hiệp chọn lọc dành cho bạn đọc muốn trải qua những giây phút vui vẻ, bật cười khi đọc truyện.
</p>
                        </div>
                    </div>
                </div>
                </div>
                </div>


                    <div class="row" style="margin-top: 10px">

                        <div class="col-12">
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

              

        <div class="section-stories-full mb-3 mt-3">
            <div class="container">
              

             
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
                            src="{{url('./assets/images/88x31.png')}}"></a><br>
                    <p>Website hoạt động dưới Giấy phép truy cập mở <a rel="license"
                            class="text-decoration-none text-dark hover-title"
                            href="http://creativecommons.org/licenses/by/4.0/">Creative Commons Attribution 4.0
                            International License</a></p>
                </div>
            </div>
        </div>
    </div>

    <script src="{{url('./assets/jquery.min.js')}}">
    </script>

    <script src="{{url('./assets/popper.min.js')}}">
    </script>

    <script src="{{url('./assets/bootstrap.min.js')}}">
    </script>



    <script src="{{url('./assets/app.js')}}">
    </script>
    <script src="{{url('./assets/common.js')}}"></script>



    <div id="loadingPage" class="loading-full">
        <div class="loading-full_icon">
            <div class="spinner-grow"><span class="visually-hidden">Loading...</span></div>
        </div>
    </div>



</body>
<script>
   
        





function hideStoryList() {
    $('#storyList').hide();
}
function displayStories(data) {
    // Clear existing stories
    $('#storyList').empty();

    // Render new stories
    $.each(data, function(index, dt) {
        $('#storyList').append(`
            <div class="story-item-no-image">
                <div class="story-item-no-image__name d-flex align-items-center">
                    <h3 class="me-1 mb-0 d-flex align-items-center">
                        <svg style="width: 10px; margin-right: 5px;"
                            xmlns="http://www.w3.org/2000/svg" height="1em"
                            viewBox="0 0 320 512">
                            <path
                                d="M278.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-160 160c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L210.7 256 73.4 118.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l160 160z">
                            </path>
                        </svg>
                        <img loading="lazy" src="${dt.image}" style="width:15%;border-radius:7px" alt="">
                        <a href="/${dt.title}" class="text-decoration-none text-dark fs-6 hover-title text-one-row story-name">
                            ${dt.title}
                        </a>
                    </h3>
                    <span class="badge text-bg-info text-light me-1">New</span>
                    <span class="badge text-bg-success text-light me-1">${dt.trangthai}</span>
                    <span class="badge text-bg-danger text-light">Hot</span>
                </div>
                <div class="story-item-no-image__categories ms-2 d-none d-lg-block">
                    <p class="mb-0">
                        <a href="#" class="hover-title text-decoration-none text-dark category-name">${dt.theloai}</a>
                    </p>
                </div>
                <div class="story-item-no-image__chapters ms-2">
                    <a href="#" class="hover-title text-decoration-none text-info">${dt.chapter}</a>
                </div>
            </div>
        `);
    });
    $('#storyList').show();
}
var isContentHidden = false;

function handlefull() {
    isContentHidden = true;
    $.ajax({
        url: '/truyen-tien-hiep-full',
        type: 'GET',
        success: function(response) {
            console.log(response);
            // Hiển thị dữ liệu sản phẩm đã lọc
            displayStories(response);
            toggleContentVisibility();
        },
        error: function(xhr, status, error) {
            console.log('AJAX request failed:', status, error);
            console.log(xhr.responseText);
        }
    });
}

function handlehot() {
    isContentHidden = true;
    console.log('Button clicked 2');
    hideStoryList();
    $.ajax({
        url: '/truyen-tien-hiep-hot',
        type: 'GET',
        success: function(response) {
            console.log(response);
            // Hiển thị dữ liệu truyện đã lọc
            displayStories(response);
            toggleContentVisibility();
           
        },
        error: function(xhr, status, error) {
            console.log('AJAX request failed:', status, error);
            console.log(xhr.responseText);
        }
    });
}

function toggleContentVisibility() {
    if (isContentHidden) {
        // If isContentHidden is true, hide the content
        $('.lkdjf').hide();
    } else {
        // If isContentHidden is false, show the content
        $('.lkdjf').show();
    }
}




    </script>

</html>