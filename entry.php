<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>課題・登録フォーム　テスト</title>
    <link rel="stylesheet" href="css/sanitize.css"> 
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h1>登録フォーム</h1>
    <p>登録内容は<a href="./" target="_blank">こちらから</a>確認できます。</p>
    <form action="insert.php" method="post">
        <ul>
            <li class="form-item">
                <label for="bookname">書籍名</label>
                <input type="text" name="bookname" id="bookname" class="uk-input">
            </li>
            <li class="form-item">
                <label for="bookurl">URL</label>
                <input type="url" name="bookurl" id="url" class="uk-input">
            </li>
            <li class="form-item">
                <label for="detail">コメント</label>
                <textarea name="detail" id="detail" cols="30" rows="10" class="uk-textarea"></textarea>
            </li>
        </ul>
        <input type="submit" value="送信">
    </form>    
</div>
</body>
</html>