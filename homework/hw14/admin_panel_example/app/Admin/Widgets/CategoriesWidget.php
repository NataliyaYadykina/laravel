<?php

namespace App\Admin\Widgets;

use App\Admin\Widgets;
use App\Models\Category;
use Arrilot\Widgets\AbstractWidget;

class CategoriesWidget extends AbstractWidget
{

    protected $config = [];

    public function run()
    {
        // count Categories
        $countCategories = Category::count();

        return view('voyager::dimmer', array_merge(
            $this->config,
            [
                'icon'   => 'voyager-categories',
                'title'  => 'Счетчик категорий',
                'text'   => 'Количество категорий: ' . $countCategories,
                'button' => [
                    'text' => 'Перейти к списку',
                    'link' => route('voyager.categories.index'),
                ],
                'image' => 'storage/categories_bg.jpg',
            ]
        ));
    }

    public function shouldBeDisplayed()
    {
        return true; // or check your conditions here
    }
}
