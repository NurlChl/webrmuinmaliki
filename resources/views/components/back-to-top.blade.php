<button id="back-to-top"
    class="fixed bottom-4 right-4 z-50 hidden bg-emerald-500 text-white rounded-full p-2 opacity-80 shadow-md hover:bg-emerald-700">
    <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
        height="24" fill="none" viewBox="0 0 24 24">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M12 6v13m0-13 4 4m-4-4-4 4" />
    </svg>

</button>

<script>
    // Saat halaman di-scroll
    window.onscroll = function() {
        var backToTopButton = document.getElementById("back-to-top");
        if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
            backToTopButton.style.display = "block"; // Tampilkan tombol
        } else {
            backToTopButton.style.display = "none"; // Sembunyikan tombol
        }
    };

    // Ketika tombol diklik
    document.getElementById("back-to-top").addEventListener("click", function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        }); // Scroll ke atas dengan smooth
    });
</script>
