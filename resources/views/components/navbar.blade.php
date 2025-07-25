<!-- Navbar -->
<nav style="background-color: #002147;">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="flex h-25 items-center justify-between">
            <div class="flex items-center">
                <div class="shrink-0">
                    <img src="{{ asset('images/logo.png') }}" alt="Polda Yogyakarta" class="size-20" />
                </div>
                <p id="today-date" class="text-white text-sm"></p>
                <script>
                document.getElementById('today-date').innerText = new Date().toLocaleDateString('id-ID', {
                    weekday: 'long', year: 'numeric', month: 'long', day: 'numeric'
                });
                </script>
            </div>
        </div>
    </div>
</nav>