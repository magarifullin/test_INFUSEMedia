<?php

declare(strict_types=1);

namespace Core\Responses;

class FileResponse extends AbstractResponse
{
    public function __construct(protected string $fileName) { }

    public function sendHeaders(): void
    {
        $headers = [
            'Content-Type' => mime_content_type($this->fileName),
            'Content-Length' => filesize($this->fileName),
        ];

        foreach ($headers as $key => $value) {
            header(sprintf('%s: %s', $key, $value));
        }
    }

    public function sendBody(): void
    {
        readfile($this->fileName);
    }
}