<nav class="fixed left-1/2 top-6 z-50 -translate-x-1/2 bg-[#F1F0E9] border border-[#D0D5CB] shadow-lg rounded-full px-8 py-2 w-[95vw] max-w-6xl flex items-center justify-between backdrop-blur-md">
    <!-- Logo -->
    <div class="flex items-center gap-3">
        <a href="/" class="flex items-center gap-2">
            <img src="/images/titik_kebaikan_logo.jpg" alt="Titik Kebaikan Logo" class="h-10 w-auto"/>
        </a>
    </div>
    <!-- Desktop Menu -->
    <div class="hidden xl:flex gap-8 items-center justify-center flex-1">
        <a href="/" class="px-4 py-2 rounded-md font-bold text-black hover:bg-[#D0D5CB] transition">Beranda</a>
        <a href="/berita" class="px-4 py-2 rounded-md font-bold text-black hover:bg-[#D0D5CB] transition">Berita</a>
        <a href="/daftar-panti" class="px-4 py-2 rounded-md font-bold text-black hover:bg-[#D0D5CB] transition">Daftar Panti</a>
        <a href="/kerjasama" class="px-4 py-2 rounded-md font-bold text-black hover:bg-[#D0D5CB] transition">Kerjasama Kami</a>
        <a href="/tentang" class="px-4 py-2 rounded-md font-bold text-black hover:bg-[#D0D5CB] transition">Tentang Kami</a>
    </div>
    <!-- Sign In Button -->
    <div class="flex items-center gap-2">
        @auth
            @if(Auth::user()->is_admin == 1)
                <a href="{{ route('admin.dashboard') }}" class="hidden xl:inline px-8 py-2 rounded-full font-bold text-black border-2 border-[#0D4715] bg-white hover:bg-[#E9762B] hover:text-white transition shadow">Admin Dashboard</a>
            @endif
            <form method="POST" action="{{ route('logout') }}" class="hidden xl:inline">
                @csrf
                <button type="submit" class="px-8 py-2 rounded-full font-bold text-black border-2 border-[#E9762B] bg-white hover:bg-[#E9762B] hover:text-white transition shadow">Log Out</button>
            </form>
        @else
            <a href="/login" class="hidden xl:inline px-8 py-2 rounded-full font-bold text-black border-2 border-[#0D4715] bg-white hover:bg-[#E9762B] hover:text-white transition shadow">Sign In</a>
        @endauth
        <!-- Hamburger -->
        <button class="xl:hidden flex items-center p-2 rounded-lg text-[#41644A] hover:bg-[#D0D5CB]" id="mobile-menu-button">
            <svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
        </button>
    </div>
    <!-- Mobile Menu -->
    <div class="xl:hidden absolute left-0 top-full mt-2 w-full bg-white border border-[#D0D5CB] rounded-xl shadow-lg" id="mobile-menu" style="display:none;">
        <div class="px-4 pt-2 pb-4 space-y-1">
            <a href="/" class="block px-4 py-2 rounded-md font-bold text-black hover:bg-[#D0D5CB] transition">Beranda</a>
            <a href="/berita" class="block px-4 py-2 rounded-md font-bold text-black hover:bg-[#D0D5CB] transition">Berita</a>
            <a href="/daftar-panti" class="block px-4 py-2 rounded-md font-bold text-black hover:bg-[#D0D5CB] transition">Daftar Panti</a>
            <a href="/kerjasama" class="block px-4 py-2 rounded-md font-bold text-black hover:bg-[#D0D5CB] transition">Kerjasama Kami</a>
            <a href="/tentang" class="block px-4 py-2 rounded-md font-bold text-black hover:bg-[#D0D5CB] transition">Tentang Kami</a>
            @auth
                @if(Auth::user()->is_admin == 1)
                    <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 rounded-full font-bold text-black border-2 border-[#0D4715] bg-white hover:bg-[#E9762B] hover:text-white transition shadow mt-2">Admin Dashboard</a>
                @endif
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left px-4 py-2 rounded-full font-bold text-black border-2 border-[#E9762B] bg-white hover:bg-[#E9762B] hover:text-white transition shadow mt-2">Log Out</button>
                </form>
            @else
                <a href="/login" class="block px-4 py-2 rounded-full font-bold text-black border-2 border-[#0D4715] bg-white hover:bg-[#E9762B] hover:text-white transition shadow mt-2">Sign In</a>
            @endauth
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