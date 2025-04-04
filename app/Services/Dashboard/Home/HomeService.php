<?php

namespace App\Services\Dashboard\Home;

use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class HomeService
{
    public function getProductsChart(){
        $chart_options = [
            'chart_title' => __('dashboard.products_per_months'),
            'report_type' => 'group_by_string',
            'model' => 'App\Models\Product',
            'group_by_field' => 'name',
            'group_by_period' => 'month',
            'chart_type' => 'bar',
        ];
        return new LaravelChart($chart_options);
    }

    public function getCategoriesChart(){
        $chart_options = [
            'chart_title' => __('dashboard.categories_per_months'),
            'report_type' => 'group_by_string',
            'model' => 'App\Models\Category',
            'group_by_field' => 'name',
            'group_by_period' => 'month',
            'chart_type' => 'line',
        ];
        return new LaravelChart($chart_options);
    }

    public function getAdminsChart(){
        $chart_options = [
            'chart_title' => __('dashboard.users_per_months'),
            'report_type' => 'group_by_date',
            'model' => 'App\Models\User',
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'chart_type' => 'pie',
        ];
        return new LaravelChart($chart_options);
    }

    public function getContactsChart(){
        $chart_options = [
            'chart_title' => __('dashboard.contacts_per_months'),
            'report_type' => 'group_by_date',
            'model' => 'App\Models\User',
            'group_by_field' => 'created_at',
            'group_by_period' => 'day',
            'chart_type' => 'bar',
        ];
        return new LaravelChart($chart_options);
    }
}
