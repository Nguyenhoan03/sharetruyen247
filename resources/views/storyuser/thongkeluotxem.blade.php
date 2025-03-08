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

<style>
  table {
    width: 100%;
    border-collapse: collapse;
    border: 2px solid #ccc;
  }
  th, td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }
  th {
    background-color: #f2f2f2;
    font-size: 19px;
    font-weight: 500;
  }
</style>
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
            <li class="breadcrumb-item"><a href=""><b>Thống kê lượt xem truyện</b></a></li>
          </ul>
</div>
        <div class="" style="border: 1px solid green; border-radius:10px;padding-left:15px;padding-top:15px; background-color: #EEEDED">
            <p>Truyện tình trạng hoàn thành sẽ không thể điều chỉnh sang tình trạng khác, nếu muốn thay đổi liên hệ Admin!</p>
            <p>Đẩy truyện lên trang chủ 10 Linh thạch/lần đối với truyện đã Full</p>
            <p>Truyện đăng duy nhất tại dtruyen mới được vào danh sách chọn lọc.</p>
        </div>
        <div style="display: flex; align-items: center;padding-top:15px;padding-left:15px; margin-top: 15px;  background-color: #EEEDED; border: 1px solid red">
    <p style="text-align: center">Suutruyen.com khuyến cáo chỉ nên đăng truyện tại suutruyen.com để tránh tình trạng truyện bị sao chép trái phép!</p>
</div>




<div class="" style="margin-top: 15px; background-color: #EEEDED; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);">
   <div class="" style="display:flex;margin-top:15px">
      <div class="" style="width:30%;background-color:white;text-align:center;justify-content:center">
        <p style="padding-top:10px">Tổng lượt xem</p>
        <p style="font-size:20px;font-weight:500">{{$totalViews}}</p>
      </div>

      <div class="" style="width:30%;margin-left:20px;background-color:white;text-align:center;justify-content:center">
        <p style="padding-top:10px">Tổng chương truyện</p>
        <p style="font-size:20px;font-weight:500">{{$totalChapters}}</p>
      </div>
    
   </div>
   <div class="thongkestoryus" style=" background-color: white;margin-top:22px">
       <table border=1>
        <tr>
          <td style="font-sze:19px;font-weight:500">Truyện</td>
          <td style="font-sze:19px;font-weight:500">Lượt xem </td>
          <td style="font-sze:19px;font-weight:500">Cập nhật ngày</td>
        </tr>
     @foreach($data as $dt)
        <tr>
          <td>{{$dt->title}}</td>
          <td>{{$dt->viewers}}</td>
          <td>31/01/2024</td>
        </tr>
      @endforeach
       </table>
   </div>
      
    </div>
  
</div>

</div>

        <!-- </div>
      </div> -->
    
   
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