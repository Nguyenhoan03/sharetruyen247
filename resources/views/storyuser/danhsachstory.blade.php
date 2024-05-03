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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<style>
  *body{
    background-color:#EEEDED;
  }
  a{
    list-style: none;
    text-decoration: none;
    
  }
  #popup-form{
    display:none;
  }
  #editor {
            width: 100%;
            height: 300px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-top: 10px;
        }
      
        .popup-form {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    background-color: white;
    border: 1px solid #ccc;
    padding: 20px;
    box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
}

.popup-form .close {
    position: absolute;
    top: 0px;
    right: 10px;
    cursor: pointer;
   padding-top:5px;
}

.popup-form h2 {
    margin-top: 0;
}

.popup-form p {
    margin-bottom: 20px;
}

</style>
<body onload="time()" class="app sidebar-mini rtl">
  <!-- Navbar-->
  @if(Session::has('deletestoryuser'))
    <div class="alert alert-success" style="margin-top:15px">
        {{ Session::get('deletestoryuser') }}
    </div>
@endif

@if(Session::has('successediterestory'))
    <div class="alert alert-success" style="margin-top:15px">
        {{ Session::get('successediterestory') }}
    </div>
@endif
@if(Session::has('capnhatthanhcong'))
    <div class="alert alert-success" style="margin-top:15px">
        {{ Session::get('capnhatthanhcong') }}
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
            <li class="breadcrumb-item"><a href=""><b>Danh sách truyện đã đăng</b></a></li>
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


<div id="popup-form" class="popup-form">
  <span class="close" onclick="closeForm()">&times;</span>
  <h2>Thu phí từ người đọc</h2>
  <form>
      @csrf
      <input type="hidden" name="title" id="form-title"> 
      <p id="title"></p>

        <div class="form-group">
            <label for="bank">Bán combo (Lưu ý: Truyện Dịch chọn lọc đã hoàn mới tick chọn được)</label>
            <label for="">chọn chương muốn người đọc chả phí:</label>
            <div id="chapter-list" class="form-group">
          
        </div>
        </div>
        <div class="form-group">
            <label for="account_owner">Nhập số linh thạch muốn người đọc trả phí cho từng chương</label>
            <input type="text" id="account_owner" name="form_doc" placeholder="nhập số linh thạch">
        </div>
        <button type="button" class="submit-button" onclick="submitForm()">Xác nhận</button>

    </form>
</div>





<div class="" style="margin-top: 15px">
    <div class="">
    <button style="align-items: center; justify-content: center;height:45px;background-color:#46A24A;font-weight:550;color:white;border-radius:10px;font-size:18px"><i class="fa-solid fa-circle-plus"></i><a style="color: white" href="/story_user/createstory"> Thêm truyện mới </a></button>
    </div>


    
    <div class="">
        <table>
            <tr style="border-bottom: 1px solid gray">
                <th>Thông tin truyện</th>
                <th>Duyệt?</th>
                <th>Lịch ra chap</th>
                <th></th>
                <th></th>
              
            </tr>
     @foreach($data as $dt)
            <tr style="border-top: 1px solid gray">
              <td  style="border-right: 1px solid gray;width:30%">
                <div class="" style="display:flex">
                <img style="width:100px " src="{{ asset('upload/' . $dt->image) }}" alt="">
              <div class="" style="padding-left:10px;">
                <p style="color: tomato;font-size:19px;font-weight:550">{{$dt->title}}</p>
                <p><i class="fa-solid fa-eye"></i> {{$dt->viewers}} Lượt xem </p>
                <p> {{$dt->total_chapters}} Chương </p>
                <button style="background-color:#46A24A;border: none;border-radius:7px"><a style="color: white;font-size:13px" href="/story_user/editerstory/{{$dt->title}}"><i class="fa-solid fa-pen"></i> SỬA THÔNG TIN TRUYỆN</a></button>
                </div>
                </div>
              </td>
              <td style="border-right: 1px solid gray;width:5%">
                <p style="color: white;font-weight: 500;background-color: #777777;width: 100px;padding: 5px 10px; border-radius: 5px; display: inline-block;text-align: center;">{{$dt->trang_thai}}</p>
              </td>
              <td style="border-right: 1px solid gray;width:18%">
                <p>Chưa có</p>
                <p><label for="toggle-form"><button onclick="openForm('{{$dt->title}}')">CẬP NHẬT & COMBO</button></label></p>

              </td>

              <td style="display: flex; flex-direction: column;width:12%;">
              <button style="align-items: center; justify-content: center;width: 160px;height:35px;background-color:#46A24A;font-weight:500;color:white;border-radius:10px;font-size:12px"><i class="fa-solid fa-circle-plus"></i><a style="color: white" href="/story_user/createchapterstory/{{$dt->title}}"> THÊM CHƯƠNG </a></button>
              <button style="margin-top:10px;align-items: center; justify-content: center;width: 160px;height:35px;background-color:tomato;font-weight:500;color:white;border-radius:10px;font-size:12px"><i class="fa-solid fa-trash"></i><a href="/story_user/deletestoryuser/{{$dt->id}}" style="color: white" href="#"> XÓA TRUYỆN </a></button>
              <button style="margin-top:10px;align-items: center; justify-content: center;width: 160px;height:35px;font-weight:500;color:white;border-radius:10px;font-size:12px;color: black"><i class="fa-solid fa-bars"></i><a style="color: black" href="/story_user/danhsachchapter/{{$dt->title}}"> DS CHƯƠNG </a></button>
              </td>
              <td style="width:35%">
                <p style="color:tomato">Bạn cần có ít nhất 5 chap để có thể yêu cầu duyệt,
khi được duyệt truyện mới xuất hiện ngoài website.</p>
              </td>
            </tr>
@endforeach
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
function openForm(title) {
    document.getElementById("popup-form").style.display = "block";
    document.getElementById("title").innerHTML = "Truyện : " + title;

    // Đặt giá trị của biến title vào trường ẩn trong form
    document.getElementById("form-title").value = title;

    // Sử dụng Ajax để gửi yêu cầu đến controller và nhận danh sách các chapter
    $.ajax({
        url: '/story_user/thu-phi-user/' + title, // Concatenate title properly
        type: 'GET',
        data: { title: title },
        success: function(response) {
            // Xóa danh sách các chapter cũ
            document.getElementById("chapter-list").innerHTML = '';

            // Thêm các checkbox cho từng chapter vào form
            response.forEach(function(chapter) {
                var checkbox = document.createElement("input");
                checkbox.setAttribute("type", "checkbox");
                checkbox.setAttribute("name", "chapter[]");
                checkbox.setAttribute("value", chapter.chapter);

                var label = document.createElement("label");
                label.innerHTML = chapter.chapter;

                var div = document.createElement("div");
                div.appendChild(checkbox);
                div.appendChild(label);

                document.getElementById("chapter-list").appendChild(div);
            });
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });

    
}

function submitForm() {
    // Lấy giá trị của token CSRF từ thẻ meta
    var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // Lấy giá trị của các trường dữ liệu khác trong form
    var title = document.getElementById("form-title").value;
    var selectedChapters = Array.from(document.querySelectorAll('input[name="chapter[]"]:checked')).map(function(checkbox){
        return checkbox.value;
    });
    var form_doc = document.getElementById("account_owner").value;

    // Tạo đối tượng formData để gửi dữ liệu đến server
    var formData = {
        _token: csrfToken,
        title: title,
        selectedChapters: selectedChapters,
        form_doc: form_doc
    };

    // Gửi yêu cầu Ajax
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "/story_user/post-thu-phi-user", true);
    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
              closeForm(); // Đóng form
                alert('bạn đã cập nhật thành công');
            } else {
                // Xử lý khi có lỗi
                console.error('An error occurred:', xhr.status);
            }
        }
    };
    xhr.send(JSON.stringify(formData));
}







function closeForm() {
  document.getElementById("popup-form").style.display = "none";
}
</script>
</body>

</html>

