<?php

namespace App\Livewire\Notification;

use Livewire\Component;
use Livewire\Attributes\Lazy;
use Livewire\Attributes\Title;

#[Lazy()]
#[Title('CEIT | Notifications')]
class Notification extends Component
{
    public function render()
    {
        return view('livewire.notification.notification');
    }
}
