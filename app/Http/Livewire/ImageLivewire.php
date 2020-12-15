<?php

namespace App\Http\Livewire;

use App\Models\ImageStore;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic;
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
        $img = ImageStore::all();
        return view('livewire.image-livewire',compact('img'));
    }

    public function imageStore(){
        if (!$this->image){
            return null;
        }
        $img = ImageManagerStatic::make($this->image)->encode('jpg');
        $name = Str::random() . '.jpg';
        ImageStore::create([
           'image' =>$name
        ]);
        Storage::disk('public')->put($name,$img);
        $this->image = '';
        return $name;
    }
}
