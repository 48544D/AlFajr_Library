@if (session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="flash-message">
        <p class="m-0">
            {{session('message')}}
        </p>
    </div>
@endif