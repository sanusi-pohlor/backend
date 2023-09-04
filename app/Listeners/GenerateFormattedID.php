<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\NewsCreated;
use App\Models\News;

class GenerateFormattedID implements ShouldQueue
{
    public function __construct()
    {
        //
    }

    public function handle(NewsCreated $event)
    {
        $news = $event->news;
        $latestNews = News::latest('id')->first(); // Get the latest news record

        if ($latestNews) {
            // Extract the numeric part of the latest formatted_id and increment it
            $latestFormattedID = (int)substr($latestNews->formatted_id, 1);
            $newFormattedID = 'N' . str_pad($latestFormattedID + 1, 3, '0', STR_PAD_LEFT);
        } else {
            // If no records exist, start with 'N01'
            $newFormattedID = 'N001';
        }

        // Update the news record with the new formatted_id
        $news->formatted_id = $newFormattedID;
        $news->save();
    }
}
