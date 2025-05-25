<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Admin' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon"  href="{{ asset('images/goldss.png') }}">

    <script src="https://cdn.tailwindcss.com"></script>

    <link href="https://cdn.datatables.net/1.13.4/css/dataTables.tailwindcss.min.css" rel="stylesheet" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
</head>
<body class="bg-gray-100 font-[Poppins] text-gray-800">

    @yield('content')

    @yield('scripts')

</body>
</html>
