<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết quả thanh toán</title>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; margin: 50px; }
        .message { font-size: 20px; padding: 20px; border-radius: 5px; }
        .success { background-color: #d4edda; color: #155724; }
        .fail { background-color: #f8d7da; color: #721c24; }
    </style>
</head>
<body>

    <h2>Kết quả thanh toán</h2>
    <div class="message {{ $status }}">
        <p>{{ $message }}</p>
    </div>

    <a href="/">Quay về trang chủ</a>

</body>
</html>
