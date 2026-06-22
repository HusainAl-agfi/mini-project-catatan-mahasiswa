<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Catatan Mahasiswa</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            line-height: 1.6;
            margin: 30px;
            background-color: #f4f7f6;
            color: #2c3e50;
        }

        .container {
            max-width: 1000px;
            margin: auto;
        }

        h1 {
            color: #1a4a3a;
            border-bottom: 2px solid #2ecc71;
            padding-bottom: 10px;
        }

        .btn-tambah {
            display: inline-block;
            background-color: #2ecc71;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
            margin-bottom: 20px;
            transition: background 0.3s;
        }

        .btn:hover {
        background-color: #27ae60; 
        transform: translateY(-1px); 
        }

        .alert-sukses {
            background-color: #d4edda; /* Background hijau muda soft */
            color: #155724; /* Teks hijau tua */
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
            border: 1px solid #c3e6cb;
        }

        .card-catatan {
           background-color: white;
            padding: 24px;
            border-radius: 12px; /* Lebih rounded agar terlihat modern */
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05); /* Shadow lebih halus/soft */
            border-left: 5px solid #2ecc71; /* Aksen bar hijau di sebelah kiri card */
            position: relative;
            transition: box-shadow 0.3s;
        }
        .card-catatan:hover {
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.1); /* Shadow lebih besar saat hover */
        }
        .card-catatan h3 {
            margin-top: 0;
            color: #61acde;
            font-size: 1.4rem;
        }

        .meta-data {
            font-size: 0.85rem;
            color: #7f8c8d;
            margin-bottom: 12px;
        }

        .badge-kategori {
            background-color: #e8f8f5;
            color: #16a085;
            padding: 3px 8px;
            border-radius: 4px;
            font-weight: bold;
            text-transform: uppercase;
        }

        .isi-catatan {
            font-size: 1rem;
            color: #34495e;
            white-space: pre-line;
        }

        .aksi-buttons {
            margin-top: 20px;
            display: flex;
            gap: 10px;
            border-top: 1px solid #ecf0f1;
            padding-top: 15px;
        }

        .btn-edit {
            background-color: #3498db; /* Biru soft untuk edit */
            color: white;
            padding: 8px 16px;
            text-decoration: none;
            border-radius: 6px;
            font-size: 0.9rem;
            transition: background 0.2s;
        }

        .btn-edit:hover {
            background-color: #21d11e;
        }

        .btn-hapus {
            background-color: #e74c3c;
            color: white;
            border: 1px solid #e74c3c;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-hapus:hover {
            background-color: #c2b9b8;
        }

        .text-kosong {
            text-align: center;
            color: #95a5a6;
            font-style: italic;
            margin-top: 50px;
            font-size: 1.1rem;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Daftar Catatan Mahasiswa</h1>
        <a href="/catatan/create" class="btn-tambah">Tambah Catatan</a>
        <hr>

        @if(session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif

        @foreach($catatan as $c)
            <div class="card-catatan">
                <h3>{{ $c->judul }}</h3>
                <p class="meta-data"><strong>Kategori:</strong> <span class="badge-kategori">{{ $c->kategori }}</span> | <strong>Tanggal:</strong> {{ $c->tanggal }}</p>
                <p class="isi-catatan">{{ $c->isi }}</p>
                
                <div class="aksi-buttons">
                    <a href="/catatan/{{ $c->id }}/edit" class="btn-edit">Edit Catatan</a>
                    
                    <form action="/catatan/{{ $c->id }}" method="POST" style="margin: 0;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-hapus" onclick="return confirm('Yakin ingin menghapus catatan ini?')">Hapus</button>
                    </form>
                </div>
            </div>
            <hr>
        @endforeach
    </div>

</body>
</html>