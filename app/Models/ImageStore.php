<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use League\CommonMark\Inline\Element\Strong;

class ImageStore extends Model
{
    use HasFactory;

    protected $fillable = ['image','status'];

    public function getImagePathAttribute(){
        return Storage::disk('public')->url($this->image);
    }
}
