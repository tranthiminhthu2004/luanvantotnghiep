<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gợi ý điểm đến du lịch</title>

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
</head>

<body class="bg-slate-50">

    @include('components.navbar')

    <div class="pt-24">

        @include('users.diadiemdulich.search')

        {{-- NỘI DUNG CHÍNH --}}
        <main class="max-w-7xl mx-auto px-4 lg:px-8 py-8">

            @include('users.diadiemdulich.formuutien')

            @if(isset($ketQuaGoiY))

            @include('users.diadiemdulich.ketqua')

            @endif

        </main>

    </div>

    @include('components.footer')
    <script>
    document.addEventListener('DOMContentLoaded', function() {

        const btnXemTatCa =
            document.getElementById('btnXemTatCaNhuCau');

        if (btnXemTatCa) {

            btnXemTatCa.addEventListener('click', function() {

                document
                    .querySelectorAll('.nhu-cau-an')
                    .forEach(function(item) {

                        item.classList.remove('hidden');

                    });

                btnXemTatCa.remove();

            });

        }

        document
            .querySelectorAll('.labelMucDoUuTien')
            .forEach(function(label) {

                label.addEventListener('click', function(event) {

                    event.preventDefault();

                    const input =
                        label.querySelector('.radioMucDoUuTien');

                    if (!input) {
                        return;
                    }

                    if (input.checked) {

                        input.checked = false;

                        return;

                    }

                    document
                        .getElementsByName(input.name)
                        .forEach(function(item) {

                            item.checked = false;

                        });

                    input.checked = true;

                });

            });

    });
    </script>

</body>

</html>