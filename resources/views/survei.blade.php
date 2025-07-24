<x-layout :title="$title">
    <section class="bg-white">
        <div class="py-8 px-6 sm:px-10 mx-auto w-full max-w-4xl lg:py-16">
            <h2 class="mb-4 text-xl justify-center flex font-bold text-gray-900">Isi Survey</h2>
            <form action="#" method="POST">
                @csrf
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div>
                        <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Bidang</label>
                        <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                            <option value="">Pilih bidang</option>
                            @foreach (App\Models\bidang::get() as $bidang)
                            <option value="{{ $bidang->id }}">{{ $bidang->nama_bidang }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- RATING SECTION -->
                    <div class="sm:col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900">Rating</label>
                        <input type="hidden" name="rating" id="rating">
                        <div class="grid grid-cols-4 gap-4 text-center text-3xl cursor-pointer" id="rating-icons">
                            <div class="rating-item flex flex-col items-center transition-all duration-300 ease-in-out">
                                <span data-value="1" class="rating-icon block transition-all duration-200 ease-in-out">😠</span>
                                <span class="text-sm text-gray-700 mt-1">Sangat Mengecewakan</span>
                            </div>
                            <div class="rating-item flex flex-col items-center transition-all duration-300 ease-in-out">
                                <span data-value="2" class="rating-icon block transition-all duration-200 ease-in-out">😐</span>
                                <span class="text-sm text-gray-700 mt-1">Mengecewakan</span>
                            </div>
                            <div class="rating-item flex flex-col items-center transition-all duration-300 ease-in-out">
                                <span data-value="3" class="rating-icon block transition-all duration-200 ease-in-out">🙂</span>
                                <span class="text-sm text-gray-700 mt-1">Puas</span>
                            </div>
                            <div class="rating-item flex flex-col items-center transition-all duration-300 ease-in-out">
                                <span data-value="4" class="rating-icon block transition-all duration-200 ease-in-out">😍</span>
                                <span class="text-sm text-gray-700 mt-1">Sangat Puas</span>
                            </div>
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Saran</label>
                        <textarea id="description" name="description" rows="4" class="block p-2.5 w-full text-sm
                         text-gray-900  rounded-lg border border-gray-300 focus:ring-primary-500 
                         focus:border-primary-500 " placeholder="Ketik saran disini">
                        </textarea>
                    </div>
                </div>

                <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-white bg-green-600 rounded-lg focus:ring-4 focus:ring-green-300 hover:bg-green-700">
                    Kirim
                </button>
            </form>
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
        const ratingIcons = document.querySelectorAll('.rating-icon');
        const ratingInput = document.getElementById('rating');

        ratingIcons.forEach(icon => {
            icon.addEventListener('click', () => {
                const value = icon.getAttribute('data-value');
                ratingInput.value = value;

                // Hapus semua aktif
               document.querySelectorAll('.rating-icon').forEach(i => {
                   i.classList.remove('active');
               });

                    icon.classList.add('active');

            });
        });
    </script>
</x-layout>
