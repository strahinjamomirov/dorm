<?php
/**
 * Project: yacht-management
 * Author: Zivorad Antonijevic (zivoradantonijevic@gmail.com)
 * Date: 5.4.18.
 */

namespace console\controllers;

use console\components\SshController;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Console;


/**
 * DeployCommand
 **/
class DeployController extends SshController
{
    public $hostsConfig = [];
    public $defaultAction = 'deploy';

    public function init()
    {
        parent::init();
        $this->hostsConfig = Yii::$app->params['deploy']['hosts'];
    }


    /**
     * @param $host
     *
     */
    public function actionDeploy($host = '')
    {
        $config = $this->getConfig($host);
        if ( ! $config) {
            return;
        }


        $php      = ArrayHelper::getValue($config, 'php', 'php');
        $commands = [
            'cd ' . $config['directory'],
            'eval "$(ssh-agent -s)"',
            'ssh-add '.$config['remote_key_file'],
            'git pull -f origin master',
            $php . ' composer.phar install',
            $php . ' ./yii migrate --interactive=0',
            $php . ' ./yii cache/flush-all',
        ];

        $this->runCommands($commands);
    }

    /**
     * @param $host
     *
     */
    public function actionClearAssets($host = '')
    {
        $config = $this->getConfig($host);
        if ( ! $config) {
            return;
        }

        $commands = [
            'cd ' . $config['directory'],
            'rm -rf public/assets/[a-z0-9A-Z]*',
            'rm -rf public/admin/assets/[a-z0-9A-Z]*',
        ];

        $this->runCommands($commands);
    }

    /**
     * @param $host
     *
     */
    public function actionClearCache($host = '')
    {
        $config = $this->getConfig($host);
        if ( ! $config) {
            return;
        }

        $php      = ArrayHelper::getValue($config, 'php', 'php');
        $commands = [
            'cd ' . $config['directory'],
            $php . ' ./yii cache/flush-all',
        ];

        $this->runCommands($commands);
    }


    protected function getConfig($host)
    {
        if ( ! isset($this->hostsConfig[$host])) {
            $out = Console::ansiFormat("Specify one of hosts below:",[Console::FG_RED]);
            foreach( $this->hostsConfig as $host=>$config){
                $out .= "\n$host (for $config[hostname])";
            }
            $out .= "\n";
            $this->stdout($out);

            return null;
        }
        $config = $this->hostsConfig[$host];
        $this->connectToHost($config);

        return $config;
    }

    protected function connectToHost($config)
    {
        $port = isset($config['port']) ? $config['port'] : 22;
        $this->connect($config['hostname'], $config['auth'], $port);

        $output = $this->run('echo "test"');
        echo 'Output: ' . $output; // Output: test
    }

    protected function runCommands($commands)
    {
        // Second way, via callback
        $this->run($commands, function ($line) {
            $this->stdout($line);
        });
    }
}