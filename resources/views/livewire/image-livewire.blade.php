<div>
    <div class="ml-12">
        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
            <input type="file" id="image" wire:change="$emit('fileChosen')">
        </div>
        <br>
        @if($image)
        <img src="{{$image}}" alt="" width="200" height="250">
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
