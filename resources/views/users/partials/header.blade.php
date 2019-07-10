<div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="background-image: url(); background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-8"></span>
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center justify-content-center">
        <div class="row">
            <div class="col-12 {{ $class ?? '' }}">
                <h1 class="display-2 text-white text-center">{{ $title }}</h1>
                @if (isset($description) && $description)
                    <p class="text-white mt-0 mb-5 text-center">{{ $description }}</p>
                @endif
            </div>
        </div>
    </div>
</div>
