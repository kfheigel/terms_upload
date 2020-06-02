<?php

declare(strict_types=1);

namespace HomePL\TermUploader;

use League\Flysystem\FileExistsException;
use League\Flysystem\Filesystem;
use RoyVoetman\FlysystemGitlab\Client;
use RoyVoetman\FlysystemGitlab\GitlabAdapter;
use UploaderInterface;

class Uploader implements UploaderInterface
{
    private string $path;
    private string $content;

    public function __construct(string $path, string $content)
    {
        $this->path = $path;
        $this->content = $content;
    }

    public function upload(): bool
    {
        $client = new Client($_ENV['GITLAB_ACCESS_TOKEN'], $_ENV['GITLAB_PROJECT_ID'], $_ENV['GITLAB_BRANCH'], $_ENV['GITLAB_BASEURL']);

        $adapter = new GitlabAdapter($client);

        $filesystem = new Filesystem($adapter);

        try {
            $filesystem->write($this->path, $this->content);

            return true;
        } catch (FileExistsException $e) {
            return false;
        }
    }
}
