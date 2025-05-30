@extends('layouts.app')
@section('content')
<!-- Hero Section -->
<div class="w-full py-16 px-4 flex flex-col md:flex-row items-center justify-between gap-8 max-w-6xl mx-auto mt-8">
    <div class="flex-1 flex flex-col gap-4">
        <div class="flex items-center gap-3">
            <span class="text-5xl md:text-6xl font-bold text-[#E9762B] italic drop-shadow-sm">Jembatan</span>
            <span class="inline-block bg-[#F1F0E9] rounded-full p-3 border-2 border-[#E9762B]">
                <!-- Icon: Bridge/Heart/Charity -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 48 48" class="w-12 h-12 text-[#41644A]"><path d="M8 32c0-8.837 7.163-16 16-16s16 7.163 16 16" stroke="currentColor" stroke-width="3" stroke-linecap="round"/><path d="M8 32h32" stroke="#E9762B" stroke-width="3" stroke-linecap="round"/><circle cx="24" cy="32" r="3.5" fill="#E9762B" stroke="#41644A" stroke-width="2"/></svg>
            </span>
            <span class="text-5xl md:text-6xl font-bold text-[#41644A] italic drop-shadow-sm">Kebaikan</span>
        </div>
        <div class="flex items-center gap-3 mt-2">
            <span class="text-4xl md:text-5xl font-semibold text-[#41644A] drop-shadow-sm">Wujudkan</span>
            <span class="inline-block bg-[#F1F0E9] rounded-xl p-2 border-2 border-[#41644A]">
                <!-- Icon: Star/Light/Idea -->
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 32 32" class="w-8 h-8 text-[#E9762B]"><path d="M16 4v8M16 20v8M4 16h8M20 16h8" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/><circle cx="16" cy="16" r="4" fill="#E9762B" stroke="#41644A" stroke-width="2"/></svg>
            </span>
            <span class="text-4xl md:text-5xl font-semibold text-[#E9762B] italic drop-shadow-sm">Harapan.</span>
        </div>
        <p class="mt-6 text-lg md:text-xl text-[#0D4715] max-w-xl">Kami hadir sebagai <span class='font-bold text-[#41644A]'>penghubung</span> antara kebaikan dan harapan, mempertemukan panti asuhan di Kota Malang dengan para dermawan dan relawan. <span class='font-bold text-[#E9762B]'>Bersama</span>, kita bisa mewujudkan masa depan yang lebih cerah dan penuh makna!</p>
    </div>
    <div class="flex-1 flex items-center justify-center">
        <!-- Ilustrasi lucu dan inspiratif -->
        <img src="https://fip.unj.ac.id/pls/wp-content/uploads/2023/06/Play-for-hope1.jpg" alt="Charity Illustration" class="w-72 md:w-96 bg-[#F1F0E9] rounded-xl border-2 border-[#41644A]" />
    </div>
</div>

<!-- Ajakan Daftar Panti Section -->
<div class="w-full max-w-6xl mx-auto mt-14 flex flex-col md:flex-row items-start md:items-center justify-between gap-2 px-20">
    <div class="flex-1 md:max-w-2xl">
        <h2 class="text-2xl md:text-3xl font-bold text-[#41644A] mb-2">Daftarkan <span class='text-[#E9762B]'>Panti Asuhan</span> Anda di Kota Malang!</h2>
        <p class="text-lg text-[#0D4715] mb-4 md:mb-0">Ayo, jadikan panti asuhan Anda bagian dari jaringan kebaikan di Kota Malang. Dengan mendaftarkan data panti, Anda membantu lebih banyak harapan terwujud dan memudahkan penyaluran bantuan secara tepat, transparan, dan profesional.</p>
    </div>
    <div class="flex-shrink-0 flex justify-center md:justify-start items-center w-full md:w-auto">
        <a href="/daftar-panti" class="inline-block px-10 py-4 rounded-full font-bold text-white bg-[#E9762B] hover:bg-[#41644A] text-xl transition-all duration-200 mt-6 md:mt-0 max-w-xs w-full text-center">Daftar Sekarang</a>
    </div>
</div>

<!-- Section Partner TitikKebaikan -->
<div class="w-1/2 max-w-6xl mx-auto mt-20 flex flex-col items-center px-4 pt-36 md:px-0">
    <!-- Logo TitikKebaikan -->
    <div class="mb-4 flex justify-center">
        <span class="inline-block bg-[#41644A] rounded-full p-4">
            <!-- Logo TitikKebaikan (dummy) -->
            <svg class="h-16 w-16 text-white" fill="none" viewBox="0 0 48 48" stroke="currentColor"><circle cx="24" cy="24" r="20" stroke-width="4" fill="#41644A"/><path d="M24 14v10l7 7" stroke="#E9762B" stroke-width="3" stroke-linecap="round"/></svg>
        </span>
    </div>
    <h2 class="text-4xl md:text-5xl font-bold text-[#232323] text-center mb-6">TitikKebaikan Partnership</h2>
    <p class="text-lg text-[#232323] text-center max-w-3xl mb-12">TitikKebaikan berkolaborasi dengan berbagai partner untuk memperluas jangkauan kebaikan dan memberikan dampak nyata bagi masyarakat. Bersama, kita membangun jembatan harapan untuk masa depan yang lebih baik.</p>
    <div class="w-full flex flex-col items-center md:items-start mb-8 md:mb-0 border-t border-b border-dashed border-[#D0D5CB] py-7 overflow-hidden bg-transparent">
    <span class="text-2xl font-semibold text-[#41644A] mb-6 block w-full text-center pb-10">Partner Kami</span>
    <div class="w-full inline-flex flex-nowrap overflow-hidden [mask-image:_linear-gradient(to_right,transparent_0,_black_128px,_black_calc(100%-128px),transparent_100%)]">
        <ul class="flex items-center justify-center md:justify-start [&_li]:mx-8 animate-infinite-scroll">
            <li class="flex flex-col items-center">
                <div class="h-24 w-24 md:h-32 md:w-32 flex items-center justify-center bg-[#41644A] rounded-full border-2 border-[#41644A] mb-2">
                    <span class="text-3xl md:text-4xl font-bold text-[#E9762B]">PK1</span>
                </div>
                <span class="font-semibold text-[#41644A] mt-2">Panti Kasih</span>
            </li>
            <li class="flex flex-col items-center">
                <div class="h-24 w-24 md:h-32 md:w-32 flex items-center justify-center bg-[#41644A] rounded-full border-2 border-[#41644A] mb-2">
                    <span class="text-3xl md:text-4xl font-bold text-[#E9762B]">PK2</span>
                </div>
                <span class="font-semibold text-[#41644A] mt-2">Rumah Harapan</span>
            </li>
            <li class="flex flex-col items-center">
                <div class="h-24 w-24 md:h-32 md:w-32 flex items-center justify-center bg-[#41644A] rounded-full border-2 border-[#41644A] mb-2">
                    <span class="text-3xl md:text-4xl font-bold text-[#E9762B]">PK3</span>
                </div>
                <span class="font-semibold text-[#41644A] mt-2">Sahabat Yatim</span>
            </li>
        </ul>
        <ul class="flex items-center justify-center md:justify-start [&_li]:mx-8 animate-infinite-scroll" aria-hidden="true">
            <li class="flex flex-col items-center">
                <div class="h-24 w-24 md:h-32 md:w-32 flex items-center justify-center bg-[#41644A] rounded-full border-2 border-[#41644A] mb-2">
                    <span class="text-3xl md:text-4xl font-bold text-[#E9762B]">PK1</span>
                </div>
                <span class="font-semibold text-[#41644A] mt-2">Panti Kasih</span>
            </li>
            <li class="flex flex-col items-center">
                <div class="h-24 w-24 md:h-32 md:w-32 flex items-center justify-center bg-[#41644A] rounded-full border-2 border-[#41644A] mb-2">
                    <span class="text-3xl md:text-4xl font-bold text-[#E9762B]">PK2</span>
                </div>
                <span class="font-semibold text-[#41644A] mt-2">Rumah Harapan</span>
            </li>
            <li class="flex flex-col items-center">
                <div class="h-24 w-24 md:h-32 md:w-32 flex items-center justify-center bg-[#41644A] rounded-full border-2 border-[#41644A] mb-2">
                    <span class="text-3xl md:text-4xl font-bold text-[#E9762B]">PK3</span>
                </div>
                <span class="font-semibold text-[#41644A] mt-2">Sahabat Yatim</span>
            </li>
        </ul>
    </div>
</div> 

<!-- Section Ajakan Berbuat Baik -->
<div id="goodness-section" class="w-full max-w-6xl mx-auto flex flex-col md:flex-row items-start gap-20 pt-56 mb-24 px-8 md:px-0">
  <!-- Kiri: Teks Ajakan (beberapa blok) -->
  <div class="flex-1 flex flex-col gap-16" id="goodness-texts">
    <div class="goodness-block rounded-2xl p-8  mb-4 transition-all duration-300 bg-[#F1F0E9]" data-img="1">
      <h3 class="text-3xl md:text-4xl font-bold text-[#41644A] mb-4">Ayo Berbuat Kebaikan!</h3>
      <p class="text-lg text-[#0D4715]">Setiap langkah kecil kebaikan yang kamu lakukan akan membawa perubahan besar bagi mereka yang membutuhkan. Mari bersama-sama menjadi bagian dari gerakan kebaikan untuk panti jompo di Kota Malang.</p>
    </div>
    <div class="goodness-block rounded-2xl p-8 mb-4 transition-all duration-300 bg-[#F1F0E9]" data-img="2">
      <h3 class="text-3xl md:text-4xl font-bold text-[#E9762B] mb-4">Kontribusi Kecil, Dampak Besar</h3>
      <p class="text-lg text-[#0D4715]">Tak perlu menunggu kaya untuk berbagi. Sumbangan waktu, tenaga, atau sekadar senyuman bisa menjadi cahaya harapan bagi para lansia di panti jompo. Yuk, mulai dari sekarang!</p>
    </div>
    <div class="goodness-block rounded-2xl p-8 mb-4 transition-all duration-300 bg-[#F1F0E9]" data-img="3">
      <h3 class="text-3xl md:text-4xl font-bold text-[#41644A] mb-4">Bersama, Kita Bisa!</h3>
      <p class="text-lg text-[#0D4715]">Bergabunglah dengan TitikKebaikan dan ribuan relawan lain untuk menciptakan lingkungan yang penuh kasih dan perhatian. Setiap kontribusi, sekecil apapun, sangat berarti.</p>
    </div>
    <div class="goodness-block rounded-2xl p-8 mb-4 transition-all duration-300 bg-[#F1F0E9]" data-img="4">
      <h3 class="text-3xl md:text-4xl font-bold text-[#E9762B] mb-4">Satu Senyuman, Seribu Harapan</h3>
      <p class="text-lg text-[#0D4715]">Senyuman dan sapaan hangatmu bisa menjadi penghibur hati bagi para lansia. Jadilah sumber kebahagiaan sederhana di hari-hari mereka.</p>
    </div>
    <div class="goodness-block rounded-2xl p-8 mb-4 transition-all duration-300 bg-[#F1F0E9]" data-img="5">
      <h3 class="text-3xl md:text-4xl font-bold text-[#41644A] mb-4">Waktu Adalah Hadiah Terindah</h3>
      <p class="text-lg text-[#0D4715]">Luangkan sedikit waktumu untuk berbagi cerita, mendengarkan, atau sekadar menemani. Hadiah waktu sangat berarti bagi mereka yang kesepian.</p>
    </div>
    <div class="goodness-block rounded-2xl p-8 mb-4 transition-all duration-300 bg-[#F1F0E9]" data-img="6">
      <h3 class="text-3xl md:text-4xl font-bold text-[#E9762B] mb-4">Bantu Dengan Hati</h3>
      <p class="text-lg text-[#0D4715]">Setiap bantuan, baik materi maupun non-materi, akan sangat membantu operasional panti jompo. Mari salurkan bantuan dengan hati yang tulus.</p>
    </div>
    <div class="goodness-block rounded-2xl p-8 mb-4 transition-all duration-300 bg-[#F1F0E9]" data-img="7">
      <h3 class="text-3xl md:text-4xl font-bold text-[#41644A] mb-4">Jadilah Inspirasi Kebaikan</h3>
      <p class="text-lg text-[#0D4715]">Ajak teman, keluarga, dan lingkunganmu untuk ikut berkontribusi. Bersama, kita bisa menularkan semangat kebaikan yang lebih luas.</p>
    </div>
  </div>
  <!-- Kanan: Foto yang berganti -->
  <div class="flex-1 flex items-center justify-center sticky top-32">
    <div id="goodness-photo-wrapper" class="w-full max-w-md aspect-square flex items-center justify-center rounded-2xl overflow-hidden border-4 border-[#41644A] bg-[#F1F0E9] shadow-lg">
      <img id="goodness-photo" src="/images/PantiStock/1.jpg" alt="Ayo Berbuat Baik" class="object-cover w-full h-full transition-all duration-500" />
    </div>
  </div>
</div>
<script src="/js/goodness-scroll.js"></script>
<script src="/partner-carousel.js"></script>
@endsection 