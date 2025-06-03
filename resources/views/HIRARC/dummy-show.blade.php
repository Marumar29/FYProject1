@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2>HIRARC Dummy Report Detail</h2>

    @if(!$data)
        <p>No report data available.</p>
    @else
        <div>
            <h5>Hazard Identification Entries</h5>
            @if(!empty($data['hazards']))
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-secondary">
                            <tr>
                                <th>#</th>
                                <th>Aktiviti Kerja</th>
                                <th>Hazard</th>
                                <th>Kategori Hazard</th>
                                <th>Kejadian & Kesan</th>
                                <th>Kawalan Risiko Sedia Ada</th>
                                <th>Justifikasi Kebarangkalian</th>
                                <th>L</th>
                                <th>S</th>
                                <th>RMN</th>
                                <th>Kawalan Tambahan</th>
                                <th>L</th>
                                <th>S</th>
                                <th>RMN</th>
                                <th>PIC (Tarikh Tamat)</th>
                                <th>Catatan</th>
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
                </div>
            @else
                <p>No hazard entries found.</p>
            @endif
        </div>

        <a href="{{ route('hirarc_dummy.list') }}" class="btn btn-secondary mt-3">Back to List</a>
    @endif
</div>
@endsection