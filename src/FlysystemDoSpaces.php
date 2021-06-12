<?php

namespace Smart48\FlysystemDoSpaces;

use Illuminate\Support\Facades\Storage;
use Smart48\FlysystemDoSpaces\CheckFor503S3Client;
use Illuminate\Support\ServiceProvider;
use Aws\S3\S3Client as S3Client;
use League\Flysystem\AwsS3v3\AwsS3Adapter;
use League\Flysystem\Filesystem;

/**
 * Digital Ocean Spaces S3 Client extension
 * 
 * @link https://github.com/thephpleague/flysystem-aws-s3-v2/issues/18
 */
class DigitalOceanSpacesServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // the laravel throtting and backoff functionality
        $this->app->bind('cart', 'App\Flysystem\FullThrottle');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Storage::extend('dospaces', function($app, $config) {
            $client = new S3Client([
                'visibility' => $config['private'],
                'key'    => $config['do_key'],
                'secret' => $config['do_secret'],
                'region' => $config['do_region'],
                'base_url' => $config['do_url'],
                'endpoint' => $config['do_endpoint'],
            ]);

            $wrappedClient = new CheckFor503S3Client($client);

            return new Filesystem(new AwsS3Adapter($wrappedClient, env('S3_BUCKET')));
        });
    }
}