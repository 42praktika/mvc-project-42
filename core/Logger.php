<?php
declare(strict_types=1);
namespace app\core;

class Logger extends \Psr\Log\AbstractLogger
{

    private string $filename;

    public function __construct(string $filename)
    {
        $this->filename = $filename;
    }

    /**
     * @inheritDoc
     */
    public function log($level, string|\Stringable $message, array $context = []): void
    {

        $dirname = dirname($this->filename);
        if (!file_exists($dirname)) {
            mkdir($dirname, 0777, true);
        }
        file_put_contents($this->filename, date("y.m.d H:i:s")." [".$level."] ".$message.PHP_EOL, FILE_APPEND);

    }
}