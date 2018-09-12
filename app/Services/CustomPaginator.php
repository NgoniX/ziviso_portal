<?php
/**
 * Created by PhpStorm.
 * User: fradrickcharakupa
 * Date: 20/2/2018
 * Time: 09:30
 */

namespace App\Services;


class CustomPaginator
{
    protected static $instance;

    public static function getInstance()
    {
        return is_null(static::$instance)?new static() : static::$instance;
    }

    function paginateCollection($collection, $perPage=50, $pageName = 'page', $fragment = null)
    {
        $currentPage = \Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPage($pageName);
        $currentPageItems = $collection->slice(($currentPage - 1) * $perPage, $perPage);
        parse_str(request()->getQueryString(), $query);
        unset($query[$pageName]);
        $paginator = new \Illuminate\Pagination\LengthAwarePaginator(
            $currentPageItems,
            $collection->count(),
            $perPage,
            $currentPage,
            [
                'pageName' => $pageName,
                'path' => \Illuminate\Pagination\LengthAwarePaginator::resolveCurrentPath(),
                'query' => $query,
                'fragment' => $fragment
            ]
        );

        return $paginator;
    }
}