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
          
            <li class="breadcrumb-item"><a href=""><b>Danh sách chương truyện [{{$title}}]</b></a></li>
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





<div class="" style="margin-top: 15px">
    <div class="">
    <button style="align-items: center; justify-content: center;height:45px;background-color:#46A24A;font-weight:550;color:white;border-radius:10px;font-size:18px"><i class="fa-solid fa-circle-plus"></i><a style="color: white" href="/story_user/createchapterstory/{{$title}}"> Thêm chương mới </a></button>
    </div>
    <div class="">
        <table>
            <tr style="border-bottom: 1px solid gray">
                <th>Chương</th>
                <th>Tình trạng</th>
                <th>VIP</th>
                <th></th>
              
            </tr>
    
               @foreach($data as $dt)
            <!--  -->
            <tr style="border-top: 1px solid gray">
              <td  style="border-right: 1px solid gray;width:35%">
                <div class="" style="padding-left:10px;">
                <p style="color: tomato;font-size:16px;font-weight:550">{{$dt->chapter}}</p>
              
                </div>
              </td>
              <td style="border-right: 1px solid gray;width:10%">
                <p style="font-size: 14 px;color: white;font-weight: 500;background-color: #FF7043;width: 100px;padding: 5px 10px; border-radius: 5px; display: inline-block;text-align: center;">Chờ duyệt</p>
              </td>
              <td style="border-right: 1px solid gray;width:8%">
                <p style=" color: green">FREE</p>
               
              </td>

              <td style="width:50%;">
              <button style="align-items: center; justify-content: center;width: 140px;height:35px;background-color:#46A24A;font-weight:500;color:white;border-radius:10px;font-size:12px"><a style="color: white" href="/story_user/createchapterstory"><i class="fa-solid fa-eye"></i> XEM TRƯỚC </a></button>
              <button style="margin-top:10px;align-items: center; justify-content: center;width: 140px;height:35px;background-color:#00BCD4;font-weight:500;color:white;border-radius:10px;font-size:12px"><a href="/story_user/editerchapter/{{$dt->title}}/{{$dt->chapter}}" style="color: white" href="/story_user/editerchapter"><i class="fa-solid fa-pen"></i> CHỈNH SỬA </a></button>
              <button style="margin-top:10px;align-items: center; justify-content: center;width: 140px;height:35px;font-weight:500;color:white;border-radius:10px;font-size:12px;color: black;background-color:tomato"><a style="color: black" href="#"><i class="fa-solid fa-trash"></i> XÓA CHƯƠNG </a></button>
              </td>
              
            </tr>
@endforeach
            <!--  -->
        </table>

      
    </div>
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