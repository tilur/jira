<?php
require_once('flight/Flight.php');
require_once('settings.inc.php');
require_once('JiraCurl.php');
require_once('Project.php');

Flight::route('GET /', function(){
    echo 'hello world!';
});

Flight::route('GET /project', function() {
    echo 'project listing';
});

Flight::route('GET /project/@projectKey', function($projectKey) {

    $project = new Project($projectKey);

    $issues  = JiraCurl::get('search?jql=project="'.$project->getKey().'"+order+by+key+asc');

    Flight::render('project', array(
        'projectKey' => $project->getKey(),
        'project' => $project,
//        'projectInfo' => $info,
//        'issues' => $issues,
    ));
});

Flight::set('flight.views.path', 'views');
Flight::start();
?>
