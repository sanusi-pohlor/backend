<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\News;

class NewsCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $news;

    public function __construct(News $news)
    {
        $this->news = $news;
    }
}
