<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TweetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        $tweet_at = new Carbon($this->created_at);
        return [
            'data' => [
                'type' => 'tweet',
                'tweet_id' => $this->id,
                'attributes' => [
                    'tweet' => $this->tweet,
                    'tweet_at' => $tweet_at->format('Y/m/d H:i'),
                    'tweet_by' => $this->user->name,
                ],
            ],
            'links' => [
                'self' => url('/tweet/'.$this->id),
            ]
        ];
    }
}
