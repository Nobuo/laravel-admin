<?php

namespace APP\Trait;

trait RobotFilterTrait
{
    public function doFilter($grid){
        $grid->filter(function($filter){
            $filter->like('name', '名前');

        });
        $grid->filter(function($filter){
            $filter->between('created_at', '登録日')->datetime();

        });
    }
}