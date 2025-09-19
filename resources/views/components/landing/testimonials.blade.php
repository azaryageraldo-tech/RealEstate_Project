@props(['testimonials'])

<section class="bg-white py-20 sm:py-24">
    <div class="max-w-6xl mx-auto px-4">
        
        <div data-aos="fade-up" class="text-center">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight">Dipercaya oleh Ribuan Klien</h2>
            <p class="mt-4 max-w-2xl mx-auto text-lg text-gray-600">Lihat apa kata mereka yang telah menemukan properti impiannya bersama kami.</p>
        </div>

        <div class="mt-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            @forelse($testimonials as $index => $testimonial)
                <div data-aos="fade-up" data-aos-delay="{{ ($index + 1) * 100 }}" class="relative bg-slate-50 rounded-xl p-8 shadow-lg transition-all duration-300 hover:shadow-2xl hover:-translate-y-2">
                    
                    <div class="absolute top-6 right-6 text-8xl text-gray-200 font-serif opacity-50 z-0">
                        &ldquo;
                    </div>
                    
                    <div class="relative z-10">
                        <div class="flex items-center mb-4">
                            @for ($i = 0; $i < $testimonial->rating; $i++)
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                            @endfor
                        </div>
                        
                        <p class="text-lg text-gray-700 leading-relaxed">
                            {{ $testimonial->content }}
                        </p>
                        
                        <div class="border-t my-6 border-gray-200"></div>
                        
                        <div class="flex items-center">
                            <img class="w-14 h-14 rounded-full object-cover shadow-md" src="{{ $testimonial->avatar_url }}" alt="{{ $testimonial->name }}">
                            <div class="ml-4">
                                <p class="font-bold text-gray-800">{{ $testimonial->name }}</p>
                                <p class="text-sm text-gray-500">{{ $testimonial->role }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="col-span-3 text-center text-gray-500">Belum ada testimoni.</p>
            @endforelse

        </div>
    </div>
</section>