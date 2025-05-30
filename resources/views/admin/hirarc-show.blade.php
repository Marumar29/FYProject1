@extends('layouts.admin')

@section('content')
<h2 class="text-xl font-bold mb-4">HIRARC Report: {{ $entries->first()->report_id }}</h2>

<p><strong>Prepared By:</strong> {{ $entries->first()->prepared_by_name }} ({{ $entries->first()->prepared_by_position }}) on {{ $entries->first()->prepared_date }}</p>
<p><strong>Reviewed By:</strong> {{ $entries->first()->reviewed_by_name }} ({{ $entries->first()->reviewed_by_position }}) on {{ $entries->first()->reviewed_date }}</p>
<p><strong>Approved By:</strong> {{ $entries->first()->approved_by_name }} ({{ $entries->first()->approved_by_position }}) on {{ $entries->first()->approved_date }}</p>

<hr class="my-4">

@foreach($entries as $entry)
    <div class="mb-6 border p-4 rounded">
        <h3 class="font-semibold">Task: {{ $entry->task }}</h3>
        <p><strong>Hazard:</strong> {{ $entry->hazard }}</p>
        <p><strong>Effect:</strong> {{ $entry->effect_of_hazard }}</p>
        <p><strong>Likelihood:</strong> {{ $entry->likelihood }}</p>
        <p><strong>Severity:</strong> {{ $entry->severity }}</p>
        <p><strong>RPN:</strong> {{ $entry->risk }}</p>
        <p><strong>Control Measures:</strong> {{ $entry->control }}</p>
        <p><strong>Remarks:</strong> {{ $entry->remarks }}</p>
        <p><strong>Significant:</strong> {{ $entry->significant }}</p>

        <p class="mt-2 text-sm text-gray-600">
            <strong>Department:</strong> {{ $entry->department }} |
            <strong>Section:</strong> {{ $entry->section }} |
            <strong>Responsible Person:</strong> {{ $entry->responsible_person }} |
            <strong>Activity:</strong> {{ $entry->activity }} |
            <strong>Date:</strong> {{ $entry->report_date }}
        </p>
    </div>
@endforeach

<a href="#" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">Print to PDF</a>
@endsection
