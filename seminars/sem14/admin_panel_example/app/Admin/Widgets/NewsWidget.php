<?php

namespace App\Admin\Widgets;

use App\Admin\Widgets;
use App\Models\News;
use Arrilot\Widgets\AbstractWidget;

class NewsWidget extends AbstractWidget
{

    protected $config = [];

    public function run()
    {
        // count news
        $countNews = News::count();

        return view('voyager::dimmer', array_merge(
            $this->config,
            [
                'icon'   => 'voyager-news',
                'title'  => 'Счетчик новостей',
                'text'   => 'Количество новостей: ' . $countNews,
                'button' => [
                    'text' => 'Перейти к списку',
                    'link' => '',
                ],
                'image' => 'storage/news_bg.jpg',
            ]
        ));
    }

    public function shouldBeDisplayed()
    {
        return true; // or check your conditions here
    }
}
