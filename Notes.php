<?php

public function scopeFilter($query, array $filters){
    $query->when($filters['search'] ?? false, function($query,$search){
        $query->where('title','like','%'. $search . '%')
            ->orWhere('body','like','%'. $search .'%');
    });
 
    $query->when($filters['category'] ?? false, function($query,$category){
        $query->whereExist(function ($query,$category){
            $query->from('categories')
                ->whereColumn('categories.id','posts.category_id')
                ->where('categories.slug',$category);

        });
    });


}
