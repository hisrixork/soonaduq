<!-- Button trigger modal -->
<button type="button" id="btnModalAyah" class="btn btn-primary position-absolute d-none" data-toggle="modal"
        data-target="#modalAyah">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade top" id="modalAyah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true" data-backdrop="false">
    <div class="modal-dialog modal-full-height modal-top modal-fluid w-100 h-100" role="document">
        <div class="modal-content h-100">
            <div class="modal-body d-flex justify-content-center align-items-center">
                <button type="button" class="close d-non btn" data-dismiss="modal" id="btnCloseAyah"
                        aria-label="Close"></button>
                <div id="modalAyahMain">
                    <div class="row ayah-arab my-5 fa-4x d-flex justify-content-center align-items-center w-100">
                        <label class="text-center mx-auto arab">
                        </label>
                    </div>
                </div>
                <div id="modalAyahData" class="row w-100">
                    <div id="modalAyahDataFrench" class="col-md-6">
                        Sourate&nbsp;<span id="sourateF"></span>
                    </div>
                    <div id="modalAyahDataArab" class="col-md-6 text-right arab">
                        سورة&nbsp;<span id="sourateA"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>