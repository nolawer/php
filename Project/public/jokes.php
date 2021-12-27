<?php

try {
    include __DIR__ . '/../includes/DatabaseConnection.php';
    include __DIR__ . '/../includes/DatabaseFunctions.php';

    $jokes = allJokes($pdo);


    // while ($row = $result -> fetch()) {
    //     $jokes[] = ['id' => $row['id'], 'joketext' => $row['joketext']];
    // }

    $title = '글 목록';

    $totaljokes = totaljokes($pdo);


    ob_start();

    // 템플릿을 include한다. php코드가 실행되지만
    // 결과 html은 브라우저로 전송되지 않고
    // 버퍼에 저장된다..

    include __DIR__ . '/../templates/jokes.html.php';

    // 출력 버퍼의 내용을 읽고 $output 변수에 저장한다.
    // $output은 layout.html에서 사용된다.

    $output = ob_get_clean();


} catch (PDOException $e) {
    $title = '오류가 발생했습니다.';

    $output = '데이터베이스 오류: ' . $e -> getMessage() . ', 위치 : ' . $e -> getFile() . ':' . $e -> getLine();
}

include __DIR__ . '/../templates/layout.html.php';


