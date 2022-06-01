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
