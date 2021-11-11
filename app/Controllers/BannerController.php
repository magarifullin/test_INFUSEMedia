<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Repositories\RandomImageRepository;
use App\Repositories\ViewCounterRepository;
use Core\Logger;
use Core\Responses\FileResponse;
use Core\Responses\AbstractResponse;
use Core\Request;

class BannerController
{
    public function __construct(
        private ViewCounterRepository $viewCounterRepository,
        private RandomImageRepository $randomImageRepository
    ) { }

    public function download(Request $request): AbstractResponse
    {
        $params = [
            'ipAddress' => $request->getRemoteIp(),
            'userAgent' => $request->getUserAgent(),
            'pageUrl' => $request->getRefererUri(),
        ];
        if (!$this->viewCounterRepository->increment($params)) {
            (new Logger())->error('DB error');
        }

        return new FileResponse($this->randomImageRepository->getOneByRandom());
    }
}