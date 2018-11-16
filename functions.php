<?php

function getInstance($modelName)
{
    $modelFilename = __DIR__ . '/models/' . $modelName . '.model';
    $dataFilename = __DIR__ . '/data/' . $modelName . '.data';

    $model = [];
    foreach (file($modelFilename) as $value) {
        $model[] = trim($value);
    }

    $data = [];
    foreach (file($dataFilename) as $value) {
        $data[] = trim($value);
    }

    // Двойной foreach из $modelName.model извлекает первую модель и ищет ее в $modelName.data,
    // если найдет - то создается массив для всех моделей
    // "имя модели" (из $modelName.model) => "значение модели" (из $modelName.data)
    $instance = [];
    foreach ($model as $propertyName) {
        $propertyValue = null;

        foreach ($data as $d) {
            $d = explode(":", $d);

            if ($d[0] === $propertyName) {
                $propertyValue = $d[1];
                break;
            }
        }

        $instance[$propertyName] = $propertyValue;
    }

    return $instance;
}

function saveInstance($modelName, $instance)
{
    $modelFilename = __DIR__ . '/models/' . $modelName . '.model'; //mes.model
    $dataFilename = __DIR__ . '/data/' . $modelName . '.data'; // mes.data

    $model = [];
    foreach (file($modelFilename) as $value) {
        $model[] = trim($value); // model = massiv user ; content
    }

    $data = [];
    foreach ($model as $propertyName) {
        $data[] = $propertyName . ':' . $instance[$propertyName]; // data = user:message['user']
                                                                    // data = content:message['content']
    }

    return file_put_contents(
        $dataFilename, // message.data
        implode("\n", $data)
    );
}
