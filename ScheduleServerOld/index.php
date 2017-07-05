<?php
/**
 * Created by PhpStorm.
 * User: volke
 * Date: 27.05.2016
 * Time: 14:56
 */
require 'vendor/autoload.php';
require 'service/DBConnectionManager.php';
require 'model/User.php';
$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];
$c = new \Slim\Container($configuration);
$app = new \Slim\App($c);
$app->post("/user/init", function (\Slim\Http\Request $request, \Slim\Http\Response $response, $args) {
    $received_user = new User($request->getParam('id'), $request->getParam('email'), $request->getParam('group'), $request->getParam('name'));
    $conn = new DBConnectionManager();
    $stmt = $conn->connection->prepare($conn->query->getUsers);
    $stmt->execute();
    $result = json_encode(array('users' => $stmt->fetchAll(PDO::FETCH_ASSOC)));
    $result = json_decode($result);

    echo "'" . $received_user->getEmail() . "' ";

    $count = 0;
    if (!empty($result->users)) {
        foreach ($result->users as $item) {
            $user = $received_user;
            if ($item->id_user == $user->getIdUser()) {
                if ($item->isadmin == 1) {
                    echo "isadmin";
                }
                break;
            }
            $count++;
        }
        if($count == count($result->users)) {
            echo "\nNew user. Creating...";
            $stmt = $conn->connection->prepare($conn->query->insertUser);
            $stmt->execute(['id_user' => $received_user->getIdUser(), 'email' => $received_user->getEmail(),
                '_group' => $received_user->getGroup(), '_name' => $received_user->getName()]);
            echo "\nSUCCESS";
        }
    } else {
        echo "\nNew user. Creating...";
        $stmt = $conn->connection->prepare($conn->query->insertUser);
        $stmt->execute(['id_user' => $received_user->getIdUser(), 'email' => $received_user->getEmail(),
            '_group' => $received_user->getGroup(), '_name' => $received_user->getName()]);
        echo "\nSUCCESS";
    }
});
$app->post("/groups/add", function (\Slim\Http\Request $request, \Slim\Http\Response $response, $args) {
    $conn = new DBConnectionManager();
    $stmt = $conn->connection->prepare($conn->query->postGroup);
    $stmt->execute(['groupname'=>$request->getParam('groupname')]);
    echo "success";
});
$app->post("/teachers/add", function (\Slim\Http\Request $request, \Slim\Http\Response $response, $args) {
    $conn = new DBConnectionManager();
    $stmt = $conn->connection->prepare($conn->query->postTeacher);
    $stmt->execute(['surname'=>$request->getParam('surname'),
        'firstname'=>$request->getParam('firstname'),
        'middlename'=>$request->getParam('middlename')]);
    echo "success";
});
$app->post("/subjects/add", function (\Slim\Http\Request $request, \Slim\Http\Response $response, $args) {
    $conn = new DBConnectionManager();
    $stmt = $conn->connection->prepare($conn->query->postSubject);
    $stmt->execute(['subjectname'=>$request->getParam('subjectname')]);
    echo "success";
});
$app->get("/teachers", function ($request, $response, $args) {
    $conn = new DBConnectionManager();
    $stmt = $conn->connection->prepare($conn->query->getTeachers);
    $stmt->execute();

    $result = array('teachers' => json_encode($stmt->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE));
    echo implode($result);
});
$app->get("/groups", function ($request, $response, $args) {
    $conn = new DBConnectionManager();
    $stmt = $conn->connection->prepare($conn->query->getAllGroups);
    $stmt->execute();

    $result = array('groups' => json_encode($stmt->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE));
    echo implode($result);
});
$app->get("/schedule/{group}/{week}", function (\Slim\Http\Request $request, $response, $args) {
    $arguments = array('group' => $request->getAttribute('group'), 'week' => $request->getAttribute('week'));
    $conn = new DBConnectionManager();
    $stmt = $conn->connection->prepare($conn->query->getScheduleForWeek);
    switch ($arguments['week']) {
        case 1:
            $stmt->execute(['_group' => $arguments['group'], 'ispair' => 1, 'specificweek' => 11]);
            break;
        case 2:
            $stmt->execute(['_group' => $arguments['group'], 'ispair' => 2, 'specificweek' => 21]);
            break;
        case 3:
            $stmt->execute(['_group' => $arguments['group'], 'ispair' => 1, 'specificweek' => 12]);
            break;
        case 4:
            $stmt->execute(['_group' => $arguments['group'], 'ispair' => 2, 'specificweek' => 22]);
            break;
    }
    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE);
});
$app->get("/schedule/{group}", function (\Slim\Http\Request $request, $response, $args) {
    $arguments = array('group' => $request->getAttribute('group'));
    $conn = new DBConnectionManager();
    $stmt = $conn->connection->prepare($conn->query->getSchedule);

    $stmt->execute(['_group' => $arguments['group']]);

    echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE);
});
$app->get("/auditories", function (\Slim\Http\Request $request, $response, $args) {
    $conn = new DBConnectionManager();
    $stmt = $conn->connection->prepare($conn->query->getAuditories);
    $stmt->execute();

    $result = array('auditories' => json_encode($stmt->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE));
    echo implode($result);
});
$app->get("/subjects", function (\Slim\Http\Request $request, $response, $args) {
    $conn = new DBConnectionManager();
    $stmt = $conn->connection->prepare($conn->query->getSubjects);
    $stmt->execute();

    $result= array('subjects' => json_encode($stmt->fetchAll(PDO::FETCH_ASSOC), JSON_UNESCAPED_UNICODE));
    echo implode($result);
});

$app->run();