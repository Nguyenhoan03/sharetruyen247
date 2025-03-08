<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
   <title>truyenhay247-Tổng hợp truyện dị năng hay và mới nhất</title>
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
                                            title="Truyện Mới">Truyện Dị Năng</a>
                                    </h2>
                                   
                                </div>
                            </div>
                          
                        </div>
                       
                        <div class="contentdm">
                            <div class="button-container">
                            <button onclick="handlefull()">truyện dị năng full</button>
                            <button onclick="handlehot()">truyện dị năng hot</button>
                            </div>
                            <x-story-item :data="$data"/>
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
               <p>Tuyển tập truyện Dị Năng chọn lọc đặc sắc nhất hiện nay kể về những nhân vật chính có công năng đặc biệt với sự đa dạng như: dị năng hệ thống, vương phi, huyền huyễn, đô thị, đổ thạch, thần chủ mời bạn thưởng thức.
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

    @include('footer')

    <script src="{{url('./assets/jquery.min.js')}}">
    </script>

    <script src="{{url('./assets/popper.min.js')}}">
    </script>

    <script src="{{url('./assets/bootstrap.min.js')}}">
    </script>



    <script src="{{url('./assets/app.js')}}">
    </script>
    <script src="{{url('./assets/common.js')}}"></script>
    <script src="{{url('./assets/js/toggleContentVisibility.js')}}"></script>



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





    </script>

</html>