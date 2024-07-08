<?php

namespace App\Livewire\EventsAccomplish;

use Livewire\Component;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;
#[Lazy()]
#[Title('CEIT | Events Accomplishment')]
class EventsAccomplishView extends Component
{
    public function render()
    {
        return view('livewire.events-accomplish.events-accomplish-view');
    }
}
