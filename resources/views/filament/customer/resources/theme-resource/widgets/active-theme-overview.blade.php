<div>
    @if ($activeTheme = $this->getActiveTheme())
    <div>Aktif tema: {{ $activeTheme->name }}</div>@else<div>Henüz aktif tema yok.</div>
    @endif
</div>
