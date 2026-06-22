<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Catatan</title>
    <style>
    body {
        font-family: 'Segoe UI', Arial, sans-serif;
        line-height: 1.6;
        margin: 30px;
        background-color: #f4f6f9;
        color: #333;
    }

    .container {
        max-width: 600px;
        margin: auto;
        background: white;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
    }

    h1 {
        color: #2c3e50;
        margin-top: 0;
        margin-bottom: 20px;
        border-bottom: 2px solid #f1f1f1;
        padding-bottom: 10px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-group label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
        color: #34495e;
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
        height: 120px;
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
        margin-top: 20px;
    }

    .btn-update {
        background-color: #3498db;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        font-weight: bold;
        font-size: 1rem;
    }

    .btn-update:hover {
        background-color: #2980b9;
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
    <h1>Edit Catatan</h1>

    @if ($errors->any())
        <div class="error-box">
            <strong>Gagal memperbarui! Periksa kembali inputan Anda:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/catatan/{{ $catatan->id }}" method="POST">
        @csrf
        @method('PUT') <div class="form-group">
            <label for="judul">Judul Catatan</label>
            <input type="text" id="judul" name="judul" class="form-control" value="{{ old('judul', $catatan->judul) }}">
        </div>

        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" id="tanggal" name="tanggal" class="form-control" value="{{ old('tanggal', $catatan->tanggal) }}">
        </div>

        <div class="form-group">
            <label for="kategori">Kategori</label>
            <select id="kategori" name="kategori" class="form-control">
                <option value="Tugas" {{ old('kategori', $catatan->kategori) == 'Tugas' ? 'selected' : '' }}>Tugas</option>
                <option value="Ujian" {{ old('kategori', $catatan->kategori) == 'Ujian' ? 'selected' : '' }}>Ujian</option>
                <option value="Selingan" {{ old('kategori', $catatan->kategori) == 'Selingan' ? 'selected' : '' }}>Selingan</option>
            </select>
        </div>

        <div class="form-group">
            <label for="isi">Isi Catatan</label>
            <textarea id="isi" name="isi" class="form-control">{{ old('isi', $catatan->isi) }}</textarea>
        </div>

        <div class="btn-container">
            <button type="submit" class="btn-update">Update Catatan</button>
            <a href="/catatan" class="btn-kembali">Batal</a>
        </div>
    </form>
</div>

</body>
</html>