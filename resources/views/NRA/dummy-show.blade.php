@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto bg-white p-6 shadow rounded">
    <h2 class="text-xl font-bold mb-4">Noise Risk Assessment – Preview</h2>

    <p><strong>Date:</strong> {{ $data['assessment_date'] }}</p>
    <p><strong>Report No:</strong> {{ $data['report_number'] }}</p>
    <p><strong>Assessor:</strong> {{ $data['assessor_name'] }} ({{ $data['assessor_reg_no'] }})</p>
    <p><strong>Company:</strong> {{ $data['company_name'] }} ({{ $data['company_dosh_reg_no'] }})</p>
    <p><strong>Address:</strong> {{ $data['company_address'] }}</p>
    <p><strong>Contact:</strong> {{ $data['contact_person'] }}</p>

    <h3 class="mt-6 font-semibold">Personal Exposure Monitoring</h3>
    <ul class="list-disc ml-6">
        @foreach ($data['workers'] as $worker)
            @if (!empty($worker['name']))
            <li>
                <strong>{{ $worker['name'] }}</strong> – {{ $worker['job'] }}, {{ $worker['area'] }},
                LEX: {{ $worker['lex'] }} dB, LMax: {{ $worker['lmax'] }}, LPeak: {{ $worker['lpeak'] }}
            </li>
            @endif
        @endforeach
    </ul>

    <h3 class="mt-6 font-semibold">Acknowledgement</h3>
    <p><strong>Name:</strong> {{ $data['ack_name'] }}</p>
    <p><strong>Designation:</strong> {{ $data['ack_designation'] }}</p>
    <p><strong>Date:</strong> {{ $data['ack_date'] }}</p>
    <p><strong>Signature:</strong> {{ $data['ack_signature'] }}</p>
</div>
@endsection
