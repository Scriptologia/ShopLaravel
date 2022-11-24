<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

trait Searchable
{
    public function scopeSearch(Builder $query, $value) {
        $fields = $this->searchFields;
        return $query->where( function ($query)  use($value, $fields) {
            foreach($fields as $field)
            {
                if( isset($this->translatedAttributes) && in_array($field, $this->translatedAttributes)) {
                    $query->orWhereTranslationLike($field, "%{$value}%", App::getLocale());
                } else {
                    $query->orWhere($field, 'LIKE', "%{$value}%");
                }
            }
         });
    }
}