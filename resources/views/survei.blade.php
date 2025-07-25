<x-layout :title="$title">
    <section class="">
        <div class="flex justify-center items-center min-h-[70vh] px-4 ">
            <div class="bg-white p-6 rounded-xl shadow-md w-full max-w-md">
                <h2 class="text-sm font-bold mb-4 text-center">Isi Survey</h2>

                <form action="/" method="POST">
                    @csrf

                    {{-- Bidang --}}
                    <div>
                        <label for="bidang_id" class="block mb-2 text-sm font-medium text-gray-900">Bidang</label>
                        <select id="bidang_id" name="bidang_id" class="bg-gray-50 border border-gray-300
                         text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500
                          block w-full p-2.5">
                            <option value="">Pilih bidang</option>
                            @foreach (App\Models\bidang::get() as $bidang)
                            <option value="{{ $bidang->id }}">
                                {{ $bidang->nama_bidang }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    

                    {{-- Rating --}}
                    <div class="mb-4">
                        <label class="block mb-2 font-medium text-sm">Rating</label>
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 text-center text-3xl cursor-pointer" id="rating-icons">
                            <div class="rating-item flex flex-col items-center" data-value="">
                                <span class="rating-icon">😠</span>
                                <span class="text-xs sm:text-sm mt-1 leading-tight">
                                    Sangat<br>Mengecewakan
                                </span>
                            </div>
                            <div class="rating-item flex flex-col items-center" data-value="2">
                                <span class="rating-icon">😐</span>
                                <span class="text-xs sm:text-sm mt-1 leading-tight">Mengecewakan</span>
                            </div>
                            <div class="rating-item flex flex-col items-center" data-value="3">
                                <span class="rating-icon">🙂</span>
                                <span class="text-xs sm:text-sm mt-1 leading-tight">Puas</span>
                            </div>
                            <div class="rating-item flex flex-col items-center" data-value="4">
                                <span class="rating-icon">😍</span>
                                <span class="text-xs sm:text-sm mt-1 leading-tight">Sangat Puas</span>
                            </div>
                        </div>
                        <input type="hidden" name="kepuasan" id="kepuasan" value="">
                    </div>

                    {{-- masukan --}}
                    <div class="mb-4">
                        <label for="masukan" class="block mb-1 font-medium text-sm">Kritik dan saran</label>
                        <textarea id="masukan" name="masukan" rows="3" class="w-full border rounded px-3 py-2 text-sm" placeholder="Ketik saran di sini"></textarea>
                    </div>

                    {{-- Tombol Submit --}}
                    <button type="submit" class="w-full bg-blue-600
                     hover:bg-blue-700 text-white font-medium py-2 rounded">
                        Kirim
                    </button>
                </form>
            </div>
        </div>
    </section>

    <style>
    .rating-icon {
        transition: all 0.2s ease-in-out;
    }

    .rating-icon.active {
    transform: scale(1.1);
    color: #16a34a;
    background-color: #f0fdf4;
    border-radius: 0.375rem;
    padding: 0.25rem;
    }

</style>


<script>
    const ratingItems = document.querySelectorAll('.rating-item');
    const kepuasanInput = document.getElementById('kepuasan');

    const nilaiKepuasan = {
        1: 'sangat mengecewakan',
        2: 'mengecewakan',
        3: 'puas',
        4: 'sangat puas'
    };

    ratingItems.forEach(item => {
        item.addEventListener('click', () => {
            const value = item.getAttribute('data-value');
            kepuasanInput.value = nilaiKepuasan[value];

            ratingItems.forEach(i => i.classList.remove('bg-green-100', 'rounded-xl'));
            item.classList.add('bg-green-100', 'rounded-xl');
        });
    });
</script>

</x-layout>
