<div>
    <div class="ml-12">
        <div class="mt-2 text-gray-600 dark:text-gray-400 text-sm">
            <input type="file" id="image" wire:change="$emit('fileChosen')">
        </div>
    </div>
</div>
<script>
    Livewire.on('fileChosen', postId => {
        alert('got it');
    })
</script>
