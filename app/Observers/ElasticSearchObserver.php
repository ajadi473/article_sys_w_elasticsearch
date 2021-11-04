<?php

namespace App\Observers;

use Elasticsearch\Client;

class ElasticSearchObserver
{
    public function __construct(Client $elasticClient)
    {
        // 
    }
    /**
     * Handle the Article "created" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function saved($model)
    {
        $model->elasticSearchIndex($this->elasticSearchClient);
    }

    /**
     * Handle the Article "deleted" event.
     *
     * @param  \App\Models\Article  $article
     * @return void
     */
    public function deleted($model)
    {
        $model->elasticSearchDelete($this->elasticsearchClient);
    }
}
