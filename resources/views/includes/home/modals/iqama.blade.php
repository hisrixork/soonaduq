<!-- Button trigger modal -->
<button type="button" id="btnModalIqama" class="btn btn-primary position-absolute d-none" data-toggle="modal"
        data-target="#modalIqama">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade right" id="modalIqama" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-full-height modal-right modal-fluid w-100" role="document">
        <div class="modal-content">
            <div class="modal-body d-flex justify-content-center align-items-center">
                <button type="button" class="close d-none" data-dismiss="modal" id="btnCloseIqama"
                        aria-label="Close"></button>
                <div id="modalIqamaMain" class="fa-8x">
                    <div class="row iqam-arab">
                        <label class="text-center mx-auto arab">إقامة</label>
                    </div>
                    <div class="row iqam-french my-5 fa-x d-flex justify-content-center align-items-center">
                        <label class="text-center mx-auto">Iqama</label>
                    </div>
                </div>
                <div id="modalIqamaData">
                    @foreach($iqama as $index => $item)
                        @if ($index === 6)
                            <div class="iqama-item">
                                <div class="row w-100">
                                    <div class="col-6 iqama-french fa-2x text-left ">
                                        <label>(x2) Qad qāma tiṣ-ṣalāt</label>
                                    </div>
                                    <div class="col-6 iqama-arab fa-2x text-right ">
                                        <label class="arab">قد قامت الصلاة</label>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($index !== 1)
                            <div class="iqama-item">
                                <div class="row w-100">
                                    <div class="col-6 iqama-french fa-2x text-left ">
                                        <label>(x{{$index === 0 || $index === 6 ? 2 : 1}}) {{ $item->phonetic ?? $item['phonetic'] ?? '' }}</label>
                                    </div>
                                    <div class="col-6 iqama-arab fa-2x text-right ">
                                        <label class="arab">{{ $item->arab ?? $item['arab'] ?? ''}}</label>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>