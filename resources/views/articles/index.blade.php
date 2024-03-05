<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles</title>
</head>
<body>
    @foreach ($articles as $article)
    <ul>
        <li>{{ $article['id']}}</li>
        <li>{{ $article['name']}}</li>
    </ul>
    @endforeach
</body>
</html>