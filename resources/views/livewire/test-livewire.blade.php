<div>
    <form wire:submit.prevent="store">
        <input type="text" wire:model="title">
        <input type="text" wire:model="description">
        <button type="submit">Save</button>
    </form>
     <h2>Nothing in the world is as soft and yielding as water.</h2>
    {{--@if($name)
        <h2>{{$name}}</h2>
    @endif--}}
</div>
