<?php

/*try {
    $db = new PDO("mysql:host=localhost;dbname=homework3-1", 'root', 'root');
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage();
    die();
}*/
echo "<pre>";
print_r($_POST);
var_dump($_POST['floor']);

include '../datqabse.php';

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
    echo "<h2>пользователь такой есть </h2>";
    print_r($user);

    $order_counts = "SELECT * FROM users WHERE email =:email";
    $db_counts = Db::getInstance();
    $getCounts = $db_counts->fetchAll($order_counts, ['email' => $email]);
    $countsOrders = $getCounts[0]['orders_count'];
    $userId = $getCounts[0]['id'];
    echo "<h4>у него ID ". $userId. " и заказов " . $countsOrders . " </h4>";
    // сначала добавим или обновим пользователя
    /* $user_update = "UPDATE users SET
       `name` = $name,
       `email` = :email,
       `phone` = :phone,
       `street` =:street,
       `home` = :home,
       `part` = :part,
       `appt` = :appt,
       `floor` = :floor
                  WHERE  email = $email";*/

    /*   $db = Db::getInstance();
       $ret = $db->exec($q, [
           'name' => $name,
           'email' => $email,
           'phone' => $phone,
           'street' => $street,
           'home' => $home,
           'part' => $part,
           'appt' => $appt,
           'floor' => $floor,
           'orders_count' => $countsOrders,
       ]);*/
    //  print_r($ret);

    //$userId = $db->lastInsertId();

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


    echo "<h4> пробуем обновить счетчик " . $userId . " </h4> ";
    //UPDATE products
    //SET price = 50500
    //WHERE id = 1;
    $totalCounts = $countsOrders + 1;
    echo "<h5> новый счетч к " . $totalCounts . " </h5>";

    $count_update = "UPDATE users SET (`orders_count`) VALUES (:orders_count) WHERE id = :id";

    print_r($count_update);

    $db = Db::getInstance();
    $ret = $db->exec($count_update, [
        'id' => $userId,
        'orders_count' => $totalCounts
    ]);

    print_r($ret);


    // и выведем сообщение что все ок
    echo "<p>" . $name . " спасибо, ваш заказ будет доставлен по адресу: " . $street . $home . $part . $appt . $floor . " </p>";
    echo "<p>" . " Номер вашего заказа: " . $orderId . " Это ваш n-й заказ!</p>";


} else {
    echo "<p> пользователя с таким email нет . добавяем</p>";
    print_r($user);

    $q = "INSERT INTO users (`name`, `email`, `phone`, `street`, `home`, `part`, `appt`, `floor`) VALUES (:name, :email, :phone, :street, :home, :part, :appt, :floor)";
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
    ]);
    //  print_r($ret);

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

    echo "<p>" . $name . " спасибо, ваш заказ будет доставлен по адресу: " . $street . $home . $part . $appt . $floor . " </p>";
    echo "<p>" . " Номер вашего заказа: " . $orderId . " Это ваш 1-й заказ! </p>";

}


/*
$email = $_POST['email'];

$query = $db->prepare("SELECT * FROM users WHERE `email` =:email");
$query->execute(['email' => $email]);
$user = $query->fetchAll(PDO::FETCH_ASSOC);
if ($user) {
    echo " пользователь такой есть ";
} else {
    echo " пользователя с таким email нет ";
    $query_update = $db->prepare("SELECT * FROM users WHERE `email` =:email ");
    $query_update->execute(['email' => $email]);
}
print_r($user);*/

?>


</pre>

