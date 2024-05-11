<?php

namespace App\Livewire;

use Livewire\Component;

class CreatePostInline extends Component
{
    public function render()
    {
        return <<<'HTML'
        <div>
            {{-- Success is as dangerous as failure. --}}
            Create Post inline component
        </div>
        HTML;
    }
}