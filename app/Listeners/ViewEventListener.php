<?php

namespace App\Listeners;

use App\Events\ViewEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use DB;

class ViewEventListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ViewEvent  $event
     * @return void
     */
    public function handle(ViewEvent $event)
    {
        //拿到文章id
        $articleId = $event->articleId;

        //当前文章views字段加1
        DB::table('article')->where('id', $articleId)->increment('views', 1);
        DB::table('category')->join('article','article.categoryId','=','category.id')->where('article.id', $articleId)->increment('category.views', 1);

    }
}
