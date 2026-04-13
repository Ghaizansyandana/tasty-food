<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $detail->title ?? 'Detail Berita' }} - Tasty Food</title>
    <style>
        body { margin: 0; font-family: ui-sans-serif, system-ui, -apple-system, Segoe UI, Roboto, Arial, "Noto Sans", "Liberation Sans", sans-serif; background: #f4f4f4; color: #111; }
        .container { max-width: 900px; margin: 0 auto; padding: 24px 20px; }
        .topbar { display: flex; align-items: center; justify-content: space-between; padding: 14px 0; }
        a { color: inherit; text-decoration: none; }
        .brand { font-weight: 900; letter-spacing: 0.08em; text-transform: uppercase; font-size: 13px; }
        .card { background: #fff; border-radius: 14px; overflow: hidden; box-shadow: 0 12px 25px rgba(0,0,0,0.10); border: 1px solid rgba(0,0,0,0.04); }
        .media { height: 320px; background: linear-gradient(135deg, #111827, #334155); }
        .media img { width: 100%; height: 100%; object-fit: cover; display: block; }
        .content { padding: 22px; }
        h1 { margin: 0 0 10px; font-size: 26px; font-weight: 900; letter-spacing: 0.02em; }
        .excerpt { color: #6b7280; line-height: 1.7; margin: 0 0 14px; }
        .body { line-height: 1.9; color: #111827; font-size: 14px; }
        .btn { display: inline-block; padding: 10px 14px; border-radius: 8px; background: #0b0b0b; color: #fff; font-size: 11px; letter-spacing: 0.12em; text-transform: uppercase; }
    </style>
</head>
<body>
    <div class="container">
        <div class="topbar">
            <div class="brand">Tasty Food</div>
            <a class="btn" href="{{ route('berita.index') }}">Kembali</a>
        </div>

        <article class="card">
            @php
                $imgRel = 'images/' . ($detail->image ?? '');
                $imgAbs = public_path($imgRel);
            @endphp
            <div class="media">
                @if(!empty($detail->image) && file_exists($imgAbs))
                    <img src="{{ asset($imgRel) }}" alt="{{ $detail->title }}">
                @endif
            </div>
            <div class="content">
                <h1>{{ $detail->title }}</h1>
                @if(!empty($detail->excerpt))
                    <p class="excerpt">{{ $detail->excerpt }}</p>
                @endif
                <div class="body">{!! nl2br(e($detail->body ?? '')) !!}</div>
            </div>
        </article>
    </div>
</body>
</html>
