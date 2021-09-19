<?php

try {
    $namePattern = '/^[a-zA-Zа-яА-Я]{3,}+$/ui';
    $error = [];

    $name = isset($_POST['first_name']) ? trim($_POST['first_name']) : null;
    if (!$name || !preg_match($namePattern, $name)) {
        $error[] = 'first_name'; // В массив с ошибками записываю классы инпутов, которые некорректно заполнены
    }

    $surname = isset($_POST['last_name']) ? trim($_POST['last_name']) : null;
    if (!$surname || !preg_match($namePattern, $surname)) {
        $error[] = 'last_name'; // В массив с ошибками записываю классы инпутов, которые некорректно заполнены
    }

    $country = isset($_POST['country']) ? trim($_POST['country']) : null;
    $gender = isset($_POST['gender']) ? trim($_POST['gender']) : null;

    $agreement = isset($_POST['agreement']) ?: null;
    if (!$agreement) {
        $error[] = 'agreement'; // В массив с ошибками записываю классы инпутов, которые некорректно заполнены
    }

    $email = isset($_POST['email']) ? trim($_POST['email']) : null;
    if (!$email || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = 'email'; // В массив с ошибками записываю классы инпутов, которые некорректно заполнены
    }

    $birthDate = isset($_POST['birth_date']) ? trim($_POST['birth_date']) : null;
    if (!is_null($birthDate)) {
        $birthDate = strtotime($birthDate);
        $curDate = date('m.d.y');
        $curDate = strtotime($curDate);

        if ($birthDate > $curDate) {
            $error[] = 'birth_date';
        }
    }

    if (count($error) > 0) {
        $response = [
            'success' => false,
            'error' => $error
        ];
    } else {
        $myCurl = curl_init();
        curl_setopt_array($myCurl, array(
            CURLOPT_URL => 'https://test-api.infokontrol.com/playground',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => http_build_query([
                'last_name' => $surname,
                'first_name' => $name,
                'email' => $email,
                'gender' => $gender,
                'country' => $country,
                'birth_date' => $birthDate,
                'agree' => true
            ])
        ));
        $curlResponse = curl_exec($myCurl);
        curl_close($myCurl);

        $response = [
            'success' => true,
            'curlResult' => $curlResponse
        ];
    }

    echo json_encode($response, JSON_THROW_ON_ERROR);
} catch (Exception $e) {
    file_put_contents('log.txt', $e->getMessage(), FILE_APPEND);
}