<?php

namespace App\Services;

use App\Traits\Upload;

class AdminService
{
    use Upload;

    /**
     * @param $file
     * @return string
     */
    public function handleFile($file): string
    {
        return $this->upload($file, 'admins');
    }
}
