@extends('layouts.app')

@section('content')
    <div class="banner-container">
        @foreach ($banners as $banner)
            <div>
                <a href="{{ $banner->target_url }}" onclick="recordClick('{{ $banner->id }}')"> <!-- Make sure this is correct -->
                    <img src="{{ $banner->image_url }}" alt="{{ $banner->title }}">
                </a>
            </div>
        @endforeach
    </div>

    <script>
        function recordClick(bannerId) {
            // Log the banner ID for debugging
            console.log("Banner ID:", bannerId);
            
            fetch('/api/record-click/' + bannerId, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({})
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                console.log('Click recorded:', data);
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        }
    </script>
@endsection
