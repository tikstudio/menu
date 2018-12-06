<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
$con = new PDO('mysql:host=localhost;dbname=menu', 'root', '');
$stmt = $con->prepare('select * from menu order by sort');
$stmt->execute();
$test = $stmt->fetchAll(PDO::FETCH_ASSOC);
draw_menu($test);
function draw_menu(&$menu, $p_id = null) {
    echo "<ul>";
    foreach ($menu as $key => $m) {
        if ($m['p_id'] == $p_id) {
            unset($menu[$key]);
            echo "<li>";
            echo $m['title'];
            draw_menu($menu, $m['id']);
            echo "</li>";
        }
    }
    echo "</ul>";
}

?>
</body>
</html>