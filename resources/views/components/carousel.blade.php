<link rel="stylesheet" href="{{ asset('css/carousel.css') }}">
@if (count($slides) > 0)
    <div class="carousel-container">

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                @foreach ($slides as $slide)
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <img class="d-block w-100 img-fluid" src="{{ asset('storage/' . $slide->image) }}" alt="{{ $slide->description }}">
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
@endif