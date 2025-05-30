<nav class="bg-[#F1F0E9] border-b border-[#D0D5CB] shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20 items-center">
            <!-- Logo -->
            <div class="flex items-center gap-3">
                <a href="/" class="flex items-center gap-2">
                    <span class="inline-block bg-[#41644A] rounded-full p-2">
                        <!-- Icon/Logo Placeholder -->
                        <svg class="h-8 w-8 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor"><circle cx="12" cy="12" r="10" stroke-width="2" /></svg>
                    </span>
                    <span class="text-2xl font-bold text-[#41644A] tracking-wide">PantiCare</span>
                </a>
            </div>
            <!-- Desktop Menu -->
            <div class="hidden md:flex gap-2 lg:gap-6 items-center">
                <a href="/" class="px-4 py-2 rounded-md font-medium text-[#0D4715] hover:bg-[#D0D5CB] transition">Beranda</a>
                <a href="/berita" class="px-4 py-2 rounded-md font-medium text-[#0D4715] hover:bg-[#D0D5CB] transition">Berita</a>
                <a href="/daftar-panti" class="px-4 py-2 rounded-md font-medium text-[#0D4715] hover:bg-[#D0D5CB] transition">Daftar Panti</a>
                <a href="/kerjasama" class="px-4 py-2 rounded-md font-medium text-[#0D4715] hover:bg-[#D0D5CB] transition">Kerjasama Kami</a>
                <a href="/tentang" class="px-4 py-2 rounded-md font-medium text-[#0D4715] hover:bg-[#D0D5CB] transition">Tentang Kami</a>
            </div>
            <!-- Sign In Button -->
            <div class="flex items-center gap-2">
                <a href="/login" class="px-6 py-2 rounded-lg font-semibold text-white bg-[#E9762B] hover:bg-[#0D4715] transition shadow">Sign In</a>
                <!-- Hamburger -->
                <button class="md:hidden flex items-center p-2 rounded-lg text-[#41644A] hover:bg-[#D0D5CB]" id="mobile-menu-button">
                    <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                </button>
            </div>
        </div>
    </div>
    <!-- Mobile Menu -->
    <div class="md:hidden" id="mobile-menu" style="display:none;">
        <div class="px-4 pt-2 pb-4 space-y-1 bg-[#F3F2EB] border-t border-[#D0D5CB] shadow">
            <a href="/" class="block px-4 py-2 rounded-md font-medium text-[#0D4715] hover:bg-[#D0D5CB] transition">Beranda</a>
            <a href="/berita" class="block px-4 py-2 rounded-md font-medium text-[#0D4715] hover:bg-[#D0D5CB] transition">Berita</a>
            <a href="/daftar-panti" class="block px-4 py-2 rounded-md font-medium text-[#0D4715] hover:bg-[#D0D5CB] transition">Daftar Panti</a>
            <a href="/kerjasama" class="block px-4 py-2 rounded-md font-medium text-[#0D4715] hover:bg-[#D0D5CB] transition">Kerjasama Kami</a>
            <a href="/tentang" class="block px-4 py-2 rounded-md font-medium text-[#0D4715] hover:bg-[#D0D5CB] transition">Tentang Kami</a>
            <a href="/login" class="block px-4 py-2 rounded-lg font-semibold text-white bg-[#E9762B] hover:bg-[#0D4715] transition shadow mt-2">Sign In</a>
        </div>
    </div>
    <script>
        const btn = document.getElementById('mobile-menu-button');
        const menu = document.getElementById('mobile-menu');
        btn.addEventListener('click', () => {
            menu.style.display = menu.style.display === 'none' || menu.style.display === '' ? 'block' : 'none';
        });
    </script>
</nav>

<div class="w-full flex flex-col items-center border-t border-b border-dashed border-[#D0D5CB] py-10 mt-24 mb-24 overflow-hidden bg-transparent">
  <span class="text-2xl font-semibold text-[#41644A] mb-6 block w-full text-center">Partner Kami</span>
  <div class="w-full inline-flex flex-nowrap overflow-hidden [mask-image:_linear-gradient(to_right,transparent_0,_black_128px,_black_calc(100%-128px),transparent_100%)]">
    <ul class="flex items-center justify-center md:justify-start [&_li]:mx-8 animate-infinite-scroll">
      <!-- ...li partner... -->
    </ul>
    <ul class="flex items-center justify-center md:justify-start [&_li]:mx-8 animate-infinite-scroll" aria-hidden="true">
      <!-- ...li partner... -->
    </ul>
  </div>
</div>
