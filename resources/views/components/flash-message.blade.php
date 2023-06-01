@if (session()->has('LivewireMessage'))
    <div class="flash-message">
        <p class="m-0">
            {{session('LivewireMessage')}}
        </p>
    </div>
@endif

@if (session()->has('message'))
    <div x-data="{show: true}" x-init="setTimeout(() => show = false, 3000)" x-show="show" class="normal-flash-message">
        <p class="m-0">
            {{session('message')}}
        </p>
    </div>
@endif

<script>
    $(document).ready(function(){
        window.livewire.on('alert_remove',()=>{
            setTimeout(function(){ $(".flash-message").fadeOut('fast');
            }, 1500);
        });
    });
</script>