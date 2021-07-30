<?php


namespace App\Repositories;


use App\Http\Requests\StoreEvent;
use App\Interfaces\EventInterface;
use App\Models\Event;
use Illuminate\Database\Eloquent\Model;

class EventRepository extends BaseRepository implements EventInterface
{

    public function __construct(Event $event)
    {
        parent::__construct($event);
    }

    public function create(array $attributes) : Model
    {
        $event = Event::create(
            [
                'name' => $attributes['name'],
                'stream_url' => $attributes['stream_url'],
                'start_datetime' => $attributes['start_datetime'],
                'end_datetime' => $attributes['end_datetime'],
            ]
        );

        $event->users()->sync([$attributes['user_id'] => [ 'is_moderator' => 1 ]]);

        return $event;
    }

    public function addUsersToEvent(Event $event, array $ids)
    {
        return $event->users()->sync($ids);
    }
}
