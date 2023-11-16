<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

trait ApiTrait
{

    // scopes
    public function scopeIncluded(Builder $query)
    {
        // if no included parameter or no allowed relations, return
        if (!request()->has('included') || empty($this->allowIncluded)) {
            return;
        }

        $relations = explode(',', request('included')); // convert string to array of relations
        $allowInclude = collect($this->allowIncluded); // get allowed relations

        // remove relations that are not allowed
        foreach ($relations as $key => $relationship) {
            if (!$allowInclude->contains($relationship)) {
                unset($relations[$key]);
            }
        }

        $query->with($relations);
    }
    

    public function scopeFilter(Builder $query)
    {
        if (!request()->has('filter') || empty($this->allowFilter)) {
            return; // No hay filtros en la solicitud o no hay filtros permitidos.
        }
    
        $filters = request('filter');
        $allowFilter = collect($this->allowFilter);
    
        // Filtrar solo los campos permitidos
        $validFilters = [];
        foreach ($filters as $filter => $value) {
            if ($allowFilter->contains($filter)) {
                $validFilters[$filter] = $value;
            }
        }
    
        if(empty($validFilters)) {
            return; // No hay filtros válidos
        }
    
        $query->where(function ($query) use ($validFilters) {
            $this->applyFilter($query, $validFilters);
        });
    }
    
    
    private function applyFilter($query, $filters)
    {
        foreach ($filters as $filter => $value) {
            $query->orWhere(function ($query) use ($filter, $value) {
                if (strpos($filter, '.') !== false) {
                    $parts = explode('.', $filter);
                    $attribute = array_pop($parts);
                    $relation = implode('.', $parts);
    
                    $query->whereHas($relation, function ($q) use ($attribute, $value) {
                        $q->where($attribute, 'LIKE', "%$value%");
                    });
                } else {
                    $query->where($filter, 'LIKE', "%$value%");
                }
            });
        }
    }

    public function scopeExactFilter(Builder $query)
{
    if (!request()->has('exactfilter') || empty($this->allowFilter)) {
        return; // No hay filtros en la solicitud o no hay filtros permitidos.
    }

    $filters = request('exactfilter');
    $allowFilter = collect($this->allowFilter);

    // Filtrar solo los campos permitidos
    $validFilters = [];
    foreach ($filters as $filter => $value) {
        if ($allowFilter->contains($filter)) {
            $validFilters[$filter] = $value;
        }
    }

    if (empty($validFilters)) {
        return; // No hay filtros válidos
    }

    $query->where(function ($query) use ($validFilters) {
        $this->applyExactFilter($query, $validFilters);
    });
}

private function applyExactFilter($query, $filters)
{
    foreach ($filters as $filter => $value) {
        $query->where(function ($query) use ($filter, $value) {
            if (strpos($filter, '.') !== false) {
                // If the filter is a nested attribute, we'll assume it's exact as well.
                $parts = explode('.', $filter);
                $attribute = array_pop($parts);
                $relation = implode('.', $parts);

                $query->whereHas($relation, function ($q) use ($attribute, $value) {
                    $q->where($attribute, '=', $value);
                });
            } else {
                $query->where($filter, '=', $value);
            }
        });
    }
}


    public function scopeSort(Builder $query)
    {
        if (!request()->has('sort') || empty($this->allowSort)) {
            return;
        }

        $sortFields = explode(',', request('sort')); // convert string to array of sort fields
        $allowSort = collect($this->allowSort);

        // remove sort fields that are not allowed
        foreach ($sortFields as $sortField) {

            $direction = 'asc';

            if (substr($sortField, 0, 1) === '-') {
                $direction = 'desc';
                $sortField = substr($sortField, 1);
            }

            if ($allowSort->contains($sortField)) {
                $query->orderBy($sortField, $direction);
            }
        }
    }

    public function scopeGetOrPaginate(Builder $query)
    {
        if (request()->has('perPage')) {
            $perPage = intval(request('perPage'));

            if ($perPage) {
                return $query->paginate($perPage);
            }
        }

        return $query->get();
    }
}
