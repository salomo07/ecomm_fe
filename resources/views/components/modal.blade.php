@props([
    'id' => 'customModal',
    'title' => 'Modal Title',
    'size' => '',  {{-- sm, lg, xl --}}
])

<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-{{ $size }}">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">{{ $title }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                {{ $slot }} {{-- <=== INI tempat konten kustom --}}
            </div>

            <div class="modal-footer">
                {{ $footer ?? '' }} {{-- <=== Slot opsional untuk tombol --}}
            </div>

        </div>
    </div>
</div>
