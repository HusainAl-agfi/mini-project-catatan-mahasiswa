<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Catatan</title>
    <style>
        body { 
            font-family: 'Segoe UI', Arial, sans-serif; 
            line-height: 1.6; 
            margin: 30px; 
            background-color: #f4f6f9; 
            color: #333; 
        }
        .container { 
            max-width: 500px; 
            margin: 50px auto; 
            background: white; 
            padding: 30px; 
            border-radius: 8px; 
            box-shadow: 0 4px 6px rgba(0,0,0,0.05); 
        }
        h1 { 
            color: #2c3e50; 
            margin-top: 0; 
            margin-bottom: 25px; 
            border-bottom: 2px solid #f1f1f1; 
            padding-bottom: 10px; 
            font-size: 1.8rem;
        }
        .form-group { 
            margin-bottom: 20px; 
        }
        .form-control { 
            width: 100%; 
            padding: 10px; 
            border: 1px solid #ccc; 
            border-radius: 4px; 
            box-sizing: border-box; 
            font-size: 1rem; 
        }
        .form-control:focus { 
            border-color: #3498db; 
            outline: none; 
        }
        textarea.form-control { 
            resize: vertical; 
            height: 100px; 
        }
        .error-box { 
            background-color: #f8d7da; 
            color: #721c24; 
            padding: 15px; 
            border-radius: 5px; 
            margin-bottom: 20px; 
            border: 1px solid #f5c6cb; 
        }
        .error-box ul { 
            margin: 0; 
            padding-left: 20px; 
        }
        .btn-container { 
            display: flex; 
            gap: 10px; 
            margin-top: 25px; 
        }
        .btn-simpan { 
            background-color: #2ecc71; 
            color: white; 
            border: none; 
            padding: 10px 20px; 
            border-radius: 4px; 
            cursor: pointer; 
            font-weight: bold; 
            font-size: 1rem; 
        }
        .btn-simpan:hover { 
            background-color: #27ae60; 
        }
        .btn-kembali { 
            background-color: #95a5a6; 
            color: white; 
            text-decoration: none; 
            padding: 10px 20px; 
            border-radius: 4px; 
            text-align: center; 
            font-size: 1rem; 
        }
        .btn-kembali:hover { 
            background-color: #7f8c8d; 
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Tambah Catatan</h1>

    @if ($errors->any())
        <div class="error-box">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/catatan" method="POST">
        @csrf
        
        <div class="form-group">
            <input type="text" name="judul" class="form-control" placeholder="Judul Catatan" value="{{ old('judul') }}">
        </div>

        <div class="form-group">
            <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', date('Y-m-d')) }}">
        </div>

        <div class="form-group">
            <select name="kategori" class="form-control">
                <option value="">-- Pilih Kategori --</option>
                <option value="Tugas" {{ old('kategori') == 'Tugas' ? 'selected' : '' }}>Tugas</option>
                <option value="Ujian" {{ old('kategori') == 'Ujian' ? 'selected' : '' }}>Ujian</option>
                <option value="Selingan" {{ old('kategori') == 'Selingan' ? 'selected' : '' }}>Selingan</option>
            </select>
        </div>

        <div class="form-group">
            <textarea name="isi" class="form-control" placeholder="Isi catatan (Minimal 10 karakter)">{{ old('isi') }}</textarea>
        </div>

        <div class="btn-container">
            <button type="submit" class="btn-simpan">Simpan</button>
            <a href="/catatan" class="btn-kembali">Batal</a>
        </div>
    </form>
</div>

</body>
</html>