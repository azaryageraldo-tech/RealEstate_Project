@props(['faqs']) {{-- <-- Perubahan di sini --}}

<section class="bg-slate-900 text-white py-20 sm:py-24">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <div data-aos="fade-right" class="lg:col-span-1">
                <h2 class="text-3xl sm:text-4xl font-extrabold tracking-tight">
                    Ada Pertanyaan?
                </h2>
                <p class="mt-4 text-lg text-slate-400">
                    Kami telah merangkum beberapa pertanyaan yang paling sering diajukan oleh klien kami di sini.
                </p>
                <a href="{{ route('contact') }}" class="mt-6 inline-block text-blue-400 font-semibold hover:text-blue-300">
                    Hubungi Kami &rarr;
                </a>
            </div>

            <div class="lg:col-span-2" data-aos="fade-left">
                {{-- Render konten HTML langsung dari database --}}
                @if($faqs && $faqs->content) {{-- <-- Perubahan di sini --}}
                    <div class="prose prose-invert max-w-none">
                        {!! $faqs->content !!} {{-- <-- Perubahan di sini --}}
                    </div>
                @else
                     <p class="text-slate-400">Konten FAQ belum tersedia. Silakan isi melalui Panel Admin.</p>
                @endif
            </div>
        </div>
    </div>
</section>