<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class TestLivewire extends Component
{
    public $title;
    public $description;

    public function render()
    {
        return view('livewire.test-livewire');
    }

    public function emptyInput(){
        $this->title = "";
        $this->description = "";
    }

    public function store(){
        Post::create([
           'title' => $this->title,
           'description' => $this->description,
        ]);
        return 'done';
    }
}
