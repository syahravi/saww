@if (config('sweetalert.alwaysLoadJS') === true || Session::has('alert.config') || Session::has('alert.delete'))
    @if (config('sweetalert.animation.enable'))
        <link rel="stylesheet" href="{{ config('sweetalert.animatecss') }}">
    @endif

    @if (config('sweetalert.theme') != 'default')
        <link href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-{{ config('sweetalert.theme') }}" rel="stylesheet">
    @endif

    @if (config('sweetalert.neverLoadJS') === false)
        <script src="{{ $cdn ?? asset('vendor/sweetalert/sweetalert.all.js') }}"></script>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.body.addEventListener('click', function(event) {
                let deleteBtn = event.target.closest('[data-confirm-delete]');

                if (deleteBtn) {
                    event.preventDefault();

                    let userId = deleteBtn.dataset.id;
                    let loggedInUserId = {{ auth()->user()->id }};

                    // Cek apakah user yang sedang login
                    if (parseInt(userId) === loggedInUserId) {
                        Swal.fire('Gagal!', 'Anda tidak dapat menghapus akun sendiri.', 'error');
                        return;
                    }

                    Swal.fire({
                        title: 'Yakin ingin menghapus?',
                        text: "Data yang dihapus tidak bisa dikembalikan!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, Hapus!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            let form = document.createElement('form');
                            form.action = deleteBtn.href;
                            form.method = 'POST';
                            form.innerHTML = `
                                @csrf
                                @method('DELETE')
                            `;
                            document.body.appendChild(form);
                            form.submit();
                        }
                    });
                }
            });

            @if (Session::has('alert.config'))
                Swal.fire({!! Session::pull('alert.config') !!});
            @endif
        });
    </script>
@endif
