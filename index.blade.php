<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Catatan Mahasiswa</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { box-sizing: border-box; }

        :root {
            --primary:        #4f46e5;
            --primary-hover:  #4338ca;
            --primary-soft:   #eef2ff;
            --success:        #059669;
            --success-hover:  #047857;
            --success-soft:   #ecfdf5;
            --danger:         #dc2626;
            --danger-hover:   #b91c1c;
            --danger-soft:    #fef2f2;
            --bg:             #f1f5f9;
            --surface:        #ffffff;
            --surface-2:      #f8fafc;
            --text-primary:   #0f172a;
            --text-secondary: #475569;
            --text-muted:     #94a3b8;
            --border:         #e2e8f0;
            --border-strong:  #cbd5e1;
            --shadow-sm:      0 1px 3px rgba(15,23,42,.06), 0 1px 2px rgba(15,23,42,.04);
            --shadow-md:      0 4px 16px rgba(15,23,42,.08), 0 1px 4px rgba(15,23,42,.04);
            --shadow-lg:      0 12px 32px rgba(15,23,42,.12), 0 4px 8px rgba(15,23,42,.06);
            --radius-sm:      6px;
            --radius-md:      10px;
            --radius-lg:      16px;
            --radius-xl:      20px;
            --ring-primary:   0 0 0 3px rgba(79,70,229,.25);
            --ring-success:   0 0 0 3px rgba(5,150,105,.25);
            --ring-danger:    0 0 0 3px rgba(220,38,38,.25);
            --transition:     all 0.2s cubic-bezier(0.4,0,0.2,1);
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            line-height: 1.65;
            margin: 0;
            min-height: 100vh;
            padding: 48px 20px 64px;
            background-color: var(--bg);
            background-image:
                radial-gradient(circle at 20% 10%, rgba(79,70,229,.06) 0%, transparent 50%),
                radial-gradient(circle at 80% 90%, rgba(5,150,105,.05) 0%, transparent 50%);
            color: var(--text-primary);
            -webkit-font-smoothing: antialiased;
        }

        .container {
            max-width: 860px;
            margin: 0 auto;
        }

        /* ── Header ─────────────────────────────────── */
        .header-section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 36px;
            flex-wrap: wrap;
            gap: 16px;
        }

        .header-title-group { display: flex; flex-direction: column; gap: 4px; }

        .header-eyebrow {
            font-size: 0.72rem;
            font-weight: 600;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: var(--primary);
        }

        h1 {
            margin: 0;
            font-size: 1.9rem;
            font-weight: 700;
            letter-spacing: -0.03em;
            color: var(--text-primary);
            line-height: 1.2;
        }

        /* ── Primary CTA button ──────────────────────── */
        .btn-tambah {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background-color: var(--primary);
            color: #fff;
            padding: 11px 22px;
            text-decoration: none;
            border-radius: var(--radius-md);
            font-weight: 600;
            font-size: 0.9rem;
            letter-spacing: 0.01em;
            transition: var(--transition);
            box-shadow: 0 1px 2px rgba(79,70,229,.18), 0 4px 12px rgba(79,70,229,.14);
        }

        .btn-tambah::before { content: '+'; font-size: 1.1rem; font-weight: 400; }

        .btn-tambah:hover {
            background-color: var(--primary-hover);
            transform: translateY(-2px);
            box-shadow: 0 2px 4px rgba(79,70,229,.2), 0 8px 20px rgba(79,70,229,.18);
        }

        .btn-tambah:active { transform: translateY(0); }
        .btn-tambah:focus-visible { outline: none; box-shadow: var(--ring-primary); }

        /* ── Alert ───────────────────────────────────── */
        .alert-sukses {
            display: flex;
            align-items: center;
            gap: 10px;
            background-color: var(--success-soft);
            color: #065f46;
            padding: 14px 18px;
            border-radius: var(--radius-md);
            margin-bottom: 28px;
            border: 1px solid #a7f3d0;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .alert-sukses::before {
            content: '✓';
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 22px;
            height: 22px;
            background: #059669;
            color: #fff;
            border-radius: 50%;
            font-size: 0.75rem;
            font-weight: 700;
            flex-shrink: 0;
        }

        /* ── Stat bar ────────────────────────────────── */
        .stat-bar {
            display: flex;
            align-items: center;
            gap: 20px;
            margin-bottom: 24px;
            font-size: 0.82rem;
            color: var(--text-muted);
            font-weight: 500;
        }

        .stat-bar span { letter-spacing: 0.01em; }

        /* ── Card grid ───────────────────────────────── */
        .catatan-grid { display: grid; gap: 18px; }

        .card-catatan {
            background: var(--surface);
            padding: 0;
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--border);
            overflow: hidden;
            transition: var(--transition);
            position: relative;
        }

        .card-catatan::before {
            content: '';
            position: absolute;
            left: 0; top: 0; bottom: 0;
            width: 4px;
            background: linear-gradient(180deg, var(--success) 0%, #34d399 100%);
            border-radius: 4px 0 0 4px;
        }

        .card-catatan:hover {
            box-shadow: var(--shadow-lg);
            transform: translateY(-3px);
            border-color: var(--border-strong);
        }

        .card-body { padding: 24px 28px 20px 32px; }

        .card-catatan h3 {
            margin: 0 0 10px;
            color: var(--text-primary);
            font-size: 1.15rem;
            font-weight: 700;
            letter-spacing: -0.02em;
            line-height: 1.35;
        }

        /* ── Meta row ────────────────────────────────── */
        .meta-data {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.82rem;
            color: var(--text-muted);
            margin-bottom: 16px;
            flex-wrap: wrap;
        }

        .meta-separator { color: var(--border-strong); }

        .badge-kategori {
            display: inline-flex;
            align-items: center;
            background: var(--primary-soft);
            color: var(--primary);
            padding: 3px 10px;
            border-radius: 999px;
            font-weight: 600;
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 0.07em;
            border: 1px solid rgba(79,70,229,.15);
        }

        .badge-kategori.tugas   { background: #fffbeb; color: #b45309; border-color: rgba(180,83,9,.15); }
        .badge-kategori.ujian   { background: #fef2f2; color: var(--danger); border-color: rgba(220,38,38,.15); }
        .badge-kategori.selingan{ background: var(--primary-soft); color: var(--primary); }

        /* ── Note content ────────────────────────────── */
        .isi-catatan {
            font-size: 0.93rem;
            color: var(--text-secondary);
            white-space: pre-line;
            line-height: 1.7;
            margin: 0 0 20px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* ── Action footer ───────────────────────────── */
        .aksi-buttons {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 14px 28px 16px 32px;
            background: var(--surface-2);
            border-top: 1px solid var(--border);
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 16px;
            border-radius: var(--radius-sm);
            font-size: 0.83rem;
            font-weight: 600;
            cursor: pointer;
            text-decoration: none;
            transition: var(--transition);
            border: 1px solid transparent;
            line-height: 1;
        }

        .btn-edit {
            background: var(--primary-soft);
            color: var(--primary);
            border-color: rgba(79,70,229,.15);
        }

        .btn-edit:hover {
            background: var(--primary);
            color: #fff;
            border-color: var(--primary);
            box-shadow: 0 2px 8px rgba(79,70,229,.25);
        }

        .btn-hapus {
            background: var(--danger-soft);
            color: var(--danger);
            border-color: rgba(220,38,38,.15);
        }

        .btn-hapus:hover {
            background: var(--danger);
            color: #fff;
            border-color: var(--danger);
            box-shadow: 0 2px 8px rgba(220,38,38,.25);
        }

        .btn:active { transform: scale(0.97); }
        .btn:focus-visible { outline: none; box-shadow: var(--ring-primary); }

        /* ── Empty state ─────────────────────────────── */
        .empty-state {
            text-align: center;
            padding: 72px 40px;
            color: var(--text-muted);
            background: var(--surface);
            border-radius: var(--radius-xl);
            border: 2px dashed var(--border-strong);
        }

        .empty-icon {
            font-size: 3rem;
            margin-bottom: 16px;
            opacity: 0.5;
            display: block;
        }

        .empty-state p {
            margin: 0 0 20px;
            font-size: 1rem;
            font-weight: 500;
            color: var(--text-secondary);
        }

        .empty-state small {
            display: block;
            font-size: 0.85rem;
            color: var(--text-muted);
            margin-bottom: 24px;
        }

        /* ── Responsive ──────────────────────────────── */
        @media (max-width: 640px) {
            body { padding: 28px 16px 48px; }
            h1 { font-size: 1.5rem; }
            .header-section { flex-direction: column; align-items: flex-start; }
            .card-body { padding: 20px 20px 16px 24px; }
            .aksi-buttons { padding: 12px 20px 14px 24px; }
        }
    </style>
</head>
<body>

    <div class="container">
        <div class="header-section">
            <div class="header-title-group">
                <span class="header-eyebrow">Akademik</span>
                <h1>Daftar Catatan Mahasiswa</h1>
            </div>
            <a href="/catatan/create" class="btn-tambah">Tambah Catatan</a>
        </div>

        @if(session('success'))
            <div class="alert-sukses">{{ session('success') }}</div>
        @endif

        <div class="catatan-grid">
            @forelse($catatan as $c)
                <div class="card-catatan">
                    <div class="card-body">
                        <h3>{{ $c->judul }}</h3>
                        <div class="meta-data">
                            <span class="badge-kategori {{ strtolower($c->kategori) }}">{{ $c->kategori }}</span>
                            <span class="meta-separator">·</span>
                            <span>{{ \Carbon\Carbon::parse($c->tanggal)->format('d M Y') ?? $c->tanggal }}</span>
                        </div>
                        <p class="isi-catatan">{{ $c->isi }}</p>
                    </div>
                    <div class="aksi-buttons">
                        <a href="/catatan/{{ $c->id }}/edit" class="btn btn-edit">✏ Edit</a>
                        <form action="/catatan/{{ $c->id }}" method="POST" style="margin: 0;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-hapus" onclick="return confirm('Yakin ingin menghapus catatan ini?')">✕ Hapus</button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="empty-state">
                    <span class="empty-icon">📋</span>
                    <p>Belum ada catatan yang ditambahkan.</p>
                    <small>Mulai dengan menambahkan catatan pertama Anda.</small>
                    <a href="/catatan/create" class="btn-tambah" style="display:inline-flex;">Tambah Catatan Pertama</a>
                </div>
            @endforelse
        </div>
    </div>

</body>
</html>
