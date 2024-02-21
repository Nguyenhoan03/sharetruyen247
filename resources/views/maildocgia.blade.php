<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thông báo ủng hộ</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            font-size: 24px;
            color: #333;
            margin-top: 0;
        }
        p {
            font-size: 16px;
            color: #666;
            margin-bottom: 10px;
        }
        .highlight {
            color: #007bff;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
      
        <p>Người dùng <span class="highlight">{{$ttdocgia->email}}</span> đã ủng hộ linh thạch cho bạn.</p>
        <p><span class="highlight">{{$datanguoigui['title']}}</span> - Chương <span class="highlight">{{$datanguoigui['chapter']}}</span></p>
        <p class="highlight">Lời nhắc: {{$datanguoigui['message']}}</p>
        
        <p>Bạn vừa được cộng thêm <span class="highlight">{{$datanguoigui['linhthach_grant']}}</span> linh thạch vào tài khoản.</p>

    </div>
</body>
</html>
