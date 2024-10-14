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
            height: 500px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-top: 10px;
        }
</style>
<body onload="time()" class="app sidebar-mini rtl">
  <!-- Navbar-->
  @if(Session::has('successcreatechapter'))
    <div class="alert alert-success" style="margin-top:15px">
        {{ Session::get('successcreatechapter') }}
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
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://img.dtruyen.com/limitless/images/demo/users/face1.jpg" width="50px"
        alt="User Image">
      <div>
        <p class="app-sidebar__user-name"><b>Võ Trường</b></p>
        <p class="app-sidebar__user-designation">Chào mừng bạn trở lại</p>
      </div>
    </div>
    <hr>
    <ul class="app-menu">
      <!-- <li><a class="app-menu__item haha" href="phan-mem-ban-hang.html"><i class='app-menu__icon bx bx-cart-alt'></i>
          <span class="app-menu__label">POS Bán Hàng</span></a></li> -->
      <li><a class="app-menu__item " href="/story_user"><i class='app-menu__icon bx bx-tachometer'></i><span
            class="app-menu__label">Thống kê tổng quan</span></a></li>
      <li><a class="app-menu__item" href="table-data-table.html"><i class='app-menu__icon bx bx-id-card'></i> <span
            class="app-menu__label">Danh sách truyện</span></a></li>
      <li><a class="app-menu__item" href="#"><i class='app-menu__icon bx bx-user-voice'></i><span
            class="app-menu__label">Thống kê lượt xem</span></a></li>
      <li><a class="app-menu__item" href="table-data-product.html"><i
            class='app-menu__icon bx bx-purchase-tag-alt'></i><span class="app-menu__label">Quản lý sản phẩm</span></a>
      </li>
      <li><a class="app-menu__item" href="table-data-oder.html"><i class='app-menu__icon bx bx-task'></i><span
            class="app-menu__label">Cài đặt thanh toán</span></a></li>

            <li><a class="app-menu__item" href="table-data-oder.html"><i class='app-menu__icon bx bx-task'></i><span
            class="app-menu__label">Đổi linh thạch</span></a></li>

            <li><a class="app-menu__item" href="table-data-oder.html"><i class='app-menu__icon bx bx-task'></i><span
            class="app-menu__label">Độc giả ủng hộ</span></a></li>

            <li><a class="app-menu__item" href="table-data-oder.html"><i class='app-menu__icon bx bx-task'></i><span
            class="app-menu__label">Độc giả đọc chương thu phí</span></a></li>
     

    </ul>
  </aside>
  <main class="app-content">
    <div class="row">
      <div class="col-md-12">
        <div class="app-title">
          <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href=""><b>Thêm chương truyện ({{$title}})</b></a></li>
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


<a href="/story_user/danhsachchapter/{{$title}}">
<button style="margin-top:15px;background-color:#46A24A;color:white;font-weight:550;width: 330px;height:40px;border-radius:5px;border:1px solid #D6F4F8"> DANH SÁCH CHƯƠNG TRUYỆN CỦA TÔI</button>
</a>

<form action="/story_user/postediterstory/{{$title}}" method="POST">
  @csrf
<div class="" style="margin-top: 15px; background-color: white; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);">
   <div class="" style="margin-left:20px;">
  
<div style="margin-top:15px;padding-top:15px">
    <div>
        <label for="chapter_number">Chương số</label>
        <input type="text" id="chapter_number" name="chapter_number" placeholder="0">
    </div>
    <div style="margin-top:5px;">
        <span style="color: tomato;">Chỉ nhập số</span>
    </div>
</div>

<div style="margin-top:15px;">
      <div>
          <label for="chapter_name">Tên chương</label>
          <input type="text" style="width:80%" id="chapter_name" name="chapter_name" placeholder="Nhập tên chương tại đây">
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
  <textarea name="chapter_content" id="editor" cols="1000" rows="1000" style="width:100%; height: 500px;"></textarea>

</div>
<div class="">
<div style="display: flex; align-items: center;padding-top:15px;padding-left:15px; margin-top: 15px; background-color: #FDE1DF; border: 1px solid red;border-radius:5px">
    <p style="text-align: center">Khi đăng nhiều chương, Linh thạch sẽ được đặt mặc định cho tất cả các chương là số linh thạch đã chọn ở trên.</p>
</div>
<div class="">
<button type="submit" style="height: 45px; cursor: pointer;background-color:#2E3C43;color: white; font-weight:550; border-radius:5px;margin-top: 18px" ><i class="fa-solid fa-file-lines"></i> Lưu thông tin truyện</button>
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
  <script type="text/javascript">
    var data = {
      labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6"],
      datasets: [{
        label: "Dữ liệu đầu tiên",
        fillColor: "rgba(255, 213, 59, 0.767), 212, 59)",
        strokeColor: "rgb(255, 212, 59)",
        pointColor: "rgb(255, 212, 59)",
        pointStrokeColor: "rgb(255, 212, 59)",
        pointHighlightFill: "rgb(255, 212, 59)",
        pointHighlightStroke: "rgb(255, 212, 59)",
        data: [20, 59, 90, 51, 56, 100]
      },
      {
        label: "Dữ liệu kế tiếp",
        fillColor: "rgba(9, 109, 239, 0.651)  ",
        pointColor: "rgb(9, 109, 239)",
        strokeColor: "rgb(9, 109, 239)",
        pointStrokeColor: "rgb(9, 109, 239)",
        pointHighlightFill: "rgb(9, 109, 239)",
        pointHighlightStroke: "rgb(9, 109, 239)",
        data: [48, 48, 49, 39, 86, 10]
      }
      ]
    };
    var ctxl = $("#lineChartDemo").get(0).getContext("2d");
    var lineChart = new Chart(ctxl).Line(data);

    var ctxb = $("#barChartDemo").get(0).getContext("2d");
    var barChart = new Chart(ctxb).Bar(data);
  </script>
  <script type="text/javascript">
    //Thời Gian
    function time() {
      var today = new Date();
      var weekday = new Array(7);
      weekday[0] = "Chủ Nhật";
      weekday[1] = "Thứ Hai";
      weekday[2] = "Thứ Ba";
      weekday[3] = "Thứ Tư";
      weekday[4] = "Thứ Năm";
      weekday[5] = "Thứ Sáu";
      weekday[6] = "Thứ Bảy";
      var day = weekday[today.getDay()];
      var dd = today.getDate();
      var mm = today.getMonth() + 1;
      var yyyy = today.getFullYear();
      var h = today.getHours();
      var m = today.getMinutes();
      var s = today.getSeconds();
      m = checkTime(m);
      s = checkTime(s);
      nowTime = h + " giờ " + m + " phút " + s + " giây";
      if (dd < 10) {
        dd = '0' + dd
      }
      if (mm < 10) {
        mm = '0' + mm
      }
      today = day + ', ' + dd + '/' + mm + '/' + yyyy;
      tmp = '<span class="date"> ' + today + ' - ' + nowTime +
        '</span>';
      document.getElementById("clock").innerHTML = tmp;
      clocktime = setTimeout("time()", "1000", "Javascript");

      function checkTime(i) {
        if (i < 10) {
          i = "0" + i;
        }
        return i;
      }
    }
  </script>

 <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
<script>
  // Khởi tạo CKEditor
  ClassicEditor
    .create(document.querySelector('#editor'), {
      toolbar: [
        'heading',
        '|',
        'bold',
        'italic',
        'link',
        '|',
        'bulletedList',
        'numberedList',
        '|',
        'blockQuote',
        'insertTable',
        '|',
        'undo',
        'redo'
      ],
      // Cấu hình cho phép nội dung tùy chỉnh
      allowedContent: true, // Bỏ qua kiểm tra nội dung, cho phép tất cả thẻ
    })
    .then(editor => {
      console.log(editor);
    })
    .catch(error => {
      console.error(error);
    });
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