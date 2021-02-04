<?php

namespace WebdoCZ\LivewireFlash\Livewire;

use Livewire\Component;

class FlashMessages extends Component
{
    public $messages = [];

    protected $listeners = [
        'flashMessageAdded' => 'getMessages',
        'closeMessage' => 'closeMessage',
    ];

    public function closeMessage($uid)
    {
        unset($this->messages[$uid]);
    }

    public function getMessages()
    {
        $messages = session()->get('flashMessages');
        session()->forget('flashMessages');
        if($messages) {
            foreach($messages as $message) {
                $this->messages[$message['uid']] = $message;
            }
        }
    }

    public function mount()
    {
        $this->getMessages();
    }

    public function render()
    {
        return view(config('livewire-flash.views.messages'));
    }
}
