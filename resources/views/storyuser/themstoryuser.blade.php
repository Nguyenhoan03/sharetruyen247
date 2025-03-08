<!DOCTYPE html>
<html lang="en">

<head>
  <title>Danh sách nhân viên | Quản trị Admin</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Main CSS-->
  <link rel="stylesheet" type="text/css" href="{{asset('assets/css/main.css')}}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
  <!-- or -->
  <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <!-- Font-icon css-->
  <link rel="stylesheet" type="text/css"
    href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
  <link href="{{asset('assets/bootstrap.min.css')}}" rel="stylesheet">


</head>

<style>
  *body{
    background-color:#EEEDED;
  }
  a{
    list-style: none;
    text-decoration: none;
    
  }
  #editor {
            width: 100%;
            height: 300px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-top: 10px;
        }
</style>
<body onload="time()" class="app sidebar-mini rtl">
  <!-- Navbar-->

  <header class="app-header">
    <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar"
      aria-label="Hide Sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">


      <!-- User Menu-->
      <li><a class="app-nav__item" href="#"><i class='bx bx-log-out bx-rotate-180'></i> </a>

      </li>
    </ul>
  </header>
  <!-- Sidebar menu-->
  @include('storyuser.navbarstory')
  @if(Session::has('successcreatestory'))
    <div class="alert alert-success" style="margin-top:15px;color: tomato">
        {{ Session::get('successcreatestory') }}
    </div>
@endif
  <main class="app-content">
    <div class="row">
      <div class="col-md-12">
        <div class="app-title">
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href=""><b>Thêm truyện mới</b></a></li>
          </ul>
</div>
        <div class="" style="border: 1px solid green; border-radius:10px;padding-left:15px;padding-top:15px;background-color:#D6F4F8">
            <p>Truyện tình trạng hoàn thành sẽ không thể điều chỉnh sang tình trạng khác, nếu muốn thay đổi liên hệ Admin!</p>
            <p>Đẩy truyện lên trang chủ 10 Linh thạch/lần đối với truyện đã Full</p>
            <p>Truyện đăng duy nhất tại dtruyen mới được vào danh sách chọn lọc.</p>
        </div>
        <div style="display: flex; align-items: center;padding-top:15px;padding-left:15px; margin-top: 15px; background-color: #FDE1DF; border: 1px solid red">
    <p style="text-align: center">Suutruyen.com khuyến cáo chỉ nên đăng truyện tại suutruyen.com để tránh tình trạng truyện bị sao chép trái phép!</p>
</div>

<div style="display: flex; align-items: center;padding-top:15px;padding-left:15px; margin-top: 15px; background-color: #FDE1DF; border: 1px solid red">
    <p style="text-align: center">- Lưu ý: nếu bạn là tác giả truyện đã có trên Suutruyen.com vui lòng gửi mail đến: contact@suutruyen.com để được set là chủ sở hữu truyện và chỉ cần tiếp tục đăng chương.</p>
</div>



<form action="/story_user/postcreatestory" method="POST" enctype="multipart/form-data">
<div class="create-story-container" style="background-color: #FFFFFF; border-radius: 10px; margin-top: 15px; display: flex; padding: 15px;">
    @csrf
<div class="left-create-story">
  <label style="color:red" for="">vui lòng chọn ảnh bìa truyện</label>
   <input name="fileInput" id="fileInput" accept="image/*" onchange="displayImage()" type="file" require><br/>
   <img style="width:100%;height:230px;padding-top:15px" id="previewImage" src="" alt="Preview Image">
   </div>
   <div class="center-create-story" style="margin-left: 15px;">
      <input require name="titletruyen" type="text" placeholder="Nhập tên truyện tại đây" style="padding: 8px; border: 1px solid #ccc; border-radius: 5px; margin-bottom: 10px;">
      <div class="author-info">
        <label for="">Tác giả</label>
        <input require name="tacgia" style="border-radius:5px;padding-left: 5px" type="text">
      </div>
      <div class="story-type">
    <label for="">Loại truyện</label><br/>
    <input require type="radio" name="truyen_type" id="original-story" value="Truyện sáng tác"> <label for="original-story">Truyện sáng tác</label>
    <input require style="margin-left:10px" type="radio" name="truyen_type" id="translated-story" value="Truyện dịch"> <label for="translated-story">Truyện dịch</label>
</div>

      <div class="story-status">
        <label for="">Tình trạng truyện</label><br/>
        <input require type="radio" name="story-status" id="completed-story" value="Hoàn Thành"> <label for="completed-story">Đã hoàn thành</label>
        <input require style="margin-left:10px" type="radio" name="story-status" id="translating-story" value="Đang cập nhật"> <label for="translating-story">Đang dịch / Đang Convert</label>
      </div>
   </div>
   <div class="right-create-story" style="margin-left: 15px;width:30%">
       <label for="">Thể loại truyện</label>
       <div class="right-create-story" style="max-height:250px;margin-left: 15px; overflow-y: auto;">
          <div class="genre-item">
            <input require type="checkbox" name="tienhiep" id="tienhiep">
            <label for="tienhiep">Tiên hiệp</label>
          </div>
          <div class="genre-item">
            <input require type="checkbox" name="ngontinh" id="ngontinh">
            <label for="ngontinh">Ngôn tình</label>
          </div>
          <div class="genre-item">
            <input require type="checkbox" name="quantruong" id="kiemhiep">
            <label for="kiemhiep">Quan trường</label>
          </div>

          <div class="genre-item">
            <input require type="checkbox" name="khoanguyen" id="kiemhiep">
            <label for="kiemhiep">Khoa nguyễn</label>
          </div>

          <div class="genre-item">
            <input require type="checkbox" name="huyenhuyen" id="kiemhiep">
            <label for="kiemhiep">Huyền huyễn</label>
          </div>
          <div class="genre-item">
            <input require type="checkbox" name="dinang" id="kiemhiep">
            <label for="kiemhiep">Dị năng</label>
          </div>
          <div class="genre-item">
            <input require type="checkbox" name="kiemhiep" id="kiemhiep">
            <label for="kiemhiep">Kiếm hiệp</label>
          </div>
          <div class="genre-item">
            <input require type="checkbox" name="dammy" id="kiemhiep">
            <label for="kiemhiep">Đam mỹ</label>
          </div>
          <div class="genre-item">
            <input require type="checkbox" name="vongdu" id="kiemhiep">
            <label for="kiemhiep">Võng Du</label>
          </div>
          <div class="genre-item">
            <input require type="checkbox" name="haihuoc" id="kiemhiep">
            <label for="kiemhiep">Hài Hước</label>
          </div>
          <div class="genre-item">
            <input require type="checkbox" name="kinhdi" id="kiemhiep">
            <label for="kiemhiep">Kinh Dị</label>
          </div>
          <div class="genre-item">
            <input require type="checkbox" name="dothi" id="kiemhiep">
            <label for="kiemhiep">Đô Thị</label>
          </div>
          <div class="genre-item">
            <input require type="checkbox" name="lichsu" id="kiemhiep">
            <label for="kiemhiep">Lịch Sử</label>
          </div>
          <div class="genre-item">
            <input require type="checkbox" name="truyenma" id="kiemhiep">
            <label for="kiemhiep">Truyện Ma</label>
          </div>
          <div class="genre-item">
            <input require type="checkbox" name="truyenngan" id="kiemhiep">
            <label for="kiemhiep">Truyện Ngắn</label>
          </div>
          <div class="genre-item">
            <input require type="checkbox" name="tieuthuyet" id="kiemhiep">
            <label for="kiemhiep">Tiểu Thuyết</label>
          </div>


          <div class="genre-item">
            <input require type="checkbox" name="truyenteen" id="kiemhiep">
            <label for="kiemhiep">Truyện Teen</label>
          </div>
          <div class="genre-item">
            <input require type="checkbox" name="quansu" id="kiemhiep">
            <label for="kiemhiep">Quân Sự</label>
          </div>
          <div class="genre-item">
            <input require type="checkbox" name="xuyenkhong" id="kiemhiep">
            <label for="kiemhiep">Xuyên Không</label>
          </div>
          <div class="genre-item">
            <input require type="checkbox" name="trinhtham" id="kiemhiep">
            <label for="kiemhiep">Trinh Thám</label>
          </div>
       </div>
   </div>
  </div>
  
  <p style=" font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
            margin-top: 18px;">Giới thiệu truyện</p>
  <textarea name="descripts" id="editor" cols="80" rows="10"></textarea>
  
</div>
</div>

<button style="height: 45px; cursor: pointer;background-color:#1F8BE1;color: white; font-weight:550; border-radius:5px;margin-top: 18px" ><i class="fa-solid fa-file-lines"></i> Lưu thông tin truyện</button>
</form>
</div>

</div>

        </div>
      </div>
    </div>
   
  </main>


  <script src="assets/js/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="assets/js/popper.min.js"></script>
  <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
  <!--===============================================================================================-->
  <script src="assets/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="assets/js/main.js"></script>
  <!--===============================================================================================-->
  <script src="assets/js/plugins/pace.min.js"></script>
  <!--===============================================================================================-->
  <script type="text/javascript" src="assets/js/plugins/chart.js"></script>
  <!--===============================================================================================-->
  <script type="text/javascript" src="assets/js/settime.js"></script>


<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
<script>
                        ClassicEditor
                                .create( document.querySelector( '#editor' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script>

<script>
  function displayImage() {
    var input = document.getElementById('fileInput');
    var preview = document.getElementById('previewImage');
    
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function (e) {
            preview.src = e.target.result;
            preview.style.display = 'block'; // Hiển thị hình ảnh khi có tệp được chọn
        }
        
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.src = '';
        preview.style.display = 'none'; // Ẩn hình ảnh khi không có tệp được chọn
    }
}

// Gọi hàm displayImage khi trang web được tải
window.onload = function() {
    displayImage();
};

</script>
</body>

</html>