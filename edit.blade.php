<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Catatan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; }

        :root {
            --primary:        #4f46e5;
            --primary-hover:  #4338ca;
            --primary-soft:   #eef2ff;
            --bg:             #f1f5f9;
            --surface:        #ffffff;
            --surface-2:      #f8fafc;
            --text-primary:   #0f172a;
            --text-secondary: #475569;
            --text-muted:     #94a3b8;
            --border:         #e2e8f0;
            --border-strong:  #cbd5e1;
            --border-focus:   #4f46e5;
            --danger:         #dc2626;
            --shadow-md:      0 4px 20px rgba(15,23,42,.08), 0 1px 4px rgba(15,23,42,.04);
            --radius-sm:      6px;
            --radius-md:      10px;
            --radius-lg:      16px;
            --ring-primary:   0 0 0 3px rgba(79,70,229,.22);
            --ring-danger:    0 0 0 3px rgba(220,38,38,.2);
            --transition:     all 0.2s cubic-bezier(0.4,0,0.2,1);
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            line-height: 1.65;
            margin: 0;
            min-height: 100vh;
            padding: 48px 20px 64px;
            background-color: var(--bg);
            background-image: radial-gradient(circle at 30% 20%, rgba(79,70,229,.06) 0%, transparent 55%);
            color: var(--text-primary);
            -webkit-font-smoothing: antialiased;
        }

        /* ── Page wrapper ────────────────────────────── */
        .page-wrapper {
            max-width: 560px;
            margin: 0 auto;
        }

        /* ── Back link ───────────────────────────────── */
        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            color: var(--text-muted);
            text-decoration: none;
            font-size: 0.85rem;
            font-weight: 500;
            margin-bottom: 24px;
            transition: var(--transition);
        }

        .back-link:hover { color: var(--primary); }
        .back-link::before { content: '←'; font-size: 1rem; }

        /* ── Card container ──────────────────────────── */
        .container {
            background: var(--surface);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
            border: 1px solid var(--border);
            overflow: hidden;
        }

        /* ── Card header ─────────────────────────────── */
        .form-header {
            padding: 28px 32px 24px;
            border-bottom: 1px solid var(--border);
            background: linear-gradient(135deg, var(--surface) 0%, var(--surface-2) 100%);
        }

        .form-header-eyebrow {
            font-size: 0.72rem;
            font-weight: 600;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--primary);
            margin-bottom: 4px;
        }

        h1 {
            color: var(--text-primary);
            margin: 0;
            font-size: 1.45rem;
            font-weight: 700;
            letter-spacing: -0.025em;
            line-height: 1.2;
        }

        /* ── Form body ───────────────────────────────── */
        .form-body { padding: 28px 32px 32px; }

        .form-group { margin-bottom: 22px; }

        label {
            display: flex;
            align-items: center;
            gap: 4px;
            font-size: 0.85rem;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 8px;
            letter-spacing: -0.01em;
        }

        .required-dot {
            display: inline-block;
            width: 5px; height: 5px;
            background: var(--danger);
            border-radius: 50%;
            margin-left: 2px;
            flex-shrink: 0;
        }

        .form-control {
            width: 100%;
            padding: 11px 14px;
            border: 1.5px solid var(--border-strong);
            border-radius: var(--radius-md);
            font-family: inherit;
            font-size: 0.95rem;
            color: var(--text-primary);
            background: var(--surface-2);
            transition: var(--transition);
            appearance: none;
        }

        .form-control:hover { border-color: #94a3b8; background: var(--surface); }

        .form-control:focus {
            border-color: var(--border-focus);
            background: var(--surface);
            outline: none;
            box-shadow: var(--ring-primary);
        }

        select.form-control {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%2394a3b8' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 14px center;
            padding-right: 38px;
            cursor: pointer;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 130px;
            line-height: 1.6;
        }

        /* ── Error box ───────────────────────────────── */
        .error-box {
            display: flex;
            gap: 12px;
            background: #fef2f2;
            color: #b91c1c;
            padding: 14px 16px;
            border-radius: var(--radius-md);
            margin-bottom: 24px;
            border: 1px solid #fecaca;
            font-size: 0.87rem;
        }

        .error-icon {
            flex-shrink: 0;
            width: 20px; height: 20px;
            background: #dc2626;
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            font-weight: 700;
            margin-top: 1px;
        }

        .error-box strong { display: block; margin-bottom: 6px; font-weight: 600; }

        .error-box ul { margin: 0; padding-left: 16px; }
        .error-box li { margin-bottom: 2px; }

        /* ── Divider ─────────────────────────────────── */
        .form-divider {
            height: 1px;
            background: var(--border);
            margin: 28px 0;
        }

        /* ── Action buttons ──────────────────────────── */
        .btn-container {
            display: flex;
            gap: 10px;
        }

        .btn {
            display: inline-flex;
            justify-content: center;
            align-items: center;
            gap: 6px;
            padding: 11px 22px;
            border-radius: var(--radius-md);
            font-family: inherit;
            font-weight: 600;
            font-size: 0.92rem;
            cursor: pointer;
            transition: var(--transition);
            text-decoration: none;
            border: 1.5px solid transparent;
            line-height: 1;
        }

        .btn:active { transform: scale(0.98); }
        .btn:focus-visible { outline: none; box-shadow: var(--ring-primary); }

        .btn-update {
            background: var(--primary);
            color: #fff;
            border-color: var(--primary);
            flex: 1;
            box-shadow: 0 1px 2px rgba(79,70,229,.2), 0 4px 12px rgba(79,70,229,.12);
        }

        .btn-update:hover {
            background: var(--primary-hover);
            border-color: var(--primary-hover);
            transform: translateY(-1px);
            box-shadow: 0 2px 4px rgba(79,70,229,.2), 0 8px 20px rgba(79,70,229,.16);
        }

        .btn-kembali {
            background: var(--surface-2);
            color: var(--text-secondary);
            border-color: var(--border-strong);
        }

        .btn-kembali:hover {
            background: var(--border);
            color: var(--text-primary);
            border-color: #94a3b8;
        }

        /* ── Responsive ──────────────────────────────── */
        @media (max-width: 600px) {
            body { padding: 28px 16px 48px; }
            .form-header { padding: 22px 22px 18px; }
            .form-body { padding: 22px 22px 24px; }
            .btn-container { flex-direction: column-reverse; }
            .btn-update { flex: unset; }
        }
    </style>
</head>
<body>

<div class="page-wrapper">
    <a href="/catatan" class="back-link">Kembali ke Daftar</a>

    <div class="container">
        <div class="form-header">
            <p class="form-header-eyebrow">Edit Catatan</p>
            <h1>Perbarui Catatan</h1>
        </div>

        <div class="form-body">
            @if ($errors->any())
                <div class="error-box">
                    <div class="error-icon">!</div>
                    <div>
                        <strong>Gagal memperbarui! Periksa kembali masukan Anda:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <form action="/catatan/{{ $catatan->id }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="judul">Judul Catatan <span class="required-dot"></span></label>
                    <input type="text" id="judul" name="judul" class="form-control"
                           placeholder="Masukkan judul catatan..."
                           value="{{ old('judul', $catatan->judul) }}">
                </div>

                <div class="form-group">
                    <label for="tanggal">Tanggal <span class="required-dot"></span></label>
                    <input type="date" id="tanggal" name="tanggal" class="form-control"
                           value="{{ old('tanggal', $catatan->tanggal) }}">
                </div>

                <div class="form-group">
                    <label for="kategori">Kategori <span class="required-dot"></span></label>
                    <select id="kategori" name="kategori" class="form-control">
                        <option value="Tugas" {{ old('kategori', $catatan->kategori) == 'Tugas' ? 'selected' : '' }}>Tugas</option>
                        <option value="Ujian" {{ old('kategori', $catatan->kategori) == 'Ujian' ? 'selected' : '' }}>Ujian</option>
                        <option value="Selingan" {{ old('kategori', $catatan->kategori) == 'Selingan' ? 'selected' : '' }}>Selingan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="isi">Isi Catatan <span class="required-dot"></span></label>
                    <textarea id="isi" name="isi" class="form-control"
                              placeholder="Tulis isi catatan Anda di sini...">{{ old('isi', $catatan->isi) }}</textarea>
                </div>

                <div class="form-divider"></div>

                <div class="btn-container">
                    <button type="submit" class="btn btn-update">✓ Simpan Perubahan</button>
                    <a href="/catatan" class="btn btn-kembali">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>
