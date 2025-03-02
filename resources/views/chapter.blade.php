<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
     <title>truyenhay247 - {{$data->title}} - {{$data->chapter}}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  
 

    <link href="{{asset('assets/bootstrap.min.css')}}" rel="stylesheet">

    <link rel="shortcut icon" href="https://suustore.com/assets/frontend/images/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('/assets/app.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
   
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

    <main style="margin-top:-30px">
        <div  class="chapter-wrapper container my-5">
            <a href="#" class="text-decoration-none">
                <h1 class="text-center text-success">{{$data->title}}</h1>
            </a>
            <a href="#" class="text-decoration-none">
                <p class="text-center text-dark">{{$data->chapter}}</p>
            </a>
            <hr class="chapter-start container-fluid">
            <div class="chapter-nav text-center">
                <div class="chapter-actions chapter-actions-origin d-flex align-items-center justify-content-center">
              
                @if($previouschapter)
    <a class="btn btn-success me-1 chapter-prev" href="/{{$data->title}}/{{$previouschapter->chapter}}" title=""><span>Chương </span>trước</a>
@else
    <a style="background-color:black" class="btn btn-success me-1 chapter-prev" href="#" title=""><span>Chương </span>trước</a>
@endif

                    <button class="btn btn-success chapter_jump me-1" data-story-id="3" data-slug-chapter="chuong-1"
                        data-slug-story="nang-khong-muon-lam-hoang-hau">
                        <span>
                            <svg style="fill: #fff;" xmlns="http://www.w3.org/2000/svg" height="1em"
                                viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path
                                    d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z">
                                </path>
                            </svg>

                        </span>
                    </button>

                    <div class="dropdown select-chapter me-1 d-none">
                        <a class="btn btn-secondary dropdown-toggle" role="button"
                            id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            Chọn chương
                        </a>

                        <ul class="dropdown-menu select-chapter__list" aria-labelledby="dropdownMenuLink">

                        </ul>
                    </div>
                    @if($nextchapter)
    <a class="btn btn-success chapter-next" href="/{{$data->title}}/{{$nextchapter->chapter}}" title=""><span>Chương </span>tiếp</a>
@else
    <a style="background-color:black" class="btn btn-success chapter-next" href="#" title=""><span>Hết </span>chapter</a>
@endif

                </div>
            </div>
            <hr class="chapter-end container-fluid">

            <div class="chapter-content mb-3">
            @php
    $formattedContent = '';
    $content = $data->content;
    $maxLength = 700;

    // Remove the string "(adsbygoogle = window.adsbygoogle || []).push({});"
    $contentWithoutAds = preg_replace("/\(adsbygoogle\s*=\s*window\.adsbygoogle\s*\|\|\s*\[\]\)\.push\(\{\}\);/", '', $content);

    // Combine the parts into a new string with <br> tags in between
    $formattedContent = strlen($contentWithoutAds) > $maxLength ? wordwrap($contentWithoutAds, $maxLength, "\n\n", true) : $contentWithoutAds;

    // Check the condition outside the @php block
@endphp

@if ($data->form_doc == NULL && $data->form_doc == 0)
    {{-- Hiển thị nội dung truyện khi không có điều kiện nào kích hoạt --}}
    {!! $formattedContent !!}
   
@elseif (Session::has('traphixemtruyensuccess'))
    {{-- Hiển thị nội dung truyện khi mua truyện thành công --}}
    <div class="">
        {!! $formattedContent !!}
    </div>

@elseif (Auth::check())
    {{-- Người dùng đã đăng nhập --}}
    @if($data->users_id == Auth::user()->id)
        {{-- Hiển thị nội dung cho người dùng là tác giả --}}
        <div class="">
            {!! $formattedContent !!}
        </div>
    @elseif (is_null($boolpurchased) || $data->title != $boolpurchased->title || $data->chapter != $boolpurchased->chapter)
        {{-- Người dùng chưa mua chương này --}}
    @else
        {{-- Người dùng không phải là tác giả và đã mua chương --}}
        <div class="">
            {!! $formattedContent !!}
        </div>
    @endif
@endif











        @if($errors->any())
    <script>
        // Hiển thị thông báo lỗi trong một cửa sổ alert
        alert("{{ $errors->first('error') }}");
    </script>
@endif





       
@if(Auth::check() && Auth::user()->id != $data->users_id)
   <form action="/grant_linhthach" method="POST">
        @csrf
        <input type="hidden" name="title" value="{{ $data->title }}">
        <input type="hidden" name="chapter" value="{{ $data->chapter }}">
        <input type="hidden" name="to_users_id" value="{{ $data->users_id }}">
        
        <div class="support-container" style="background-color:#E2F2E3; padding: 20px; border-radius: 10px;">
            <h2 style="font-size: 20px; color: #333; margin-bottom: 15px; text-align: center;">ỦNG HỘ DỊCH GIẢ</h2>
            <p style="font-size: 16px; color: #333; margin-bottom: 15px; text-align: center;">Truyện được dịch bởi Dịch Giả ND Thất Liên Hoa. Nếu cảm thấy hay, hãy khích lệ tinh thần của họ bằng cách ủng hộ Linh Thạch.</p>

            <div style="text-align: center; margin-bottom: 15px;">
                <label for="thach-input"  style="font-size: 16px; color: #333; margin-bottom: 5px;">Số linh thạch muốn ủng hộ</label>
                <input type="text" name="linhthach_grant" id="thach-input" placeholder="0" style="padding: 8px; border-radius: 5px; border: 1px solid #ccc;">
            </div>

            <div style="text-align: center; margin-bottom: 15px;">
                <label for="message-input"  style="font-size: 16px; color: #333; margin-bottom: 5px;">Lời nhắn cho Dịch giả</label>
                <input type="text" id="message-input" name="message" placeholder="Cảm ơn bạn" style="padding: 8px; border-radius: 5px; border: 1px solid #ccc;">
            </div>

            <!-- Button để hiển thị alert -->
            <button onclick="showSupportAlert(event, {{ Auth()->user()->linh_thach }})" style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; display: block; margin: 0 auto;">Ủng Hộ Linh Thạch Tại Đây</button>
        </div>
    </form>
@elseif(Auth::check() && Auth::user()->id == $data->users_id) 
    <div class="text-center px-2 py-2 alert alert-success d-none d-lg-block" role="alert">Bạn không thể ủng hộ tác giả!</div>
@else
    <div class="text-center px-2 py-2 alert alert-success d-none d-lg-block" role="alert">Bạn muốn ủng hộ linh thạch cho tác giả. Xin hãy đăng nhập!</div>
@endif

@if($data->form_doc != NULL && $data->form_doc != 0)
    <form action="/story_user/traphichapter" method="POST">
        @csrf
        <input type="hidden" name="title" value="{{ $data->title }}">
        <input type="hidden" name="chapter" value="{{ $data->chapter }}">
        <input type="hidden" name="phidoc" value="{{ $data->form_doc }}">
        
        @if (Auth::check())
            {{-- Người dùng đã đăng nhập --}}
            @if ($data->users_id != Auth::user()->id && (is_null($boolpurchased) || $data->title != $boolpurchased->title || $data->chapter != $boolpurchased->chapter))
                {{-- Người dùng không phải là tác giả và chưa mua chương này --}}
                <div class="support-message" style="background-color:#F1F1F1; padding: 20px; border-radius: 10px; text-align: center;margin-top:15px">
                    <p style="font-size: 16px;">Bạn cần ủng hộ dịch giả <span style="font-weight: bold;">{{ $data->form_doc }} linh thạch</span> để đọc chương này -> <button type="submit">Ủng hộ</button></p>
                    <p style="font-size: 16px;">Hiện tại bạn đang có <span style="font-weight: bold;">{{ Auth::user()->linh_thach }} linh thạch</span></p>
                    <p style="font-size: 16px;">Bạn muốn nạp linh thạch? <a id="nap-linh-thach-link" href="#" style="color: blue; text-decoration: underline;">Bấm vào đây</a></p>
                </div>
            @endif
        @else
            {{-- Người dùng chưa đăng nhập --}}
            <div class="support-message" style="background-color:#F1F1F1; padding: 20px; border-radius: 10px; text-align: center;margin-top:15px">
                <p style="font-size: 16px;">Bạn cần đăng nhập để ủng hộ dịch giả và đọc chương này.</p>
                <p style="font-size: 16px;">Bạn muốn đăng nhập? <a href="/author/loginuser" style="color: blue; text-decoration: underline;">Bấm vào đây</a></p>
            </div>
        @endif
    </form>
@endif




        <div class="chapter-actions chapter-actions-mobile d-flex align-items-center justify-content-center">
            <a class="btn btn-success me-2 chapter-prev"
                href="#" title=""> <span>Chương
                </span>trước</a>
            <button class="btn btn-success chapter_jump me-2" data-story-id="3" data-slug-chapter="chuong-1"
                data-slug-story="nang-khong-muon-lam-hoang-hau"><span>

                    <svg style="fill: #fff;" xmlns="http://www.w3.org/2000/svg" height="1em"
                        viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                        <path
                            d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z">
                        </path>
                    </svg>
                </span></button>

            <div class="dropup select-chapter me-2 d-none">
                <a class="btn btn-secondary dropdown-toggle" role="button"
                    id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                    Chọn chương
                </a>

                <ul class="dropdown-menu select-chapter__list" aria-labelledby="dropdownMenuLink">

                </ul>
            </div>
            <a class="btn btn-success chapter-next" href=""
                title=""><span>Chương </span>tiếp</a>
        </div>
    </main>

    @include('footer')

    <!-- <script src="{{asset('./assets/jquery.min.js')}}">
    </script> -->
    <script>
function showSupportAlert(event, linhthach) {
    event.preventDefault(); 

    var thachAmount = parseInt(document.getElementById("thach-input").value.trim(), 10);
    var message = document.getElementById("message-input").value.trim();

    if (isNaN(thachAmount) || thachAmount <= 0) {
        alert('Số linh thạch không hợp lệ. Xin hãy nhập lại!');
    } else if (thachAmount > linhthach) {
        alert('Linh thạch hiện tại không đủ. Xin hãy nhập lại!');
    } else {
        // Hiển thị thông báo với số linh thạch và lời nhắn
        var alertMessage = "Bạn đã chọn ủng hộ " + thachAmount + " linh thạch.\nLời nhắn: " + message;
        alert(alertMessage);

        // Gửi dữ liệu đến controller nếu số linh thạch hợp lệ
        sendDataToServer(thachAmount, message);
        
        // Đặt giá trị của hai ô input thành chuỗi rỗng
        document.getElementById("thach-input").value = "";
        document.getElementById("message-input").value = "";
    }
}

function sendDataToServer(thachAmount, message) {
    var title = document.getElementsByName("title")[0].value;
    var chapter = document.getElementsByName("chapter")[0].value;
    var toUsersId = document.getElementsByName("to_users_id")[0].value;

    var data = {
        title: title,
        chapter: chapter,
        linhthach_grant: thachAmount,
        message: message,
        to_users_id: toUsersId
    };

    // Gửi AJAX request đến controller
    fetch('/grant_linhthach', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify(data)
    })
    .then(response => {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        return response.json();
    })
    .then(data => {
        // Xử lý kết quả từ controller nếu cần
        console.log(data);
    })
    .catch(error => {
        console.error('There has been a problem with your fetch operation:', error);
    });
}


</script>

    <script src="{{asset('./assets/popper.min.js')}}">
    </script>

    <script src="{{asset('./assets/bootstrap.min.js')}}">
    </script>

    <script src="{{asset('./assets/app.js')}}">
    </script>
    <script src="{{asset('./assets/common.js')}}"></script>
    <script src="{{asset('./assets/chapter.js')}}"></script>

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
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("nap-linh-thach-link").addEventListener("click", function(event) {
            event.preventDefault(); // Ngăn chặn hành động mặc định của thẻ a
            window.location.href = "#nap-linh-thach"; // Chuyển hướng đến nội dung của thẻ a
        });
    });
</script>

</body>

</html>


