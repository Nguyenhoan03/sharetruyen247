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
  @if(Session::has('successediterchapter'))
    <div class="alert alert-success" style="margin-top:15px">
        {{ Session::get('successediterchapter') }}
    </div>
@endif
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
  <main class="app-content">
    <div class="row">
      <div class="col-md-12">
        <div class="app-title">
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href=""><b>Sửa {{$chapter}} truyện [{{$title}}]</b></a></li>
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


<a href="/story_user/danhsachchapter/">
<button style="margin-top:15px;background-color:#46A24A;color:white;font-weight:550;width: 330px;height:40px;border-radius:5px;border:1px solid #D6F4F8"> DANH SÁCH CHƯƠNG TRUYỆN CỦA TÔI</button>
</a>

<form action="/story_user/postediterchapter/{{$title}}/{{$chapter}}" method="POST">
  @csrf
<div class="" style="margin-top: 15px; background-color: white; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);">
   <div class="" style="margin-left:20px;">
  
<div style="margin-top:15px;padding-top:15px">
<div>
    <label for="chapter_number">Chương số</label>
    @php
        
        $chapter_parts = explode(':', $data->chapter);
        $chapter_number_text = trim($chapter_parts[0]);

       
        preg_match('/\d+/', $chapter_number_text, $matches);
        $chapter_number = isset($matches[0]) ? $matches[0] : '';
    @endphp
    <input type="text" id="chapter_number" name="chapter_number" placeholder="0" value="{{$chapter_number}}">
</div>


    <div style="margin-top:5px;">
        <span style="color: tomato;">Chỉ nhập số</span>
    </div>
</div>

<div style="margin-top:15px;">
      <div>
          <label for="chapter_name">Tên chương</label>
          @php
          $chapter_parts = explode(':', $data->chapter, 2); 
        $chapter_content = isset($chapter_parts[1]) ? trim($chapter_parts[1]) : ''; 
          @endphp
          <input type="text" style="width:80%" id="chapter_name" name="chapter_name" value="{{$chapter_content}}">
      </div>
      <div style="margin-top:5px;">
          <span style="color: tomato;">Chỉ nhập tên chương, không nhập số chương ở đây. Nếu không có tên, có thể để trống.</span>
      </div>
  </div>



<div style="display: flex; align-items: center;padding-top:15px;padding-left:15px; margin-top: 15px; background-color: #D6F4F8; border: 1px solid #D6F4F8">
    <p style="text-align: center">Nội dung chương phải có ít nhất 400 từ mới có thể xuất bản. Khuyến khích 1 chương khoảng 2000 từ</p>
</div>

<div class="" style="margin-top:10px;">
  <p style="font-size:22px;font-weight:500">Nội Dung Chương</p>
  <textarea name="chapter_content" id="" cols="100" rows="100" style="width:100%; height: 500px;">{{$data->content}}</textarea>

</div>
<div class="">
<div style="display: flex; align-items: center;padding-top:15px;padding-left:15px; margin-top: 15px; background-color: #FDE1DF; border: 1px solid red;border-radius:5px">
    <p style="text-align: center">Khi đăng nhiều chương, Linh thạch sẽ được đặt mặc định cho tất cả các chương là số linh thạch đã chọn ở trên.</p>
</div>
<div class="">
<button type="submit" style="height: 45px; cursor: pointer;background-color:#2E3C43;color: white; font-weight:550; border-radius:5px;margin-top: 18px" ><i class="fa-solid fa-file-lines"></i> Sửa thông tin truyện</button>
</div>
</div>

</div>
      
    </div>
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