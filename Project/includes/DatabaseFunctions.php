<?php

function totaljokes($pdo){
    
    $query = query($pdo, 'SELECT COUNT(*) FROM joke');    

    $row = $query -> fetch();

    return $row[0];

}

function query($pdo, $sql, $parameters = []) {

    $query = $pdo -> prepare($sql);    

    $query -> execute($parameters);

    return $query;
}

function getJoke($pdo, $id) {

    // query() 함수에서 사용할 $parameters 배열 생성
    $parameters = [':id' => $id];

    $query = query($pdo, 'SELECT * FROM joke WHERE id = :id', $parameters);

    return $query -> fetch();
}

function insertJoke($pdo, $joketext, $authorId) {

    $query = 'INSERT INTO joke (joketext, jokedate, authorId) VALUES (:joketext, CURDATE(), :authorId)';

    $parameters = [':joketext' => $joketext, ':authorId' => $authorId];

    query($pdo, $query, $parameters);

}

function updateJoke($pdo, $jokeId, $joketext, $authorId) {

    $parameters = [':joketext' => $joketext, 'authorId' => $authorId, ':id' => $jokeId];

    query($pdo, 'UPDATE joke SET authorId = :authorId, joketext = :joketext WHERE id = :id', $parameters);

}

function deleteJoke($pdo, $jokeId) {

    $parameters = [':id' => $jokeId];

    query($pdo, 'DELETE FROM joke WHERE id = :id', $parameters);
}

function allJokes($pdo) {

    $jokes = query($pdo, 
    'SELECT joke.id, joke.joketext, name, email
    FROM joke INNER JOIN author
    ON joke.authorid = author.id'
    );

    return $jokes -> fetchAll();
}