<?php

namespace App\Traits;

trait PaginateTrait
{
    public  function  paginate($model){

        return  [
            'total' => $model->total(),
            'count' => $model->count(),
            'per_page' => $model->perPage(),
            'current_page' => $model->currentPage(),
            'last_page' => $model->lastPage(),
            'from' => $model->firstItem(),
            'to' => $model->lastItem(),
            'next_page_url' => $model->nextPageUrl(),
            'prev_page_url' => $model->previousPageUrl(),


        ];

    }
}
