<div>

    <h2>Laravel Livewire Counter Web Application</h2>

    @if ( session()->has('info') ) 
        <p><strong>Info : </strong> {{ session('info') }}</p>
    @endif

    <button type="button" wire:click="increament" >Increament</button>
    <input type="number" wire:model="initial" value="" readonly >
    <button type="button" wire:click="decreament" >Decrement</button>

    <hr>

    <form wire:submit.prevent="counterForm">
        <label for="">Enter Counter Starting Number</label><br>
        <input type="text" wire:model.lazy="starting_counter_number" value=""><br>
        @error('starting_counter_number')
            <span style="color:red">{{ $message }}</span> 
        @enderror
        <br>
        <input type="submit" value="Submit">
    </form>
</div>
