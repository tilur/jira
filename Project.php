<?php

class Project
{
    const SELECTOR = 'project/';

    private $key;
    private $lead;
    private $refine = '';
    private $hasRefine = false;
    private $refineSettings = array();
    private $versions = array();

    public function __construct($key)
    {
        $this->setKey($key);

        if (!isset($_GET['refine'])) {
            $_GET['refine'] = '';
        }
        $this->processRefine($_GET['refine']);

        $projectInfo   = JiraCurl::get('project/'.$key);
        $projectIssues = JiraCurl::get('search?jql='.$this->getRefine());

        $this->setLead($projectInfo['lead']);
        $this->setVersions($projectInfo['versions']);

        if (isset($_GET['DEBUG'])) {
            echo '<pre>'.print_r($projectInfo,true).'</pre>';
            echo '<pre>'.print_r($projectIssues,true).'</pre>';
        }
    }

    public function setKey($key)
    {
        $this->key = $key;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function getProjectUrl()
    {
        return Settings::url.self::SELECTOR.$this->key;
    }

    public function setLead($data)
    {
        $this->lead = array(
            'name'        => $data['name'],
            'displayName' => $data['displayName'],
            'link'        => $data['self'],
            'avatar'      => $data['avatarUrls']['48x48'],
        );
    }

    public function getLead($key = null)
    {
        if (is_array($key, array('name', 'displayName', 'link', 'avatar'))) {
            return $this->lead[$key];
        }

        return $this->lead;
    }

    public function setVersions($data)
    {
        if (count($data) > 0) {
            $this->versions[] = array(
                'id'          => '',
                'self'        => '',
                'name'        => 'Empty',
                'description' => '',
            );

            foreach ($data as $mt => $version) {
                $this->versions[$version['id']] = array(
                    'id'          => $version['id'],
                    'self'        => $version['self'],
                    'name'        => $version['name'],
                    'description' => $version['description'],
                );
            }
        }
    }

    public function getVersions()
    {
        return $this->versions;
    }

    public function getVersionsHtml()
    {
        if (count($this->versions) > 0) {
            echo '<ul>';
            foreach ($this->versions as $mt => $version) {
                $class = '';

                if (isset($this->refineSettings['version']) && $this->refineSettings['version'] == $version['name']) {
                    $class = ' class="active"';
                }

                $label = $version['name'] == 'Empty' ? 'None' : $version['name'];

                echo '<li'.$class.'><a href="'.Settings::url.self::SELECTOR.$this->getKey().'?refine=version='.$version['name'].'">'.$label.'</a></li>';
            }
            echo '</ul>';
        }
    }

    public function processRefine($data = '')
    {
        if ($data == '') {
            $this->refine = 'project = '.$this->key;
            return;
        }

        $data = explode('::', $data);

        $this->hasRefine = true;
        $this->refine = 'project = '.$this->key.' and';
        foreach ($data as $mt => $field) {
            $parts = explode('=', $field);

            switch($parts[0]) {
                case 'version':
                    $this->refine .= ' (fixVersion = '.$parts[1].' OR affectedVersion = '.$parts[1].')';
                    $this->refineSettings['version'] = $parts[1];
                    break;
            }
        }
    }

    public function getRefine()
    {
        return $this->refine;
    }

    public function hasRefine()
    {
        if ($this->hasRefine) {
            echo '<span class="navbar-unread">1</span>';
        }
    }
}

