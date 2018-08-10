<!-- Button trigger modal -->
<button type="button" id="btnModalAdhan" class="btn btn-primary position-absolute d-none" data-toggle="modal"
        data-target="#modalAdhan">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade right" id="modalAdhan" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-full-height modal-right modal-fluid w-100" role="document">
        <div class="modal-content modal-bg">
            <div class="modal-overlay"></div>
            <div class="modal-body d-flex justify-content-center align-items-center text-white">
                <button type="button" class="close d-none" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div id="modalAdhanTitle">
                    <div class="row adhan-arab fa-7x">
                        <label class="text-center mx-auto arab">الأذان</label>
                    </div>
                    <div class="row adhan-phonetic fa-7x">
                        <label class="text-center mx-auto">Appel à la prière</label>
                    </div>
                </div>

                @foreach($adhan as $index => $item)
                    <div class="adhan-item" data-item="{{ $index + 1 }}" data-nb="{{ $item->nb ?? $item['nb'] ?? 2 }}">
                        <div class="row adhan-arab fa-8x animated zoomInDown">
                            <label class="text-center mx-auto arab">{{ $item->arab ?? $item['arab'] ?? ''}}</label>
                        </div>
                        <div class="row adhan-phonetic fa-3x animated fadeInUp">
                            <label class="text-center mx-auto">{{ $item->phonetic ?? $item['phonetic'] ?? '' }}</label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>