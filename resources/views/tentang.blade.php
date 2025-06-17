@extends('layouts.app')
@section('content')
<style>
    /* Custom animations from the React components */
    @keyframes fade-in-up {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .animate-fade-in-up {
        animation: fade-in-up 0.6s ease-out forwards;
        opacity: 0; /* Start hidden */
    }

    @keyframes bounce-soft {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-5px);
        }
    }
    .animate-bounce-soft {
        animation: bounce-soft 1.5s ease-in-out infinite;
    }

    @keyframes float {
        0% {
            transform: translateY(0px);
        }
        50% {
            transform: translateY(-10px);
        }
        100% {
            transform: translateY(0px);
        }
    }
    .animate-float {
        animation: float 3s ease-in-out infinite;
    }

    /* Custom gradient */
    .tk-gradient-warm {
        background-image: linear-gradient(to bottom right, #F3F2EB, #F1F0E9);
    }
</style>

<!-- Hero Section -->
<section class="tk-gradient-warm py-20 md:py-28 relative overflow-hidden mt-[-4rem]">
  <div class="absolute inset-0 opacity-5">
    <div class="absolute top-10 left-10 w-20 h-20 bg-[#41644A] rounded-full"></div>
    <div class="absolute top-40 right-20 w-16 h-16 bg-[#E9762B] rounded-full"></div>
    <div class="absolute bottom-20 left-1/4 w-12 h-12 bg-[#0D4715] rounded-full"></div>
  </div>
  
  <div class="container mx-auto px-6 relative z-10">
    <div class="flex flex-col lg:flex-row items-center justify-between gap-16">
      <div class="flex-1 text-center lg:text-left animate-fade-in-up">
        <div class="mb-8">
          <div class="flex items-center justify-center lg:justify-start gap-3 mb-4">
            <div class="w-3 h-3 bg-[#E9762B] rounded-full animate-pulse"></div>
            <span class="text-[#E9762B] text-sm font-semibold tracking-wider uppercase">Platform Kebaikan</span>
            <div class="w-3 h-3 bg-[#E9762B] rounded-full animate-pulse"></div>
          </div>
          
          <h1 class="text-5xl md:text-7xl font-bold leading-tight mb-4">
            <span class="text-[#E9762B]">Jembatan</span>
            <br />
            <div class="flex items-center justify-center lg:justify-start gap-4 mt-2">
              <div class="w-14 h-14 bg-[#41644A] rounded-2xl flex items-center justify-center shadow-lg animate-bounce-soft">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
              </div>
              <span class="text-[#0D4715]">Kebaikan</span>
            </div>
          </h1>
        </div>
        
        <div class="mb-8">
          <div class="flex items-center justify-center lg:justify-start gap-4 mb-6">
            <div class="w-10 h-10 bg-[#E9762B] rounded-xl flex items-center justify-center animate-float shadow-lg">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 7.5L14.5 14M21 16.5L14.5 9M18 20l-1.5-3.5L13 15.5l3.5-1.5L18 10.5l1.5 3.5L23 15.5l-3.5 1.5zM2.5 13.5l1.5 3.5L7.5 18l-3.5 1.5L2.5 23l-1.5-3.5L-2.5 18l3.5-1.5z"/></svg>
            </div>
            <span class="text-[#41644A] text-3xl md:text-5xl font-bold">Wujudkan Harapan</span>
          </div>
        </div>

        <p class="text-lg text-[#41644A] mb-10 leading-relaxed max-w-2xl font-medium">
          Kami hadir sebagai penghubung antara kebaikan dan harapan, 
          mempertemukan panti asuhan di Kota Malang dengan para 
          dermawan dan relawan. <span class="text-[#E9762B] font-bold">Bersama</span>, kita bisa mewujudkan masa 
          depan yang lebih cerah dan penuh makna.
        </p>

        <div class="flex flex-wrap gap-4 justify-center lg:justify-start mb-8">
          <div class="flex items-center gap-3 bg-[#41644A] px-6 py-3 rounded-full text-white shadow-lg hover:shadow-xl transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            <span class="font-semibold">50+ Panti Asuhan</span>
          </div>
          <div class="flex items-center gap-3 bg-[#E9762B] px-6 py-3 rounded-full text-white shadow-lg hover:shadow-xl transition-all duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s-8-4.5-8-11.8A8 8 0 0 1 12 2a8 8 0 0 1 8 8.2c0 7.3-8 11.8-8 11.8z"/><circle cx="12" cy="10" r="3"/></svg>
            <span class="font-semibold">Kota Malang</span>
          </div>
        </div>
      </div>

      <div class="flex-1 max-w-lg animate-fade-in-up" style="animation-delay: 0.3s;">
        <div class="relative">
          <div class="absolute -top-6 -left-6 w-full h-full bg-[#D0D5CB] rounded-3xl opacity-40 transform rotate-3"></div>
          <div class="absolute -top-3 -left-3 w-full h-full bg-[#41644A] rounded-3xl opacity-20 transform -rotate-2"></div>
          <img 
            src="https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=500&h=600&fit=crop" 
            alt="Anak-anak ceria di panti asuhan"
            class="relative rounded-3xl shadow-xl w-full h-[450px] object-cover animate-float"
          />
          
          <div class="absolute -bottom-6 -right-6 bg-[#E9762B] p-4 rounded-2xl shadow-lg animate-bounce-soft">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
          </div>
          
          <div class="absolute top-6 -left-4 bg-[#0D4715] p-3 rounded-xl shadow-lg animate-float" style="animation-delay: 1s;">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 7.5L14.5 14M21 16.5L14.5 9M18 20l-1.5-3.5L13 15.5l3.5-1.5L18 10.5l1.5 3.5L23 15.5l-3.5 1.5zM2.5 13.5l1.5 3.5L7.5 18l-3.5 1.5L2.5 23l-1.5-3.5L-2.5 18l3.5-1.5z"/></svg>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Mission Section -->
<section class="py-20 md:py-28 bg-white relative">
  <div class="absolute inset-0 opacity-3">
    <div class="absolute top-20 right-10 w-32 h-32 bg-[#D0D5CB] rounded-full"></div>
    <div class="absolute bottom-20 left-10 w-24 h-24 bg-[#F1F0E9] rounded-full"></div>
  </div>
  
  <div class="container mx-auto px-6 relative z-10">
    <div class="text-center mb-16 animate-fade-in-up">
      <div class="flex items-center justify-center mb-6">
        <div class="w-16 h-16 bg-[#41644A] rounded-2xl flex items-center justify-center shadow-lg animate-bounce-soft">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
    </div>
</div>

      <h2 class="text-4xl md:text-6xl font-bold text-[#0D4715] mb-6 tracking-tight">
        Tentang <span class="text-[#E9762B]">TitikKebaikan</span>
      </h2>
      <p class="text-xl text-[#41644A] max-w-4xl mx-auto leading-relaxed font-medium">
        Kami percaya setiap tindakan kebaikan, sekecil apapun, dapat menciptakan 
        dampak besar dalam kehidupan anak-anak panti asuhan. Mari bersama mewujudkan harapan 
        dan membangun masa depan yang lebih cerah.
      </p>
    </div>

    <div class="grid md:grid-cols-3 gap-8">
      <div class="group hover:scale-105 transition-all duration-500 cursor-pointer animate-fade-in-up" style="animation-delay: 0s;">
        <div class="bg-white rounded-3xl shadow-lg hover:shadow-xl transition-all duration-500 p-8 border border-[#D0D5CB] h-full relative overflow-hidden">
          <div class="absolute top-0 right-0 w-32 h-32 opacity-5">
            <div class="w-full h-full bg-[#41644A] rounded-full transform translate-x-16 -translate-y-16"></div>
          </div>
          
          <div class="bg-[#41644A] w-18 h-18 rounded-2xl flex items-center justify-center mb-8 shadow-lg group-hover:animate-bounce-soft transition-all duration-300 relative z-10">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-9 h-9 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><circle cx="12" cy="12" r="6"/><circle cx="12" cy="12" r="2"/></svg>
          </div>
          
          <h3 class="text-2xl font-bold text-[#41644A] mb-6 group-hover:text-[#E9762B] transition-colors duration-300">
            Misi Kami
          </h3>
          
          <p class="text-[#41644A] leading-relaxed text-base font-medium">
            Membangun jembatan kebaikan antara masyarakat dan panti asuhan di Kota Malang untuk menciptakan ekosistem berbagi yang berkelanjutan dan berdampak nyata.
          </p>
          
          <div class="absolute bottom-0 left-0 w-0 h-1 bg-[#E9762B] group-hover:w-full transition-all duration-500"></div>
        </div>
      </div>

      <div class="group hover:scale-105 transition-all duration-500 cursor-pointer animate-fade-in-up" style="animation-delay: 0.2s;">
        <div class="bg-white rounded-3xl shadow-lg hover:shadow-xl transition-all duration-500 p-8 border border-[#D0D5CB] h-full relative overflow-hidden">
          <div class="absolute top-0 right-0 w-32 h-32 opacity-5">
            <div class="w-full h-full bg-[#E9762B] rounded-full transform translate-x-16 -translate-y-16"></div>
          </div>
          
          <div class="bg-[#E9762B] w-18 h-18 rounded-2xl flex items-center justify-center mb-8 shadow-lg group-hover:animate-bounce-soft transition-all duration-300 relative z-10">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-9 h-9 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7z"/><circle cx="12" cy="12" r="3"/></svg>
          </div>
          
          <h3 class="text-2xl font-bold text-[#E9762B] mb-6 group-hover:text-[#E9762B] transition-colors duration-300">
            Visi Kami
          </h3>
          
          <p class="text-[#41644A] leading-relaxed text-base font-medium">
            Menjadi platform terdepan yang menghubungkan kebaikan hati masyarakat dengan kebutuhan anak-anak panti asuhan di Indonesia secara transparan dan profesional.
          </p>
          
          <div class="absolute bottom-0 left-0 w-0 h-1 bg-[#E9762B] group-hover:w-full transition-all duration-500"></div>
    </div>
</div>

      <div class="group hover:scale-105 transition-all duration-500 cursor-pointer animate-fade-in-up" style="animation-delay: 0.4s;">
        <div class="bg-white rounded-3xl shadow-lg hover:shadow-xl transition-all duration-500 p-8 border border-[#D0D5CB] h-full relative overflow-hidden">
          <div class="absolute top-0 right-0 w-32 h-32 opacity-5">
            <div class="w-full h-full bg-[#0D4715] rounded-full transform translate-x-16 -translate-y-16"></div>
          </div>
          
          <div class="bg-[#0D4715] w-18 h-18 rounded-2xl flex items-center justify-center mb-8 shadow-lg group-hover:animate-bounce-soft transition-all duration-300 relative z-10">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-9 h-9 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/><path d="M11 11.5a2.5 2.5 0 0 1 5 0c0 1.5-2.5 4-2.5 4s-2.5-2.5-2.5-4z"/></svg>
          </div>
          
          <h3 class="text-2xl font-bold text-[#0D4715] mb-6 group-hover:text-[#E9762B] transition-colors duration-300">
            Nilai Kami
          </h3>
          
          <p class="text-[#41644A] leading-relaxed text-base font-medium">
            Transparansi, empati, integritas, dan keberlanjutan dalam setiap langkah kebaikan yang kami wujudkan bersama untuk masa depan yang lebih baik.
          </p>
          
          <div class="absolute bottom-0 left-0 w-0 h-1 bg-[#E9762B] group-hover:w-full transition-all duration-500"></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Impact Section -->
<section class="py-20 md:py-28 bg-white relative overflow-hidden">
  <div class="absolute inset-0 opacity-3">
    <div class="absolute top-10 right-20 w-40 h-40 bg-[#D0D5CB] rounded-full"></div>
    <div class="absolute bottom-20 left-10 w-32 h-32 bg-[#F1F0E9] rounded-full"></div>
    <div class="absolute top-1/2 left-1/2 w-24 h-24 bg-[#F6F5F0] rounded-full"></div>
  </div>
  
  <div class="container mx-auto px-6 relative z-10">
    <div class="grid lg:grid-cols-2 gap-16 items-center">
      <div class="animate-fade-in-up">
        <div class="flex items-center gap-3 mb-6">
          <div class="w-12 h-12 bg-[#E9762B] rounded-2xl flex items-center justify-center shadow-lg animate-bounce-soft">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 7.5L14.5 14M21 16.5L14.5 9M18 20l-1.5-3.5L13 15.5l3.5-1.5L18 10.5l1.5 3.5L23 15.5l-3.5 1.5zM2.5 13.5l1.5 3.5L7.5 18l-3.5 1.5L2.5 23l-1.5-3.5L-2.5 18l3.5-1.5z"/></svg>
          </div>
          <span class="text-[#41644A] font-semibold text-sm tracking-wider uppercase">Dampak Nyata</span>
        </div>
        
        <h2 class="text-4xl md:text-5xl font-bold text-[#0D4715] mb-8 leading-tight">
          Ayo Berbuat <span class="text-[#E9762B]">Kebaikan!</span>
        </h2>
        
        <p class="text-xl text-[#41644A] mb-10 leading-relaxed font-medium">
          Setiap langkah kecil kebaikan yang kamu lakukan akan 
          membawa perubahan besar bagi anak-anak di panti asuhan. 
          Mari berkolaborasi untuk mewujudkan harapan dan 
          memberikan kebahagiaan untuk semua panti di Kota Malang.
        </p>

        <div class="space-y-8 mb-10">
          <div class="flex items-start gap-6 group hover:scale-105 transition-all duration-500 bg-[#F6F5F0] p-6 rounded-2xl shadow-lg hover:shadow-xl">
            <div class="bg-[#41644A] w-16 h-16 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:animate-bounce-soft shadow-lg">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
            </div>
            <div>
              <h3 class="font-bold text-[#0D4715] text-xl mb-3 group-hover:text-[#E9762B] transition-colors">
                Kontribusi Kecil, Dampak Besar
              </h3>
              <p class="text-[#41644A] leading-relaxed font-medium">
                Tak perlu menunggu kaya untuk berbagi. Sumbangan 
                kecil, doa, hingga sekedar senyuman bisa menjadi 
                cahaya harapan bagi anak-anak di panti asuhan. Yuk, mulai 
                dari sekarang dan rasakan kebahagiaan berbagi!
              </p>
            </div>
          </div>

          <div class="flex items-start gap-6 group hover:scale-105 transition-all duration-500 bg-[#F6F5F0] p-6 rounded-2xl shadow-lg hover:shadow-xl">
            <div class="bg-[#E9762B] w-16 h-16 rounded-2xl flex items-center justify-center flex-shrink-0 group-hover:animate-bounce-soft shadow-lg">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
                </div>
            <div>
              <h3 class="font-bold text-[#0D4715] text-xl mb-3 group-hover:text-[#E9762B] transition-colors">
                Bersama, Kita Bisa!
              </h3>
              <p class="text-[#41644A] leading-relaxed font-medium">
                Bergabunglah dengan komunitas TitikKebaikan dan ribuan relawan 
                lain untuk menciptakan lingkungan yang penuh kasih dan 
                perhatian. Setiap kontribusi, sekecil apapun, sangat berarti 
                untuk masa depan yang lebih cerah.
              </p>
                </div>
                </div>
                </div>

        <div class="flex flex-wrap gap-4">
          <div class="flex items-center gap-2 bg-[#41644A] px-4 py-2 rounded-full text-white font-semibold shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
            <span class="text-sm">Terpercaya</span>
                </div>
          <div class="flex items-center gap-2 bg-[#E9762B] px-4 py-2 rounded-full text-white font-semibold shadow-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 12 20 22 4 22 4 12"/><rect x="2" y="7" width="20" height="5"/><path d="M12 7V2.5A2.5 2.5 0 0 1 14.5 0c1.38 0 2.5 1.12 2.5 2.5V7"/><path d="M12 7V2.5A2.5 2.5 0 0 0 9.5 0c-1.38 0-2.5 1.12-2.5 2.5V7"/></svg>
            <span class="text-sm">Transparan</span>
                </div>
    </div>
</div> 

      <div class="relative animate-fade-in-up" style="animation-delay: 0.3s;">
        <div class="absolute -top-6 -right-6 w-full h-full bg-[#E9762B] rounded-3xl opacity-10 transform rotate-3"></div>
        <div class="absolute -top-3 -right-3 w-full h-full bg-[#D0D5CB] rounded-3xl opacity-20 transform -rotate-2"></div>
        <img 
          src="https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?w=500&h=600&fit=crop" 
          alt="Anak-anak belajar bersama"
          class="relative rounded-3xl shadow-xl w-full h-[450px] object-cover animate-float"
        />
        
        <div class="absolute top-8 left-8 bg-[#0D4715] p-4 rounded-2xl shadow-lg animate-bounce-soft">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2zm20 0h-6a4 4 0 0 0-4 4v14a3 3 0 0 0 3-3h6z"/></svg>
        </div>
        
        <div class="absolute bottom-8 right-8 bg-[#E9762B] p-4 rounded-2xl shadow-lg animate-float" style="animation-delay: 1s;">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 12 20 22 4 22 4 12"/><rect x="2" y="7" width="20" height="5"/><path d="M12 7V2.5A2.5 2.5 0 0 1 14.5 0c1.38 0 2.5 1.12 2.5 2.5V7"/><path d="M12 7V2.5A2.5 2.5 0 0 0 9.5 0c-1.38 0-2.5 1.12-2.5 2.5V7"/></svg>
        </div>
        
        <div class="absolute top-1/2 -left-4 bg-[#41644A] p-3 rounded-xl shadow-lg animate-bounce-soft" style="animation-delay: 2s;">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="currentColor"><path d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>
        </div>
    </div>
    </div>
    </div>
</section>

<!-- Section Ajakan Berbuat Baik with Scrolling Image -->
<section id="goodness-section" class="py-20 md:py-28 bg-[#F3F2EB] relative overflow-hidden">
  <div class="container mx-auto px-6 relative z-10">
    <div class="text-center mb-16 animate-fade-in-up">
      <h2 class="text-4xl md:text-5xl font-bold text-[#0D4715] mb-6 leading-tight">
        Ayo Berbuat <span class="text-[#E9762B]">Kebaikan!</span>
      </h2>
      <p class="text-xl text-[#41644A] max-w-4xl mx-auto leading-relaxed font-medium">
        Setiap langkah kecil kebaikan yang kamu lakukan akan membawa perubahan besar bagi mereka yang membutuhkan.
        Mari bersama-sama menjadi bagian dari gerakan kebaikan.
      </p>
    </div>

    <div class="flex flex-col md:flex-row items-start gap-16">
      <!-- Left: Scrolling Text Blocks -->
      <div class="flex-1 relative">
        <div id="goodness-text-scroll-container" class="md:sticky md:top-28 h-[600px] overflow-y-auto pr-4 scrollbar-hide">
          <div class="flex flex-col gap-16" id="goodness-texts">
            <div class="goodness-block rounded-2xl p-8 transition-all duration-300 bg-[#F6F5F0] shadow-lg" data-img="0">
              <h3 class="text-3xl md:text-4xl font-bold text-[#41644A] mb-4">Kontribusi Kecil, Dampak Besar</h3>
              <p class="text-lg text-[#0D4715]">Tak perlu menunggu kaya untuk berbagi. Sumbangan waktu, tenaga, atau sekadar senyuman bisa menjadi cahaya harapan bagi anak-anak di panti asuhan. Yuk, mulai dari sekarang!</p>
    </div>
            <div class="goodness-block rounded-2xl p-8 transition-all duration-300 bg-[#F6F5F0] shadow-lg" data-img="1">
              <h3 class="text-3xl md:text-4xl font-bold text-[#E9762B] mb-4">Bersama, Kita Bisa!</h3>
              <p class="text-lg text-[#0D4715]">Bergabunglah dengan TitikKebaikan dan ribuan relawan lain untuk menciptakan lingkungan yang penuh kasih dan perhatian. Setiap kontribusi, sekecil apapun, sangat berarti.</p>
    </div>
            <div class="goodness-block rounded-2xl p-8 transition-all duration-300 bg-[#F6F5F0] shadow-lg" data-img="2">
      <h3 class="text-3xl md:text-4xl font-bold text-[#41644A] mb-4">Jadilah Inspirasi Kebaikan</h3>
      <p class="text-lg text-[#0D4715]">Ajak teman, keluarga, dan lingkunganmu untuk ikut berkontribusi. Bersama, kita bisa menularkan semangat kebaikan yang lebih luas.</p>
            </div>
            <div class="goodness-block rounded-2xl p-8 transition-all duration-300 bg-[#F6F5F0] shadow-lg" data-img="3">
              <h3 class="text-3xl md:text-4xl font-bold text-[#E9762B] mb-4">Waktu Adalah Hadiah Terindah</h3>
              <p class="text-lg text-[#0D4715]">Luangkan sedikit waktumu untuk berbagi cerita, mendengarkan, atau sekadar menemani. Hadiah waktu sangat berarti bagi mereka yang kesepian.</p>
            </div>
            <div class="goodness-block rounded-2xl p-8 transition-all duration-300 bg-[#F6F5F0] shadow-lg" data-img="4">
              <h3 class="text-3xl md:text-4xl font-bold text-[#41644A] mb-4">Bantu Dengan Hati</h3>
              <p class="text-lg text-[#0D4715]">Setiap bantuan, baik materi maupun non-materi, akan sangat membantu operasional panti asuhan. Mari salurkan bantuan dengan hati yang tulus.</p>
            </div>
          </div>
    </div>
  </div>

      <!-- Right: Scrolling Photo -->
      <div class="flex-1 flex items-center justify-center sticky top-28 h-screen-md max-h-[600px]">
    <div id="goodness-photo-wrapper" class="w-full max-w-md aspect-square flex items-center justify-center rounded-2xl overflow-hidden border-4 border-[#41644A] bg-[#F1F0E9] shadow-lg">
      <img id="goodness-photo" src="/images/PantiStock/1.jpg" alt="Ayo Berbuat Baik" class="object-cover w-full h-full transition-all duration-500" />
    </div>
  </div>
</div>
  </div>
</section>

@push('scripts')
<script src="/js/goodness-scroll.js"></script>
@endpush
@endsection 