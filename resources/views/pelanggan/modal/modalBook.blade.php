{{-- ================================================================================== --}}
{{-- GAK KANGGO BOLOOOOOOOOOOO --}}
{{-- ================================================================================== --}}

    <!-- Modal -->
    {{-- <div class="modal fade" id="modalBook" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <!-- <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1> -->
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Booking Start -->
                    <div class="container-xxl py-5">
                        <div class="container">
                            <div class="text-center wow fadeInUp mb-5" data-wow-delay="0.1s">
                                <h6 class="section-title text-center text-dark text-uppercase">Reservasi Ruangan</h6>
                                <h1 class="fw-bolder text-success text-uppercase">Convention Hall
                                </h1>
                                <span class="badge bg-light text-dark text-wrap lh-base">
                                    Note : Harga sewa terhitung per 8 jam dalam sehari, apabila check-out melebihi jam sewa akan dikenakan charge per jam.
                                </span>
                            </div>
                            <div class="row g-5">
                                <div class="col-lg-12">
                                    <div class="wow fadeInUp" data-wow-delay="0.2s">
                                        <form>
                                            <div class="row g-3 mb-4">
                                                <div class="col-md-6">
                                                    <fieldset disabled="disabled">
                                                        <div class="form-floating date" id="date3"
                                                        data-target-input="nearest">
                                                        <input type="date" name="checkin" id="checkin" class="form-control datetimepicker-input" placeholder="Check In" data-target="#date3" data-toggle="datetimepicker" />
                                                        <label class="labelBook" for="checkin">Check In</label>
                                                    </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-6">
                                                    <fieldset disabled="disabled">
                                                        <div class="form-floating input-group">
                                                            <input type="number" name="lamahari" id="lamahari" class="form-control"
                                                                placeholder="Kapasitas">
                                                            <div class="input-group-text">HARI</div>
                                                            <label class="labelBook" for="jumlahSewa">Lama hari</label>
                                                        </div>
                                                    </fieldset>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <select class="form-select" id="select1">
                                                            <option value="0" disabled selected>Pilih Layout</option>
                                                            @foreach ($trains->layout_models as $layouts_model)
                                                                <option value="{{ $layouts_model->train_id }}"
                                                                    data-value="{{ $layouts_model->kapasitas }}">{{ $layouts_model->nama_layout }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <label class="labelBook" for="select1">Layout Model</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <fieldset disabled="disabled">
                                                        <div class="form-floating input-group">
                                                            <input type="number" class="form-control" id="capacityPax"
                                                                placeholder="Kapasitas" value="200">
                                                            <div class="input-group-text">PAX</div>
                                                            <label class="labelBook" for="capacityPax">Kapasitas</label>
                                                        </div>
                                                    </fieldset>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-floating">
                                                        <input class="form-control" placeholder="Nama Kegiatan" id="nameActivity"></input>
                                                        <label class="labelBook" for="nameActivity">Nama Kegiatan</label>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Special Request" id="message" style="height: 100px"></textarea>
                                                        <label class="labelBook" for="message">Special Request</label>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row g-3">
                                                <div class="col-12 text-end">
                                                    <h6>Total</h6>
                                                    <h3 id="trainHarga" class="fw-bolder text-success">{{ $train }}</h3>
                                                </div>
                                                <div class="col-6">
                                                    <button class="btn btn-success w-100 py-3" type="submit">Reservasi
                                                        Sekarang</button>
                                                </div>
                                                <div class="col-6">
                                                    <button class="btn btn-outline-success w-100 py-3"
                                                        type="submit">Tambah Keranjang</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Booking End -->
                </div>
            </div>
        </div>
    </div>

    <script>
        window.addEventListener('DOMContentLoaded', function() {
        var lamaHari = document.getElementsByName("lama")[0].value;
        document.getElementsByName("lamahari")[0].value = lamaHari;
        });
    </script> --}}
    