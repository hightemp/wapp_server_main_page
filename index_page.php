<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная страница - <?php echo $SERVER_NAME ?></title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
</head>
<body>
    <div class="top-panel">
        <div></div>
        <div>
            <a class="btn btn-success" href="/?edit=1">Редактировать</a>
        </div>
    </div>
    <?php echo $sContent ?>
</body>
</html>

<style>
body, html {
    font-family: Arial;
    margin: 0px;
    padding: 0px;
}
.top-panel {
    top: 0px;
    padding: 2px;
    position: sticky;
    background: #eee;
    display: grid;
    grid-template-columns: 1fr auto;
    height: 40px;
}
.top-panel .button {
    padding: 5px;
    background: green;
    color: white;
    text-decoration: none;
    display: inline-block;
}
</style>