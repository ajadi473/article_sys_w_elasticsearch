<?php 

namespace App\Repository\Eloquent;

use App\Models\Article;
use Illuminate\Database\Eloquent\Collection;

class EloquentSearchRepository implements SearchRepository
{
    public function search(string $term): Collection
    {
        return Article::query()
                ->where(fn ($query) => (
                    $query->where('title', 'LIKE', '%{term}%')
                            ->orWhere('body', 'LIKE', "%{$term}%")
                ))->get();
    }

}

?>