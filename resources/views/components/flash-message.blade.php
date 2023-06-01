@if (session()->has('message'))
    <div class="flash-message">
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