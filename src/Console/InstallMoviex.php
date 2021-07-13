<?php

namespace Go4tech\Moviex\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Go4tech\Moviex\StoreApi;

class InstallMoviex extends Command
{
    protected $signature = 'moviex:install';

    protected $description = 'Install the Moviex';

    public function handle()
    {
        $this->info('Installing Moviex...');

        $this->info('Publishing necessary files...');

        if (! $this->fileExists('moviex.php', 'config')) {
            $this->publishConfiguration('moviex-config');
            $this->info('Published configuration');
        } else {
            if ($this->dialogueConfirm('Config file already exists. Do you want to overwrite it')) {
                $this->info('Overwriting configuration file...');
                $this->publishConfiguration('moviex-config', $force = true);
            } else {
                $this->info('Existing configuration was not overwritten');
            }
        }

        exec('npm install');
        $this->info('Installing Tailwind css...');
        $this->tailwindInstall();
        exec('npm run dev');
        exec('php artisan migrate');
        (new StoreApi)->initialize();

        $this->info('Installation completed!');
    }

    private function tailwindInstall()
    {
      exec('npm install -D tailwindcss');
      copy(__DIR__.'/../resources/assets/css/app.css', resource_path('css/app.css'));
      copy(__DIR__.'/../resources/assets/js/app.js', resource_path('js/app.js'));
      copy(__DIR__.'/../tailwind.config.js', base_path('tailwind.config.js'));
      copy(__DIR__.'/../webpack.mix.js', base_path('webpack.mix.js'));
      $this->info('Tailwind is Installed...');
    }

    private function fileExists($fileName, $pathOptions = null)
    {
      switch ($pathOptions) {
        case 'config':
          return File::exists(config_path($fileName));
          break;
        case 'public':
          return File::exists(public_path($fileName));
          break;
        default:
        return File::exists(base_path($fileName));
      }
    }

    private function dialogueConfirm($dialogue)
    {
        return $this->confirm(
          $dialogue,
            false
        );
    }

    private function publishConfiguration($tagName, $forcePublish = false)
    {
        $params = [
            '--provider' => "Go4tech\Moviex\MoviesServiceProvider",
            '--tag' => $tagName
        ];

        if ($forcePublish === true) {
            $params['--force'] = '';
        }

       $this->call('vendor:publish', $params);
    }
}