<?php
include '../database.php';

$name = isset($_POST['name']) ? $_POST['name'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
$phone = str_replace([' ', '(', ')', '-', '+'], '', $phone);
$street = isset($_POST['street']) ? $_POST['street'] : '';
$home = isset($_POST['home']) ? $_POST['home'] : NULL;
$part = isset($_POST['part']) ? $_POST['part'] : NULL;
$appt = isset($_POST['appt']) ? $_POST['appt'] : NULL;
$floor = isset($_POST['floor']) && $_POST['floor'] != "" ? $_POST['floor'] : NULL;
//$order_count =

$comment = isset($_POST['comment']) ? $_POST['comment'] : '';
$change = isset($_POST['change']) ? 1 : 0;
$payment = isset($_POST['payment']) ? 1 : 0;
$callback = isset($_POST['callback']) ? 1 : 0;

date_default_timezone_set('Europe/Moscow');
$dateTime = date("Y-m-d H:i:s");


$q = "SELECT * FROM users WHERE email =:email";
$db = Db::getInstance();
$user = $db->fetchAll($q, ['email' => $email]);
//$user = $db->fetchAll(PDO::FETCH_ASSOC);

if ($user) {
    //пользователь такой есть
    $order_counts = "SELECT * FROM users WHERE email =:email";
    $db_counts = Db::getInstance();
    $getCounts = $db_counts->fetchAll($order_counts, ['email' => $email]);
    $countsOrders = $getCounts[0]['orders_count'];
    $userId = $getCounts[0]['id'];

    // потом добавим заказ
    $order_update = "INSERT INTO orders (`comment`, `change`, `payment`, `callback`, `user_id`, `date`) VALUES (:comment,  :change, :payment, :callback, :user_id, :date)";
    $db = Db::getInstance();
    $ret = $db->exec($order_update, [
        'comment' => $comment,
        'change' => $change,
        'payment' => $payment,
        'callback' => $callback,
        'user_id' => $userId,
        'date' => $dateTime
    ]);

    $orderId = $db->lastInsertId();

    // а только помом обновим счетчик заказов
    $totalCounts = $countsOrders + 1;

    $count_update = "UPDATE users SET orders_count = :orders_count WHERE id = :id";
    $db = Db::getInstance();
    $ret = $db->exec($count_update, [
        'id' => $userId,
        'orders_count' => (int)$totalCounts
    ]);

    // и выведем сообщение что все ок
    echo "<p>" . $name . " спасибо, ваш заказ будет доставлен по адресу: " . $street . " " . $home . " " . $part . " " .  $appt . " " .  $floor . " </p>";
    echo "<p>" . " Номер вашего заказа: " . $orderId . " Это ваш " .$totalCounts . "-й заказ!</p>";


} else {
    //пользователя с таким email нет . добавяем
    $q = "INSERT INTO users (`name`, `email`, `phone`, `street`, `home`, `part`, `appt`, `floor`, `orders_count`) VALUES (:name, :email, :phone, :street, :home, :part, :appt, :floor, :orders_count)";
    $db = Db::getInstance();
    $ret = $db->exec($q, [
        'name' => $name,
        'email' => $email,
        'phone' => $phone,
        'street' => $street,
        'home' => $home,
        'part' => $part,
        'appt' => $appt,
        'floor' => $floor,
        'orders_count' => 1
    ]);

    $userId = $db->lastInsertId();

    $order_update = "INSERT INTO orders (`comment`, `change`, `payment`, `callback`, `user_id`, `date`) VALUES (:comment, :change, :payment, :callback, :user_id, :date)";
    $db = Db::getInstance();
    $ret = $db->exec($order_update, [
        'comment' => $comment,
        'change' => $change,
        'payment' => $payment,
        'callback' => $callback,
        'user_id' => $userId,
        'date' => $dateTime
    ]);
    $orderId = $db->lastInsertId();

    echo "<p>" . $name . " спасибо, ваш заказ будет доставлен по адресу: " . $street . " " . $home . " " . $part . " " .  $appt . " " .  $floor . " </p>";
    echo "<p>" . " Номер вашего заказа: " . $orderId . " Это ваш 1-й заказ! </p>";
}
?>