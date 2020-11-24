<?php

namespace deepskylog\LaravelGettext\Commands;

use Illuminate\Console\Command;
use deepskylog\LaravelGettext\FileSystem;
use deepskylog\LaravelGettext\Config\ConfigManager;

class BaseCommand extends Command
{
    /**
     * Filesystem helper.
     *
     * @var \deepskylog\LaravelGettext\FileSystem
     */
    protected $fileSystem;

    /**
     * Package configuration data.
     *
     * @var array
     */
    protected $configuration;

    /**
     * Prepares the package environment for gettext commands.
     *
     */
    protected function prepare()
    {
        $configManager = ConfigManager::create();

        $this->fileSystem = new FileSystem(
            $configManager->get(),
            app_path(),
            storage_path()
        );

        $this->configuration = $configManager->get();
    }
}
