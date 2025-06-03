@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>HIRARC Form</h2>
    <form action="{{ route('hirarc_dummy.submit') }}" method="POST">
        @csrf

        <h5 class="mt-4">General Information</h5>
        <div class="row g-3">
            <div class="col-md-6"><label class="form-label">Jabatan</label><input type="text" name="jabatan" class="form-control" required></div>
            <div class="col-md-6"><label class="form-label">Proses</label><input type="text" name="proses" class="form-control" required></div>
            <div class="col-md-6"><label class="form-label">Lokasi</label><input type="text" name="lokasi" class="form-control" required></div>
            <div class="col-md-6"><label class="form-label">Tarikh Penaksiran</label><input type="date" name="tarikh_penaksiran" class="form-control" required></div>
            <div class="col-md-6"><label class="form-label">Tarikh Akhir Penaksiran</label><input type="date" name="tarikh_akhir" class="form-control"></div>
        </div>

        <h5 class="mt-5">Ahli Pasukan Penaksir</h5>
        @for($i = 1; $i <= 4; $i++)
            <div class="mb-3">
                <label class="form-label">Ahli Pasukan RM {{ $i }}</label>
                <input type="text" name="ahli_rm{{ $i }}" class="form-control">
            </div>
        @endfor

        <h5 class="mt-5">Diluluskan Oleh</h5>
        <div class="row g-3">
            <div class="col-md-4"><label class="form-label">Nama</label><input type="text" name="diluluskan_nama" class="form-control"></div>
            <div class="col-md-4"><label class="form-label">Jawatan</label><input type="text" name="diluluskan_jawatan" class="form-control"></div>
            <div class="col-md-4"><label class="form-label">Tarikh</label><input type="date" name="diluluskan_tarikh" class="form-control"></div>
        </div>

        <h5 class="mt-5">Hazard Identification Entries</h5>
        <div id="hazard-container"></div>
        <button type="button" class="btn btn-secondary my-3" onclick="addHazardEntry()">Add Hazard Entry</button>

        <button type="submit" class="btn btn-primary">Submit HIRARC</button>
        <a href="{{ route('org.dashboard') }}" class="btn btn-success my-3">Back</a>
    </form>
</div>

<script>
let hazardIndex = 0;

function addHazardEntry() {
    const container = document.getElementById('hazard-container');
    const html = `
    <div class="border p-3 rounded bg-light mb-4">
        <h6>Hazard Entry #${hazardIndex + 1}</h6>
        <div class="mb-3"><label class="form-label">Aktiviti Kerja</label><input type="text" name="hazards[${hazardIndex}][aktiviti_kerja]" class="form-control" required></div>
        <div class="mb-3"><label class="form-label">Hazard</label><input type="text" name="hazards[${hazardIndex}][hazard]" class="form-control" required></div>

        <label class="form-label">Kategori Hazard</label>
        ${['Fizikal','Kimia','Biologi','Ergonomik','Psikososial'].map((cat, i) => `
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="hazards[${hazardIndex}][kategori_hazard][]" value="${cat}" id="hz${hazardIndex}_${i}">
                <label class="form-check-label" for="hz${hazardIndex}_${i}">${cat}</label>
            </div>
        `).join('')}

        <div class="row mt-3">
            <div class="col-md-6"><label class="form-label">Kejadian dan Kesan</label><input type="text" name="hazards[${hazardIndex}][kejadian_kesan]" class="form-control"></div>
            <div class="col-md-6"><label class="form-label">Kawalan Risiko Sedia Ada</label><input type="text" name="hazards[${hazardIndex}][kawalan_sedia_ada]" class="form-control"></div>
        </div>

        <div class="row mt-3">
            <div class="col-md-4"><label class="form-label">Justifikasi Kebarangkalian</label><input type="text" name="hazards[${hazardIndex}][justifikasi_kebarangkalian]" class="form-control"></div>
            <div class="col-md-2"><label class="form-label">Kebarangkalian (L)</label><input type="number" name="hazards[${hazardIndex}][kebarangkalian]" class="form-control" oninput="calculateRMN(this)"></div>
            <div class="col-md-2"><label class="form-label">Keterukan (S)</label><input type="number" name="hazards[${hazardIndex}][keterukan]" class="form-control" oninput="calculateRMN(this)"></div>
            <div class="col-md-2"><label class="form-label">RMN</label><input type="number" class="form-control rmn-field" name="hazards[${hazardIndex}][rmn]" readonly></div>
        </div>

        <h6 class="mt-4">Kawalan Risiko Tambahan (Optional)</h6>
        <div class="row">
            <div class="col-md-4"><label class="form-label">Kawalan Tambahan</label><input type="text" name="hazards[${hazardIndex}][kawalan_tambahan]" class="form-control"></div>
            <div class="col-md-2"><label class="form-label">Kebarangkalian (L)</label><input type="number" name="hazards[${hazardIndex}][ulang_l]" class="form-control" oninput="calculateRMN(this, true)"></div>
            <div class="col-md-2"><label class="form-label">Keterukan (S)</label><input type="number" name="hazards[${hazardIndex}][ulang_s]" class="form-control" oninput="calculateRMN(this, true)"></div>
            <div class="col-md-2"><label class="form-label">RMN</label><input type="number" class="form-control rmn-field" name="hazards[${hazardIndex}][ulang_rmn]" readonly></div>
        </div>

        <div class="row mt-3">
            <div class="col-md-6"><label class="form-label">PIC (Tarikh Tamat Tempoh)</label><input type="text" name="hazards[${hazardIndex}][pic_tarikh]" class="form-control"></div>
            <div class="col-md-6"><label class="form-label">Catatan</label><input type="text" name="hazards[${hazardIndex}][catatan]" class="form-control"></div>
        </div>
    </div>`;

    container.insertAdjacentHTML('beforeend', html);
    hazardIndex++;
}

function calculateRMN(input, isUlang = false) {
    const row = input.closest('.row');
    if (!row) return;
    const parent = row.parentElement;
    const lField = parent.querySelectorAll('input[type="number"]')[isUlang ? 4 : 1];
    const sField = parent.querySelectorAll('input[type="number"]')[isUlang ? 5 : 2];
    const rmnField = parent.querySelectorAll('input[type="number"]')[isUlang ? 6 : 3];

    const l = parseInt(lField.value) || 0;
    const s = parseInt(sField.value) || 0;
    rmnField.value = l * s;
}
</script>
@endsection
