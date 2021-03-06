<?php
require('Crud.php');

$formCrud = new Crud('form');
$questionCrud = new Crud('question');
$answersCrud = new Crud('answer_storage');
$data = $_POST;
$title = $data['title'];
$questions = [];
$answers = [];

$formId = $formCrud->insert(['name' => $title, 'id_category' => 1]);
$open = [];

foreach ($data as $key => $item) {
    if (startsWith($key, 'question')) {
        $questions[$key] = $item;

    } else if (startsWith($key, "answer")) {
        $answers[$key] = $item;
    }
}
$ids = [];

foreach ($questions as $question => $value) {
    $type = substr($question, strlen('question1'));
    if ($type === "") {
        $type = 'mult';
    }
    $object = ['question' => $value, 'id_form' => $formId, 'type' => $type];

    $id = $questionCrud->get();

    $questionCrud->insert($object);
    $ids[$question[strlen('question')]] = $questionCrud->getMaxId();
}
foreach ($answers as $answer => $value) {
    $ansId = $ids[substr($answer, strlen('answer1question'))];
    $obj = ['answer' => $value, 'id_question' => $ansId];
    $answersCrud->insert($obj);
}
function startsWith($text, $needle): bool
{
    return (substr($text, 0, strlen($needle)) === $needle);
}

header("Location: /public/adm/");
?>

