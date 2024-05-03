@include('header')
<style>
    li{
       list-style: none;
        text-decoration: none;
    }
    #messages {
        background-image:url('https://gcs.tripi.vn/public-tripi/tripi-feed/img/474078gJJ/hinh-anh-dam-chat-kiem-hiep_092416089.jpg') ;
        background-size: cover; /* Đảm bảo hình ảnh sẽ tự động điều chỉnh kích thước để phù hợp với kích thước của phần tử */
        background-position: center; /* Căn giữa hình ảnh */
        height: 500px;
        border-radius: 10px;
        overflow-y: auto; /* Hiển thị thanh cuộn nếu nội dung vượt quá kích thước */
    }
    #messages li {
        list-style-type: none; /* Ẩn dấu đầu dòng của các tin nhắn */
        margin-bottom: 10px; /* Khoảng cách giữa các tin nhắn */
        padding: 10px; /* Khoảng cách bên trong các tin nhắn */
    
        border-radius: 10px; /* Bo tròn các góc của tin nhắn */
        width:30%;
      
        color:black;
    }
    .clear {
    clear: both;
}

    /* CSS cho phần thanh cuộn */
#messages::-webkit-scrollbar {
    width: 8px; /* Độ rộng của thanh cuộn */
}

#messages::-webkit-scrollbar-track {
    background: pink; /* Màu nền của thanh cuộn */
}

#messages::-webkit-scrollbar-thumb {
    background-color: rgba(0, 0, 0, 0.5); /* Màu của thanh cuộn */
    border-radius: 4px; /* Bo tròn các góc của thanh cuộn */
}

#messages::-webkit-scrollbar-thumb:hover {
    background-color: rgba(0, 0, 0, 0.8); /* Màu của thanh cuộn khi di chuột qua */
}

li.sender{
    float:right;
    margin-right: 20px;
    margin-top: 8px;
}
li.receive{
    float: left;
}


li.messagebefore{
   
        list-style-type: none; /* Ẩn dấu đầu dòng của các tin nhắn */
        margin-bottom: 10px; /* Khoảng cách giữa các tin nhắn */
        padding: 10px; /* Khoảng cách bên trong các tin nhắn */
       background-color: white;
        border-radius: 10px; /* Bo tròn các góc của tin nhắn */
        width:50%;
      
        color:black;
    
}
li.messagebefore {
        list-style: none;
        text-decoration: none;
        margin-bottom: 10px;
        padding: 10px;
        border-radius: 10px;
       
        color: black;
        
        
    }

    li.messagebefore,.clear {
        clear: both;
    }


    /* CSS cho phần thanh cuộn */
    #messages::-webkit-scrollbar {
        width: 8px;
    }

    #messages::-webkit-scrollbar-track {
        background: pink;
    }

    #messages::-webkit-scrollbar-thumb {
        background-color: rgba(0, 0, 0, 0.5);
        border-radius: 4px;
    }

    #messages::-webkit-scrollbar-thumb:hover {
        background-color: rgba(0, 0, 0, 0.8);
    }

    li.sender {
        float: right;
        margin-right: 20px;
        margin-top: 8px;
    }

    li.receiver {
        float: left;
    }

 
    #messages li.sender {
    text-align: right;
}


</style>
<div class="container">
    <div id="app">
        <div class="row">
            <!-- <div class="col-md-3">
              
            </div> -->
            <div class="col-md-12">
                <!-- Main content area -->
                <div id="messagesContainer">
                    <!-- Messages will be displayed here -->
                    
                    <ul style="height:550px; border-radius: 10px;" id="messages">
    @foreach($message as $ms)
        <li class="messagebefore {{ $ms->username == auth()->user()->name ? 'sender' : 'receiver' }}">
            <span class="usernamebefore">{{ $ms->username }}</span><br/>
            {{ $ms->message }}
        </li>
    @endforeach
</ul>

                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="message" placeholder="Nhập nội dung tin nhắn"
                        onkeydown="handleKeyPress(event)">
                    <button class="btn btn-primary" onclick="sendMessage()">Send</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="footer" class="footer border-top pt-2">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-5">
                <strong>Suu Truyện</strong> - <a title="Đọc truyện online"
                    class="text-dark text-decoration-none" href="#">Đọc truyện</a> online một cách nhanh nhất. Hỗ trợ
                mọi thiết bị như di động và máy tính bảng.
            </div>
            <ul class="col-12 col-md-7 list-unstyled d-flex flex-wrap list-tag">
                <!-- Tags -->
            </ul>

            <div class="col-12">
                <a rel="license" href="http://creativecommons.org/licenses/by/4.0/"><img
                        alt="Creative Commons License" style="border-width:0;margin-bottom: 10px"
                        src="./assets/images/88x31.png"></a><br>
                <p>Website hoạt động dưới Giấy phép truy cập mở <a rel="license"
                        class="text-decoration-none text-dark hover-title"
                        href="http://creativecommons.org/licenses/by/4.0/">Creative Commons Attribution 4.0
                        International License</a></p>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>

<script>
    function handleKeyPress(event) {
        if (event.key == "Enter") {
            sendMessage();
        }
    }

    // Gửi tin nhắn
    let usernameInput = "{{ auth()->user()->name }}";
    let messageInput = document.getElementById('message');
    let messagesList = document.getElementById('messages');
    function sendMessage() {
    
    let message = messageInput.value.trim();

    // Kiểm tra xem tên người dùng và tin nhắn có trống không
    if (message !== '') {
        axios.post('/send', { 
            username: usernameInput, // Gửi tên người dùng cùng tin nhắn
            message: message 
        })
        .then(response => {
            console.log(response.data);
            messageInput.value = ''; // Xóa nội dung của ô nhập tin nhắn sau khi gửi
        
            
        })
        .catch(error => {
            console.error(error);
        });
    }
}

    // Kết nối với Pusher và lắng nghe sự kiện 'my-event'
    const pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
        cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
        encrypted: true
    });

    const channel = pusher.subscribe('my-channel');
channel.bind('my-event', (data) => {
    let li = document.createElement('li');

    if ("{{ auth()->user()->name }}" == data.username) {
        li.classList.add('sender');
    } else {
        li.classList.add('receiver');
    }

    li.innerHTML = '<span class="username">' + data.username + "</span><br/>" + data.message;

    let messageLength = data.message.length;
    let userLength = data.username.length;

    let width = userLength > messageLength ? (userLength * 10) : (messageLength * 10);
    li.style.width = width + 'px';
    li.style.textAlign = ("{{ auth()->user()->name }}" == data.username) ? 'right' : 'left'; 
    li.style.background = "white";
    li.classList.add('clear'); // Thêm class clear

    messagesList.appendChild(li); // Hiển thị tin nhắn mới nhất ở phía dưới
});



</script>

<script src="./assets/jquery.min.js"></script>
<script src="./assets/popper.min.js"></script>
<script src="./assets/bootstrap.min.js"></script>
<script src="./assets/app.js"></script>
<script src="./assets/common.js"></script>

<div id="loadingPage" class="loading-full">
    <div class="loading-full_icon">
        <div class="spinner-grow"><span class="visually-hidden">Loading...</span></div>
    </div>
</div>
