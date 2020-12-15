<div>
    <div class="ml-12">
        <form wire:submit.prevent="imageStore">
            <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
                <input type="file" id="image" wire:change="$emit('fileChosen')">
            </div>
            @error('image') <span class="error">{{ $message }}</span> @enderror
            <br>
            <button type="submit">Save Photo</button>
        </form>
        <br>
        @if($image)
            <img src="{{$image}}" alt="" width="200" height="250">
        @endif
    </div>
    <br>
    <div class="ml-12">
        @if($img)
            @foreach($img as $val)
{{--            <img src="{{asset('storage/'.$val->image)}}" alt="" width="200" height="250">--}}
            <img src="{{$val->imagePath}}" alt="" width="200" height="250">
            @endforeach
        @endif
    </div>
</div>


<script>
    Livewire.on('fileChosen', postId => {
        // alert('got it');
        let inputField = document.getElementById('image');
        let file = inputField.files[0];
        let reader = new FileReader();
        reader.onload = () => {
            window.livewire.emit('fileUpload',reader.result);
            // console.log(reader.result);
        }
        reader.readAsDataURL(file);
    })
</script>
