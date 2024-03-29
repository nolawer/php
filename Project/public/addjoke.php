<?php

if (isset($_POST['joketext'])) {

    try {
        include __DIR__ . '/../includes/DatabaseConnection.php';
        include __DIR__ . '/../includes/DatabaseFunctions.php';

        insertJoke($pdo, $_POST['joketext'], 1);

        header('location: jokes.php');


    } catch (PDOException $e) {
        $title = '오류가 발생했습니다.';

        $output = '데이터베이스 오류 : ' . $e -> getMessage() . ', 위치 : ' . $e -> getFile() . ':' .$e -> getLine();
    }
} else {

    $title = '글 등록';

    ob_start();

    include __DIR__ . '/../templates/addjoke.html.php';

    $output = ob_get_clean();
}

include __DIR__ . '/../templates/layout.html.php';