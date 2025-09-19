@props(['faqs'])

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

            <div class="lg:col-span-2">
                <div class="space-y-2">
                    @forelse ($faqs as $index => $faq)
                        <div data-aos="fade-up" data-aos-delay="{{ $index * 100 }}"
                            x-data="{ open: false }"
                            class="border-b border-slate-700 last:border-b-0">
                            
                            <button @click="open = !open" class="w-full flex justify-between items-center text-left py-6">
                                <span class="text-lg font-semibold text-slate-100">{{ $faq['question'] }}</span>
                                <svg class="w-6 h-6 text-slate-400 transition-transform duration-300" :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                            </button>
                            
                            <div x-show="open" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-2"
                                class="pb-6 pr-12 text-slate-300">
                                <p>{{ $faq['answer'] }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="text-center text-slate-400">Belum ada pertanyaan umum.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>