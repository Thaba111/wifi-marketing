@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Analytics for "{{ $banner->title }}"</h1>
    
    <!-- Display total impressions and clicks -->
    <h3>Total Impressions: {{ $banner->impressions->sum('impressions') }}</h3>
    <h3>Total Clicks: {{ $banner->impressions->sum('clicks') }}</h3>

    <h4>Details:</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>User ID</th>
                <th>Impressions</th>
                <th>Clicks</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($banner->impressions as $impression)
            <tr>
                <td>{{ $impression->user_id ?? 'Guest' }}</td>
                <td>{{ $impression->impressions }}</td>
                <td>{{ $impression->clicks }}</td>
                <td>{{ $impression->created_at->format('Y-m-d H:i:s') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <canvas id="bannerImpressionsChart"></canvas>

</div>
@endsection
