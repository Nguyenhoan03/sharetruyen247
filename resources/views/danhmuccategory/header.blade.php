<script data-cfasync='false' src='//wwr.hlinit.com/?tag=1e572c05'></script>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-QH7RWSDBDK"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-QH7RWSDBDK');
</script>
        <!-- place navbar here -->
        <nav class="navbar navbar-expand-lg navbar-dark header__navbar p-md-0">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="{{asset('/assets/images/logo_text.png')}}" alt="Logo Suu Truyen" srcset="" class="img-fluid"
                        style="width: 200px;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Thể loại
                            </a>
                            <ul style="width:300px;padding-left:15px" class="dropdown-menu dropdown-menu-custom">
                            @foreach($dmcategory as $dmct)
                                       
                                       <li class="">
                                           <a href="/the-loai/{{ $dmct->namecategory }}" class="text-decoration-none text-dark hover-title">{{ $dmct->namecategory }}</a>
                                       </li>
                                      @endforeach
                            </ul>
                        </li>
                       

                        <li class="nav-item dropdown">
                            <a href="/story_user" class="nav-link ">
                                Đăng truyện
                            </a>
    </li>
   

    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
    <!-- Thêm ô chứa thông tin người dùng -->
    @if(Auth::check())
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                Xin chào, {{ Auth::user()->name }}
            </a>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Thông tin cá nhân</a></li>
              
                <li><a class="dropdown-item" href="/author/logout">Đăng xuất</a></li>
            </ul>

         
        </li>
    @else
        <!-- Hiển thị liên kết đến trang đăng nhập nếu chưa đăng nhập -->
        <li class="nav-item">
            <a class="nav-link" href="/author/loginuser">
                <i class="fa-solid fa-user"></i> Thành viên
            </a>
           
        </li>

        @endif
        
        <li class="nav-item">
                            <a href="#" id="nap-linh-thach" onclick="openPurchaseForm()" class="nav-link ">
                            Mua linh thạch
                            </a>
    </li>
       
</ul>


   
                    </ul>

                    <div class="form-check form-switch me-3 d-flex align-items-center">
                        <label class="form-check-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                                class="bi bi-brightness-high" viewBox="0 0 16 16" style="fill: #fff;">
                                <path
                                    d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z">
                                </path>
                            </svg>
                        </label>

                     
                        <input class="form-check-input theme_mode" type="checkbox"
                            style="transform: scale(1.3); margin-left: 12px; margin-right: 12px;">

                        <label class="form-check-label">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 384 512"
                                style="fill: #fff;">
                                <path
                                    d="M144.7 98.7c-21 34.1-33.1 74.3-33.1 117.3c0 98 62.8 181.4 150.4 211.7c-12.4 2.8-25.3 4.3-38.6 4.3C126.6 432 48 353.3 48 256c0-68.9 39.4-128.4 96.8-157.3zm62.1-66C91.1 41.2 0 137.9 0 256C0 379.7 100 480 223.5 480c47.8 0 92-15 128.4-40.6c1.9-1.3 3.7-2.7 5.5-4c4.8-3.6 9.4-7.4 13.9-11.4c2.7-2.4 5.3-4.8 7.9-7.3c5-4.9 6.3-12.5 3.1-18.7s-10.1-9.7-17-8.5c-3.7 .6-7.4 1.2-11.1 1.6c-5 .5-10.1 .9-15.3 1c-1.2 0-2.5 0-3.7 0c-.1 0-.2 0-.3 0c-96.8-.2-175.2-78.9-175.2-176c0-54.8 24.9-103.7 64.1-136c1-.9 2.1-1.7 3.2-2.6c4-3.2 8.2-6.2 12.5-9c3.1-2 6.3-4 9.6-5.8c6.1-3.5 9.2-10.5 7.7-17.3s-7.3-11.9-14.3-12.5c-3.6-.3-7.1-.5-10.7-.6c-2.7-.1-5.5-.1-8.2-.1c-3.3 0-6.5 .1-9.8 .2c-2.3 .1-4.6 .2-6.9 .4z">
                                </path>
                            </svg>
                        </label>
                    </div>

                    <form class="d-flex header__form-search" action="{{ url('/search') }}" method="GET">
                    <input class="form-control search-story" type="text" placeholder="Tìm kiếm" name="key_word" value="">
                        <div class="col-12 search-result shadow no-result d-none">
                            <div class="card text-white bg-light">
                                <div class="card-body p-0">
                                    <ul class="list-group list-group-flush d-none">
                                        <li class="list-group-item">
                                            <a href="#" class="text-dark hover-title">Tự cẩm</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <button class="btn" type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em"
                                viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                <path
                                    d="M416 208c0 45.9-14.9 88.3-40 122.7L502.6 457.4c12.5 12.5 12.5 32.8 0 45.3s-32.8 12.5-45.3 0L330.7 376c-34.4 25.2-76.8 40-122.7 40C93.1 416 0 322.9 0 208S93.1 0 208 0S416 93.1 416 208zM208 352a144 144 0 1 0 0-288 144 144 0 1 0 0 288z">
                                </path>
                            </svg>

                        </button>
                    </form>

                </div>
            </div>
        </nav>

    

    <div class="bg-light header-bottom">
        <div class="container py-1">
            <p class="mb-0">Đọc truyện online, đọc truyện chữ, truyện full, truyện hay. Tổng hợp đầy đủ và cập nhật liên
                tục.</p>
        </div>
    </div>

   


    <main>
        
        <div class="section-stories-hot mb-3">
            <div class="container">
            @if(Auth::check())
    <div class="payment-container">
        <span style="cursor: pointer;" class="close" onclick="closeForm()">&times;</span>
        <p class="payment-title">Nạp tiền mua linh thạch</p>
        
        <div class="payment-info">
            <p class="user-info">{{ Auth::user()->name }} - {{ Auth::user()->email }} - Tài khoản: {{ Auth::user()->linh_thach }} linh thạch</p>
        </div>
        
        <div class="payment-methods">
            <button class="payment-method">1-Chuyển khoản</button>
            <button class="payment-method">2-Ví điện tử</button>
        </div>
        
        <div class="payment-qr">
            <p>Bạn vui lòng CK số tiền muốn nạp bằng cách quét mã QR ngân hàng sau:</p>
            <img style="display: block; margin: 0 auto; width: 25%;" src="{{ asset('/assets/images/z5131080402044_8d3a983aee416094928631e2bfd7c942.jpg') }}" alt="">
        </div>
        
        <p style="color: red" class="payment-note">Nội dung CK ghi địa chỉ email đăng kí của bạn</p>
        <p class="payment-note">VD: nguyenvana@gmail.com,(Hệ thống sẽ cộng tiền vào tài khoản này cho bạn)</p>
        
        <div class="payment-note">
            <p>Phải nhập chính xác nội dung CK mà hệ thống đã hiển thị sẵn cho bạn, để được CỘNG TIỀN TỰ ĐỘNG.</p>
            <p>Trường hợp sau vài phút mà bạn không nhận được tiền vui lòng gọi tới số hotline 0981.282.756.</p>
        </div>
        
        <div class="payment-security">
            <img src="https://sharecode.vn/assets/images/secure.png" alt=""> 
            <p> Chứng nhận giao dịch an toàn!</p>
        </div>
    </div>
  
@endif