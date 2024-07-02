<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $child->full_name }}'s Card</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        body {
            background-color: #f7fafc;
        }

        .card-container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }

        .card {
            width: 100%;
            max-width: 22rem;
            background-color: #000;
            color: #fff;
            border-radius: 0.5rem;
            overflow: hidden;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
        }

        .card-header {
            padding: 1.5rem;
            background-color: #4c51bf;
            text-align: center;
        }

        .card-header img {
            width: 10rem;
            height: 10rem;
            object-fit: cover;
            border: 0.25rem solid #fff;
            border-radius: 50%;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 1.5rem;
            text-align: center;
        }

        .card-body h2 {
            font-size: 1.5rem;
            font-weight: bold;
            color: #4c51bf;
        }

        .card-body p {
            margin-top: 0.5rem;
            font-size: 0.875rem;
            color: #718096;
        }

        @media print {
            body {
                -webkit-print-color-adjust: exact;
            }
        }
    </style>
</head>

<body>
    <div class="card-container">
        <div class="card">
            {{-- <div class="card-header">
                @if ($child->image_url)
                    <img src="{{ asset('storage/' . $child->image_url) }}" alt="{{ $child->full_name }}">
                @else
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSvVzu0fxErlbjy3Hondhcruo5whW10rTjkD_PxSRlw5NSEHDg9Hyn4ohOc42nX_S1dz2E&usqp=CAU"
                        alt="{{ $child->full_name }}">
                @endif
            </div> --}}
            <div class="card-body">
                <h2>{{ $child->full_name }}</h2>
                <p>Date of Birth: {{ date('j-M-Y', strtotime($child->birth_date)) }}</p>
                <p>CIN: {{ $child->child_cin }}</p>
            </div>
        </div>
    </div>
</body>

</html>
