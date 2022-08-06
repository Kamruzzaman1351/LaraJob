<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Mail Form Laravel Job</title>
</head>
<body>
  <h1>Dear {{ $mailInfo['name'] }},</h1>
  <p>{{ $mailInfo['title'] }}</p>

  <p>{{ $mailInfo['body'] }}</p>
   
  <p>Thank you</p>
  <p>{{ $mailInfo['user'] }}</p>
</body>
</html>