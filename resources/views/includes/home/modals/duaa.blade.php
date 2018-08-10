<!-- Button trigger modal -->
<button type="button" id="btnModalDuaa" class="btn btn-primary position-absolute d-none" data-toggle="modal"
        data-target="#modalDuaa">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade bottom" id="modalDuaa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-full-height modal-bottom modal-fluid w-100 h-100" role="document">
        <div class="modal-content h-100">
            <div class="modal-body d-flex justify-content-center align-items-center text-dark">
                <button type="button" class="close d-none" data-dismiss="modal" id="btnCloseDuaa"
                        aria-label="Close"></button>

                <div id="modalDuaaTitle">
                    <div class="row duaa-arab fa-8x text-danger animated fadeInDown">
                        <label class="text-center mx-auto arab">الدعوة بعد الأذان</label>
                    </div>
                    <div class="row duaa-french fa-3x animated fadeInUp">
                        <label class="text-center mx-auto">Invocation après l'appel à la prière</label>
                    </div>
                </div>

                @foreach($duaa as $index => $item)
                    <div class="duaa-item w-100" data-item="{{ $index + 1 }}">
                        <div class="row duaa-arab fa-9x my-5 text-danger w-100 animated fadeInDown">
                            <div class="text-center mx-auto arab w-100 h-100">
                                {{ $item->arab ?? $item['arab'] ?? ''}}
                            </div>
                        </div>
                        <div class="row duaa-phonetic my-3 fa-2x grey-text animated fadeIn">
                            <label class="text-center mx-auto">{{ $item->phonetic ?? $item['phonetic'] ?? '' }}</label>
                        </div>
                        <div class="row duaa-french my-3 font-italic animated fadeInUp">
                            <label class="text-center mx-auto">{{ $item->french ?? $item['french'] ?? '' }}</label>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>