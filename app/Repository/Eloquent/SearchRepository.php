<?php

namespace App\Repository\Eloquent;

use Illuminate\Database\Eloquent\Collection;

interface SearchRepository
{
    public function search(string $query): Collection;
}

?>