<?php

namespace EmilMoe\ErrorReporter;

use App\Exceptions\Handler as LaravelHandler;
use Exception;
use Symfony\Component\Debug\Exception\FatalThrowableError;
use GuzzleHttp\Client;

class Handler extends LaravelHandler
{
    public function report(Exception $e)
    {
        parent::report($e);

        $file = explode(PHP_EOL, file_get_contents($e->getFile()));
        array_unshift($file, '');
        unset($file[0]);

        $client = new Client();
        $result = $client->post(config('error-reporter.endpoint'), [
            'form_params' => [
                'originalClassName' => $e instanceof \Exception ? 'Exception' : $e->getOriginalClassName(),
                'message'           => $e->getMessage(),
                'line'              => $e->getLine(),
                'file'              => $e->getFile(),
                'severity'          => $e instanceof \Exception ? 0 : $e->getSeverity(),
                'code'              => $e->getCode(),
                'previous'          => $e->getPrevious(),
                'trace'             => $e->getTraceAsString(),
                'preview'           => json_encode(array_slice($file, $e->getLine() - 15, 30, true)),
                'ip'                => ip2long(getenv('REMOTE_ADDR')),
                'useragent'         => getenv('HTTP_USER_AGENT'),
                'url'               => url()->full(),
                'app_name'          => env('APP_NAME'),
                'app_environment'   => env('APP_ENV'),
            ]
        ]);
    }
}
