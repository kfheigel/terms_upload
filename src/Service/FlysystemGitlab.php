<?php

namespace App\Service;

use League\Flysystem\Filesystem;
use RoyVoetman\FlysystemGitlab\Client;
use RoyVoetman\FlysystemGitlab\GitlabAdapter;

class FlysystemGitlab
{
    public function gitlabUpload($path, $content){
        $client = new Client('5QS_ccsn3tFh7X9q1xz6', '72', 'master', 'https://gitlab-frontend.home.net.pl');

        $adapter = new GitlabAdapter($client);

        $filesystem = new Filesystem($adapter);

        $filesystem->write($path, $content);

    }

}