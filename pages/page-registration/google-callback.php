<?php

include $_SERVER['DOCUMENT_ROOT']."/dataBase/db.php";


$client_id = '54773513779-vb7qo0htcuup6d327itpl4amtuh8st6e.apps.googleusercontent.com';
$client_secret = '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';
$redirect_uri = 'https://brainrim.site/pages/page-registration/google-callback.php';

if (isset($_GET['code'])) {
    $code = $_GET['code'];

    // Получение токена
    $token_url = 'https://oauth2.googleapis.com/token';
    $post_data = [
        'code' => $code,
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'redirect_uri' => $redirect_uri,
        'grant_type' => 'authorization_code',
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $token_url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    $token_data = json_decode($response, true);
    if (empty($token_data['access_token'])) {
        die('Не удалось получить токен доступа от Google');
    }

    // Получение данных пользователя
    $userinfo_url = 'https://www.googleapis.com/oauth2/v2/userinfo';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $userinfo_url . '?access_token=' . $token_data['access_token']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $userinfo = curl_exec($ch);
    curl_close($ch);

    $user_data = json_decode($userinfo, true);
    if (empty($user_data['email']) || empty($user_data['name'])) {
        die('Не удалось получить email или имя от Google');
    }

    // Регистрация или авторизация пользователя
    $email = $user_data['email'];
    $name = $user_data['name'];

    $existence = selectOne('users', ['email' => $email]);
    if (!$existence) {
        // Регистрация нового пользователя
        $post = [
            'admin' => 0,
            'login' => $name,
            'pass' => '', // Пароль не нужен для Google аккаунта
            'email' => $email
        ];

        $id = insert('users', $post);

        // Создание записей в связанных таблицах
        $currencyMemany = ['user_id' => $id, 'sum_memany' => 0];
        insert('Memany', $currencyMemany);
    
        $currencyEyeHint = ['user_id' => $id, 'sum_eye_hint' => 0];
        insert('hintEye', $currencyEyeHint);
    
        $currencyIQscore = ['user_id' => $id, 'sum_iq' => 0];
        insert('IQscore', $currencyIQscore);
    
        $userLvlValue = ['user_id' => $id];
        insert('usersLvl', $userLvlValue);
    
        $dataForComparison = [
            'user_id' => $id,
            'lastSaveDate' => '2022-02-24 02:00:22',
            'rusWordsCount' => 1,
            'historyFactsCount' => 2,
            'engWordsCount' => 3
        ];

        insert('dateForComparison', $dataForComparison);

        //записываем достижение в БД
        require_once $_SERVER['DOCUMENT_ROOT'].'/dataBase/achievments/achievments.php';
        checkAllAchievements($id);

        //функция для оповещения о новой регистрации в канале ТГ
        function sendTelegramMessage($chatId, $message, $token) {
            $url = "https://api.telegram.org/bot{$token}/sendMessage";
            $data = [
                'chat_id' => $chatId,
                'text' => $message,
            ];
            $options = [
                'http' => [
                    'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                    'method'  => 'POST',
                    'content' => http_build_query($data),
                ],
            ];
            $context  = stream_context_create($options);
            file_get_contents($url, false, $context);
        }
        
        $token = '7768419147:AAFOkr_gRotalDyLrjQWkMuHfAJf3AXre24';
        $chatId = '@NEWREGISTRATIONBRAINRIM';
        $userData = [
            'username' => $name,
            'email' => $email,
            'registration_date' => date('Y-m-d H:i:s'),
        ];
        $message = "Новый пользователь зарегистрирован:\n\n";
        $message .= "Имя: " . $userData['username'] . "\n";
        $message .= "Email: " . $userData['email'] . "\n";
        $message .= "Дата регистрации: " . $userData['registration_date'];
        
        sendTelegramMessage($chatId, $message, $token);

        if (!$id) {
            die('Ошибка записи нового пользователя в базу данных');
        }
        $user = selectOne('users', ['id' => $id]);
    } else {
        $user = $existence;
    }


    function userAuth ($array) {
        $_SESSION['id'] = $array['id'];
        $_SESSION['login'] = $array['login'];
        $_SESSION['admin'] = $array['admin'];
     }

    // Авторизация
    userAuth($user);

    header('Location: /index.php');
    exit();
}

header('Location: /error.php');
exit();
