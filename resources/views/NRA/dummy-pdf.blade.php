<!DOCTYPE html>
<html>
<head>
    <title>NRA Report PDF</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        h2, h3 { margin-top: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #000; padding: 6px; text-align: left; }
    </style>
</head>
<body>
    <h2>Initial Noise Risk Assessment Report</h2>

    <p><strong>Assessment Date:</strong> {{ $data['assessment_date'] }}</p>
    <p><strong>Report No:</strong> {{ $data['report_number'] }}</p>
    <p><strong>Assessor:</strong> {{ $data['assessor_name'] }} ({{ $data['assessor_reg_no'] }})</p>
    <p><strong>Company:</strong> {{ $data['company_name'] }} ({{ $data['company_dosh_reg_no'] }})</p>
    <p><strong>Address:</strong> {{ $data['company_address'] }}</p>
    <p><strong>Contact Person:</strong> {{ $data['contact_person'] }}</p>

    <h3>Personal Exposure Monitoring</h3>
    <table>
        <thead>
            <tr>
                <th>Name</th><th>Job</th><th>Area</th><th>Dosimeter</th><th>LEX</th><th>LMax</th><th>LPeak</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['workers'] as $worker)
                @if (!empty($worker['name']))
                <tr>
                    <td>{{ $worker['name'] }}</td>
                    <td>{{ $worker['job'] }}</td>
                    <td>{{ $worker['area'] }}</td>
                    <td>{{ $worker['dosimeter'] }}</td>
                    <td>{{ $worker['lex'] }}</td>
                    <td>{{ $worker['lmax'] }}</td>
                    <td>{{ $worker['lpeak'] }}</td>
                </tr>
                @endif
            @endforeach
        </tbody>
    </table>

    <h3>Acknowledgement</h3>
    <p><strong>Name:</strong> {{ $data['ack_name'] }}</p>
    <p><strong>Designation:</strong> {{ $data['ack_designation'] }}</p>
    <p><strong>Date:</strong> {{ $data['ack_date'] }}</p>
    <p><strong>Signature:</strong> {{ $data['ack_signature'] }}</p>
</body>
</html>
