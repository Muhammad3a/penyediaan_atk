<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Frontend ATK | BSI</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans bg-gray-50">

    <!-- Header -->
    <header class="bg-teal-700 text-white px-6 py-4 flex justify-between items-center">
        <div class="flex items-center space-x-2">
            <img src="https://upload.wikimedia.org/wikipedia/commons/2/2b/Logo_BSI_%282021%29.svg" class="h-10">
            <span class="font-bold text-lg">BANK SYARIAH INDONESIA</span>
        </div>
        <a href="/admin" class="bg-white text-teal-700 px-4 py-1 rounded text-sm font-medium hover:bg-gray-100">Login Admin</a>
    </header>

    <!-- Navigation -->
    <nav class="flex justify-center space-x-10 text-gray-700 mt-5 font-medium">
        <a href="#atk" class="text-teal-700 border-b-2 border-teal-700 pb-1">ATK</a>
        <a href="#formulir">Formulir</a>
        <a href="#gimmick">Gimmick</a>
    </nav>

    <div class="px-6 mt-4 text-gray-500">home / <span class="text-black font-medium">ATK</span></div>

    <!-- ATK Section -->
    <section id="atk" class="p-6">
        <h2 class="text-xl font-semibold mb-4">Alat Tulis Kantor</h2>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            @foreach ($atk as $item)
            <div class="bg-white border rounded-lg p-4 text-center shadow hover:shadow-md transition">
                <img src="{{ asset('storage/' . $item->gambar) }}" class="h-24 mx-auto mb-3" alt="{{ $item->nama_barang }}">
                <h3 class="font-bold">{{ strtoupper($item->nama_barang) }}</h3>
                <div class="text-sm mt-1 text-gray-600">stok 
                    <span class="bg-teal-600 text-white text-xs px-2 py-1 rounded-full ml-1">{{ $item->stok }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Formulir Section -->
    <section id="formulir" class="p-6">
        <h2 class="text-xl font-semibold mb-4">Formulir</h2>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            @foreach ($forms as $item)
            <div class="bg-white border rounded-lg p-4 text-center shadow hover:shadow-md transition">
                <img src="{{ asset('storage/' . $item->gambar) }}" class="h-24 mx-auto mb-3" alt="{{ $item->nama_barang }}">
                <h3 class="font-bold">{{ strtoupper($item->nama_barang) }}</h3>
                <div class="text-sm mt-1 text-gray-600">stok 
                    <span class="bg-teal-600 text-white text-xs px-2 py-1 rounded-full ml-1">{{ $item->stok }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    <!-- Gimmick Section -->
    <section id="gimmick" class="p-6">
        <h2 class="text-xl font-semibold mb-4">Gimmick</h2>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
            @foreach ($gimmicks as $item)
            <div class="bg-white border rounded-lg p-4 text-center shadow hover:shadow-md transition">
                <img src="{{ asset('storage/' . $item->gambar) }}" class="h-24 mx-auto mb-3" alt="{{ $item->nama_barang }}">
                <h3 class="font-bold">{{ strtoupper($item->nama_barang) }}</h3>
                <div class="text-sm mt-1 text-gray-600">stok 
                    <span class="bg-teal-600 text-white text-xs px-2 py-1 rounded-full ml-1">{{ $item->stok }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </section>

</body>
</html>
