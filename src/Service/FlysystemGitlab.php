<?php

namespace App\Service;

use League\Flysystem\FileExistsException;
use League\Flysystem\Filesystem;
use RoyVoetman\FlysystemGitlab\Client;
use RoyVoetman\FlysystemGitlab\GitlabAdapter;


class FlysystemGitlab
{

    public function gitlabUpload($path, $content){
        $personalAccessToken = '5QS_ccsn3tFh7X9q1xz6';
        $projectId = '72';
        $branch = 'master';
        $baseUrl = 'https://gitlab-frontend.home.net.pl';

        $client = new Client($personalAccessToken, $projectId, $branch, $baseUrl);

        $adapter = new GitlabAdapter($client);

        $filesystem = new Filesystem($adapter);

        try {
            $filesystem->write($path, $content);
            return true;
        } catch (FileExistsException $e) {
            return false;
        }

    }

}