<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Formatting text</h1>

    <form method="post">

        <div>
            <textarea name="content"></textarea>
        </div>

        <div>
            <button>Send</button>
        </div>

    </form>

    <? if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>

        <div><?= $_POST['content'] ?></div>
    
        <div><?= $parser->text($_POST['content']) ?></div>

    <? endif; ?>
    
</body>
</html>