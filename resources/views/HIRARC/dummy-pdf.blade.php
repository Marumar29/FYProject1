<!DOCTYPE html>
<html>
<head>
    <title>HIRARC Dummy Report PDF</title>
    <style>
        @page {
            size: A4 landscape;
            margin: 10mm;
        }
        body {
            font-family: sans-serif;
            font-size: 11px;
        }
        h2, h5 {
            margin-bottom: 5px;
        }
        .section {
            margin-bottom: 15px;
        }
        table {
            width: 100%;
            max-width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            font-size: 10px;
            word-wrap: break-word;
        }
        th, td {
            border: 1px solid #000;
            padding: 2px;
            text-align: left;
            vertical-align: top;
            overflow-wrap: break-word;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>HIRARC Dummy Report</h2>

    <div class="section">
        <h5>General Information</h5>
        <p><strong>Jabatan:</strong> {{ $data['jabatan'] ?? '-' }}</p>
        <p><strong>Proses:</strong> {{ $data['proses'] ?? '-' }}</p>
        <p><strong>Lokasi:</strong> {{ $data['lokasi'] ?? '-' }}</p>
        <p><strong>Tarikh Penaksiran:</strong> {{ $data['tarikh_penaksiran'] ?? '-' }}</p>
        <p><strong>Tarikh Akhir Penaksiran:</strong> {{ $data['tarikh_akhir'] ?? '-' }}</p>
    </div>

    <div class="section">
        <h5>Ahli Pasukan Penaksir</h5>
        <ul>
            @for($i=1; $i<=4; $i++)
                @if(!empty($data["ahli_rm$i"]))
                    <li>{{ $data["ahli_rm$i"] }}</li>
                @endif
            @endfor
        </ul>
    </div>

    <div class="section">
        <h5>Diluluskan Oleh</h5>
        <p><strong>Nama:</strong> {{ $data['diluluskan_nama'] ?? '-' }}</p>
        <p><strong>Jawatan:</strong> {{ $data['diluluskan_jawatan'] ?? '-' }}</p>
        <p><strong>Tarikh:</strong> {{ $data['diluluskan_tarikh'] ?? '-' }}</p>
    </div>

    <div class="section">
        <h5>Hazard Identification Entries</h5>
        @if(!empty($data['hazards']))
        <table>
            <thead>
                <tr>
                    <th style="width: 2%;">#</th>
                    <th style="width: 8%;">Aktiviti Kerja</th>
                    <th style="width: 8%;">Hazard</th>
                    <th style="width: 8%;">Kategori Hazard</th>
                    <th style="width: 10%;">Kejadian & Kesan</th>
                    <th style="width: 10%;">Kawalan Risiko Sedia Ada</th>
                    <th style="width: 8%;">Justifikasi Kebarangkalian</th>
                    <th style="width: 3%;">L</th>
                    <th style="width: 3%;">S</th>
                    <th style="width: 4%;">RMN</th>
                    <th style="width: 8%;">Kawalan Tambahan</th>
                    <th style="width: 3%;">L</th>
                    <th style="width: 3%;">S</th>
                    <th style="width: 4%;">RMN</th>
                    <th style="width: 6%;">PIC (Tarikh)</th>
                    <th style="width: 10%;">Catatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data['hazards'] as $index => $hazard)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $hazard['aktiviti_kerja'] ?? '-' }}</td>
                    <td>{{ $hazard['hazard'] ?? '-' }}</td>
                    <td>
                        @if(!empty($hazard['kategori_hazard']) && is_array($hazard['kategori_hazard']))
                            {{ implode(', ', $hazard['kategori_hazard']) }}
                        @else
                            -
                        @endif
                    </td>
                    <td>{{ $hazard['kejadian_kesan'] ?? '-' }}</td>
                    <td>{{ $hazard['kawalan_sedia_ada'] ?? '-' }}</td>
                    <td>{{ $hazard['justifikasi_kebarangkalian'] ?? '-' }}</td>
                    <td>{{ $hazard['kebarangkalian'] ?? '-' }}</td>
                    <td>{{ $hazard['keterukan'] ?? '-' }}</td>
                    <td>{{ $hazard['rmn'] ?? '-' }}</td>
                    <td>{{ $hazard['kawalan_tambahan'] ?? '-' }}</td>
                    <td>{{ $hazard['ulang_l'] ?? '-' }}</td>
                    <td>{{ $hazard['ulang_s'] ?? '-' }}</td>
                    <td>{{ $hazard['ulang_rmn'] ?? '-' }}</td>
                    <td>{{ $hazard['pic_tarikh'] ?? '-' }}</td>
                    <td>{{ $hazard['catatan'] ?? '-' }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <p>No hazard entries available.</p>
        @endif
    </div>
</body>
</html>
