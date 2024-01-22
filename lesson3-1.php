<?php
// домашнее задание #3

// Задание #3.1


$permitted_chars = 'abcdefghijklmnopqrstuvwxyz';

for ($a = 0; $a <= 50; $a++) {
    $users[$a] = [
        'id' => $a,
        'name' => ucfirst(substr(str_shuffle($permitted_chars), 0, 5)),
        'age' => rand(18, 45)
    ];
}

$users_json = json_encode($users);
file_put_contents('users.json', $users_json);


$get_user = file_get_contents('users.json');
$get_user_decode = json_decode($get_user);
?>
	<pre>
    <? print_r($get_user_decode) ?>
</pre>
<?php
$count_user = count($get_user_decode);

function array_multisum(array $arr)
{
    $sum = 0;
    //$sum = array_sum($arr);
    foreach ($arr as $user_age) {
        //      print_r($user_age->age);
        $sum += $user_age->age;
    }
    return $sum;
}

$average_age = array_multisum($get_user_decode) / $count_user;
echo " Средний возраст " . round($average_age);

