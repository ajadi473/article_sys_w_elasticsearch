<?php

namespace App\Search;

use App\Observers\ElasticSearchObserver;
use Elasticsearch\Client;

trait Searchable 
{
    public function bootSearchable()
    {
        if(config('services.search.enabled')) {
            static::observe(ElasticSearchObserver::class);
        }
    }

    public function elasticSearchIndex(Client $elasticSearchClient)
    {
        $elasticSearchClient->index([
            'index' => $this->getTable(),
            'type' => '_doc',
            'id' => $this->getKey()

        ]);
    }

    abstract public function toElasticsearchDocumentArray() : array;
}

?>