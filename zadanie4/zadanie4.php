<?php
// Класс Product с полями name и price
class Product {
    public $name;
    public $price;

    // Конструктор для инициализации полей
    function __construct($name, $price) {
        $this->name = $name;
        $this->price = $price;
    }

    // Метод расчета цены со скидкой
    function getDiscountedPrice($percent) {
        return $this->price * (1 - ($percent / 100));
    }
}

// Создание экземпляров товаров
$product1 = new Product('Телефон', 10000);
$product2 = new Product('Ноутбук', 50000);
$product3 = new Product('Планшет', 20000);

// Массив всех созданных товаров
$products = [$product1, $product2, $product3];

// Оформление страницы
echo '<style>';
echo 'body { font-family: Arial, sans-serif; background-color: #F5F5F5; }';
echo 'table { width: 50%; margin: auto; border-collapse: collapse; text-align: center; border: solid 3px #ff00c3ff;}';
echo 'th { background-color: #ff00c3ff; color: white; padding: 10px; }';
echo 'td { padding: 10px; }';
echo 'tr:nth-child(even) {background-color: #6be4ffff;}'; // Четные строки голубого цвета
echo 'tr:nth-child(odd) {background-color: #FFFFFF;}'; // Нечетные строки белого цвета
echo '.discount-cell { color: #ff00c3ff; font-weight: bold; }'; // Цена со скидкой выделена розовым жирным шрифтом
echo '</style>';

// Таблица
echo '<table>';
echo '<tr><th>Название</th><th>Цена</th><th>Цена со скидкой 10%</th></tr>';

// Заполнение таблицы товарами
foreach ($products as $product) {
    echo "<tr>";
    echo "<td style='color:#333;'>" . htmlspecialchars($product->name) . "</td>";
    echo "<td style='font-size:16px;'>" . number_format($product->price, 2) . " ₽</td>";
    echo "<td class='discount-cell'>" . number_format($product->getDiscountedPrice(10), 2) . " ₽</td>";
    echo "</tr>";
}

// Завершение таблицы
echo '</table>';
?>