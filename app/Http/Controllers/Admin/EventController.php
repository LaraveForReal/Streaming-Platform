<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEvent;
use App\Interfaces\EventInterface;
use App\Interfaces\UserInterface;
use App\Models\Event;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class EventController extends Controller
{
    /**
     * @var EventInterface
     */
    private $eventInterface;
    /**
     * @var UserInterface
     */
    private $userInterface;

    /**
     * EventController constructor.
     * @param EventInterface $eventInterface
     * @param UserInterface $userInterface
     */
    public function __construct(EventInterface $eventInterface, UserInterface $userInterface)
    {
        $this->eventInterface = $eventInterface;
        $this->userInterface = $userInterface;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View|Response
     */
    public function index()
    {
        $events = $this->eventInterface->all();

        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View|Response
     */
    public function create()
    {
        $users = $this->userInterface->all();
        return view('admin.events.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreEvent $request
     * @return RedirectResponse
     */
    public function store(StoreEvent $request) : RedirectResponse
    {
        $this->eventInterface->create($request->all());

        return redirect()->route('admin.events.index')->with('success', 'Event Created Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Event $event
     * @return Application|Factory|View|Response
     */
    public function edit(Event $event)
    {
        $users = $this->userInterface->all();
        return view('admin.events.edit', compact('event', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StoreEvent $request
     * @param Event $event
     * @return RedirectResponse
     */
    public function update(StoreEvent $request, Event $event)
    {
        $this->eventInterface->update($request->all(), $event->id);

        return redirect()->route('admin.events.index')->with('success', 'Event Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Event $event
     * @return RedirectResponse
     */
    public function destroy(Event $event) : RedirectResponse
    {
        $this->eventInterface->delete($event->id);

        return redirect()->route('admin.events.index')->with('success', 'Event Deleted Successfully');
    }
}
