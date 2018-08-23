@if(($news = \App\Helpers::getInfoNews()) !== null)
    <div class="info-news row align-items-center flex-row border-op d-flex">
        <div class="col-2 h-100 d-flex justify-content-center align-items-center bg-white text-dark position-relative">
            <i class="fa fa-info fa-3x"></i>
            <div class="logo-news d-flex justify-content-center align-items-center">
                <img src="/img/logo-b.svg" alt="" height="100">
            </div>
        </div>
        <div class="col-10 h-100 fa-2x text-center d-flex justify-content-center align-items-center" id="info-content">
            <div id="info-content-item">
                @foreach($news as $index => $new)
                    <p data-info="{{ $index }}" data-current="{{ $index === 0 ? 'true' : 'false' }}"
                       class="{{ $index !== 0 ? 'd-none ' : '' }}animated zoomInUp">{{ $new }}</p>
                @endforeach
            </div>
        </div>
    </div>
@endif