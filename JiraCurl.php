<?php

class JiraCurl
{
    const USER   = 'release-engineer';
    const PASS   = 'b8u2d36';
    const PREFIX = 'http://jira.nationalfibre.net/rest/api/2/';

    public static function get($url, $asJson = false)
    {
        $ch = curl_init();

        $url = str_replace(' ', '+', Settings::jiraREST.$url);

        if (isset($_GET['DEBUG'])) {
            echo 'JiraCurl::__construct - '.$url.'<br>';
        }

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, self::USER.':'.self::PASS);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
        ));

        $data = curl_exec($ch);

        if ($asJson) {
            return $data;
        }

        return json_decode($data, true);
    }
/*
    public static function post($url, $data)
    {
        $ding = array(
            'jql' => 'project = PL487 order by key desc',
            'startAt' => 0,
            'maxResults' => 100,
        );


        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, Settings::jiraREST.$url);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, self::USER.':'.self::PASS);
        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
        ));

        $data = curl_exec($ch);

        if ($asJson) {
            return $data;
        }

        return json_decode($data, true);

        die(json_encode($ding));
    }
*/
}