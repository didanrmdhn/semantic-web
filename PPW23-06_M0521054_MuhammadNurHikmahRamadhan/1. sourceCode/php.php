<!DOCTYPE html>
<html>
<head>
    <title>Pola Pattern</title>
    <style>
        .yellow-box {
            width: 175px;
            height: 175px;
            background-color: yellow;
            display: inline-block;
        }

        .black-box {
            width: 175px;
            height: 175px;
            background-color: black;
            display: inline-block;
        }

        body {
            margin: 0;
        }

        div {
            margin: 0;
            padding: 0;
            font-size: 0;
        }
    </style>
</head>
<body>
    <?php
    $rows = 5;

    for ($i = 0; $i < $rows; $i++) {
        echo '<div>';
        for ($j = $rows - $i; $j > 0; $j--) {
            if ($j % 2 == 0) {
                echo '<div class="black-box"></div>';
            } else {
                echo '<div class="yellow-box"></div>';
            }
        }
        echo '</div>';
    }
    ?>
</body>
</html>
