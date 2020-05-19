<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Example form</title>
    </head>
    <body>
        <p>POST</p>
        <form method="post" action="script.php">
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name">
            </div>
            <div>
                <input type="submit" name="send" value="send">
            </div>
        </form>
        <p>GET</p>
        <form method="get" action="script.php">
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" name="name">
            </div>
            <div>
                <input type="submit" name="send" value="send">
            </div>
        </form>
    </body>
</html>