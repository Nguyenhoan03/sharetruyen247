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
  /* Modal styles */


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
  .custom-button {
    background-color: #4CAF50; /* Màu nền */
    border: none;
    color: white; /* Màu chữ */
    padding: 20px; /* Kích thước lề */
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px; /* Kích thước chữ */
    margin: 4px 2px;
    transition-duration: 0.4s;
    cursor: pointer;
    border-radius: 8px; /* Bo tròn góc */
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2); /* Hiệu ứng bóng */
}

.custom-button:hover {
    background-color: #45a049; /* Màu nền khi di chuột vào */
    color: white; /* Màu chữ khi di chuột vào */
}

  /* Modal styles */
.modal {
  display: none;
  position: fixed;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgba(0, 0, 0, 0.4);
}

/* Modal content */
.modal-content {
  background-color: #fefefe;
  margin: 100px auto; /* căn giữa và cách đỉnh 100px */
  padding: 20px;
  border: 1px solid #888;
  width: 50%; /* Chiều rộng của modal */
  max-width: 500px; /* Chiều rộng tối đa */
  position: relative;
}

/* Close button */
.close {
  color: #aaa;
  position: absolute;
  top: 10px;
  right: 10px;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

/* Style for input groups */
.input-group {
  margin-bottom: 20px;
}

.input-group label {
  display: block;
  margin-bottom: 5px;
}

.input-group input[type="text"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 4px;
}

/* Style for submit button */
.submit-button {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

.submit-button:hover {
  background-color: #45a049;
}


/* button xóa */
.payment-info p {
    margin: 0;
    font-family: Arial, sans-serif;
}

.account-number {
    margin: 20px 0;
    font-size: 18px;
    color: #333;
}

.account-holder {
    margin: 10px 0;
    font-size: 16px;
    color: #666;
}

.delete-button {
    position: absolute;
    top: 10px;
    right: 10px;
    background-color: #dc3545;
    color: white;
    border: none;
    padding: 8px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    font-weight: bold;
    transition: background-color 0.3s, color 0.3s;
}

.delete-button:hover {
    background-color: #c82333;
}


/* drfgerdg */
.payment-info {
    border-radius: 7px;
    background-color: #f9f9f9;
    margin-top: 10px;
    position: relative;
    padding: 20px;
    text-align: center;
}

.account-number {
    margin-top: 10px;
    font-weight: bold;
}

.account-holder {
    margin: 10px 0;
}

.delete-button {
    position: absolute;
    bottom: 10px;
    right: 10px;
    background-color: #dc3545;
    color: white;
    border: none;
    padding: 8px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 14px;
    font-weight: bold;
    transition: background-color 0.3s, color 0.3s;
}

.delete-button:hover {
    background-color: #c82333;
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
  @if(Session::has('dknganhangthanhcong'))
    <div class="alert alert-success" style="color:blue;margin-top:15px">
        {{ Session::get('dknganhangthanhcong') }}
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
        <div class="" style="border: 1px solid green; border-radius:10px;padding-left:15px;padding-top:15px; background-color: #D6F4F8">
            <p>Truyện tình trạng hoàn thành sẽ không thể điều chỉnh sang tình trạng khác, nếu muốn thay đổi liên hệ Admin!</p>
            <p>Đẩy truyện lên trang chủ 10 Linh thạch/lần đối với truyện đã Full</p>
            <p>Truyện đăng duy nhất tại dtruyen mới được vào danh sách chọn lọc.</p>
        </div>
        <div style="border-radius:5px;display: flex; align-items: center;padding-top:15px;padding-left:15px; margin-top: 15px;  background-color: tomato; border: 1px solid red">
    <p style="text-align: center">Suutruyen.com khuyến cáo chỉ nên đăng truyện tại suutruyen.com để tránh tình trạng truyện bị sao chép trái phép!</p>
</div>




<div class="" style="margin-top: 15px; background-color: #EEEDED; box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.1);">

<button onclick="openForm()" class="custom-button">
    <i class="fa-solid fa-square-plus"></i> Thêm phương thức thanh toán
</button>

<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeForm()">&times;</span>
    <h2>Thêm phương thức thanh toán</h2>
    <form action="/story_user/createpptt" method="POST">
      @csrf
      <div class="input-group">
        <label for="bank">Ngân hàng + Số tài khoản:</label>
        <input type="text" id="bank" name="bank" placeholder="VD: VCB: 005xxxxxx">
      </div>
      <div class="input-group">
        <label for="account_owner">Tên chủ tài khoản:</label>
        <input type="text" id="account_owner" name="account_owner" placeholder="Tên chủ tài khoản">
      </div>
      <button type="submit" class="submit-button">Xác nhận</button>
    </form>
  </div>
</div>


   <div class="" style="display:flex;margin-top:15px">



   @foreach($data as $dt)
<div class="payment-info" style="width:100%">
    <p class="account-number">{{$dt->information_bank}}</p>
    <p class="account-holder">{{$dt->account_name_bank}}</p>
    <button class="delete-button" onclick="confirmDelete({{$dt->id}})">
        <i class="fa-solid fa-trash"></i> Xóa
    </button>
</div>
@endforeach

    
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
<script>
  function confirmDelete(id){
    if (confirm("Bạn có chắc chắn muốn xóa không?")) {
            window.location.href = "/story_user/deletebillingsetup/" + id;
        }
  }
</script>
<script>
function openForm() {
  document.getElementById("myModal").style.display = "block";
}

function closeForm() {
  document.getElementById("myModal").style.display = "none";
}
</script>

</body>

</html>