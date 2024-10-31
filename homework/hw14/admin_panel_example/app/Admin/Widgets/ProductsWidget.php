<?php

namespace App\Admin\Widgets;

use App\Admin\Widgets;
use App\Models\Product;
use Arrilot\Widgets\AbstractWidget;

class ProductsWidget extends AbstractWidget
{

    protected $config = [];

    public function run()
    {
        // count news
        $countNews = Product::count();

        return view('voyager::dimmer', array_merge(
            $this->config,
            [
                'icon'   => 'voyager-list',
                'title'  => 'Счетчик товаров',
                'text'   => 'Количество товаров: ' . $countNews,
                'button' => [
                    'text' => 'Перейти к списку',
                    'link' => route('voyager.products.index'),
                ],
                'image' => 'storage/products_bg.jpeg',
            ]
        ));
    }

    public function shouldBeDisplayed()
    {
        return true; // or check your conditions here
    }
}
