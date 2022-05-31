<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tea</title>
    <style>
        section {
            margin: 40px auto;
            position: relative;
        }

        .fix {
            position: absolute;
            display: flex;
            top: 0;
            left: 50%;
            flex-direction: column;
        }

        input {
            margin-bottom: 20px;
        }

        strong {
            display: block;
        }
    </style>
</head>
<body>
    <section>
        <form action="index.php" method="POST">
            <h1>Зробіть свій вибір!</h1>
            <div class="center">
                <input name="water" type="range" id="water" value="50" min="50" max="1000" step="50"
                oninput="this.nextElementSibling.value = this.value">
                <input type="text" value="50"
                oninput="this.previousElementSibling.value = this.value"><br>
                <input name="sugar" type="range" value="0" min="0" max="10" step="0.5"
                oninput="this.nextElementSibling.value = this.value">
                <input type="text" value="0"
                oninput="this.previousElementSibling.value = this.value"><br>
                <strong>Оберіть об'єм чашки</strong><br>
                <label><input type="radio" name="volume" value="150"> Маленька чашечка (150 мл);</label><br>
                <label><input type="radio" name="volume" value="250" checked> Середня чашечка (250 мл);</label><br>
                <label><input type="radio" name="volume" value="500"> Велика чашечка (500 мл);</label><br>
                <input type="submit" value="Замовити">
                <hr>
            </div>
            <?php 
                if (isset($_POST['water'])) {
                    $water = $_POST['water'];
                } else {
                    $water = 0;
                }

                if (isset($_POST['sugar'])) {
                    $sugar = $_POST['sugar'];
                } else {
                    $sugar = 0;
                }
                
                if (isset($_POST['volume'])) {
                    $volume = $_POST['volume'];
                } else {
                    $volume = 0;
                }

                $time = 0.48;
                $cup = 0;
                
                echo "Ви обрали $water мл води та $sugar ч.л. цукру <br>";
                
                
                if ($water != 0) {
                    $sugar /= $water;
                    echo "<p>Чайник закипів</p>";
                    for ($i = $water; $i >= 50; $i -= 50) {
                        $cup += 50;
                        echo ("<p>Налито ".$cup." мл води</p>");
                        if ($cup == $volume) {
                            echo ("<p>Кружка повна</p>");
                            echo ("<p>Кидаємо " .number_format(($sugar * $cup), 1). " ч.л. цукру</p>");
                            echo ("<p>Опускаємо чайний пакетик на " .(int)($time * $cup). " сек</p>");
                            echo ("<p>Розмішуємо</p>");
                            echo ("<strong>Кружка чаю готова</strong>");
                            if ($i != 50) {
                                echo ("<p>Беремо наступну кружку</p>");
                            }
                            $cup = 0;
                        } else if ($i == 50) {
                            echo ("<p>Вода закінчилась</p>");
                            echo ("<p>Кидаємо " .number_format(($sugar * $cup), 1). " ч.л. цукру</p>");
                            echo ("<p>Опускаємо чайний пакетик на " .(int)($time * $cup). " сек</p>");
                            echo ("<p>Розмішуємо</p>");
                            echo ("<strong>Кружка чаю готова</strong>");
                        }
                    }
                    echo ("<p>Смачного чаювання!</p>");
                }

                    
            ?>
        </form>
    </section>
</body>
</html>