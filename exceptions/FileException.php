<?php

namespace app\exceptions;

class FileException extends \Exception
{
   private string $filename;
   public function __construct(string $filename = "", string $message = "", int $code =0, ?\Throwable $previous = null)
   {

       $this->filename=$filename;
       parent::__construct($message, $code, $previous);
   }

    /**
     * @return string
     */
    public function getFilename(): string
    {
        return $this->filename;
    }
}