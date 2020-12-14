<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class ImageLivewire extends Component
{
    use WithFileUploads;

    public $image;

    protected $listeners = ['fileUpload' => 'handleFileUpload'];

    public function handleFileUpload($image){
        $this->image = $image;
    }

    public function render()
    {
        return view('livewire.image-livewire');
    }
}
