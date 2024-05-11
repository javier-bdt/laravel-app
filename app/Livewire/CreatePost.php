<?php

namespace App\Livewire;


use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Create Post')]
class CreatePost extends Component
{
    public $title = "Create Post component";
    public function render()
    {
        return view('livewire.create-post')->with(
            [
                'author' => "Javier",
            ]
        );
    }
}