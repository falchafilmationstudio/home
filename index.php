<?php
require_once __DIR__ . '/data.php';
require_once __DIR__ . '/header.php';
?>

<!-- Pass categories into JS for interactive switching -->
<script>
    const categoriesData = <?php echo json_encode($categories); ?>;
</script>

<!-- Main Stage: Showcase Video and 3 Category Cards -->
<main class="flex-1 flex flex-col items-center justify-center w-full px-2 sm:px-4 my-auto py-2 sm:py-4">

    <!-- Featured Video Player Frame -->
    <div class="relative w-full max-w-[620px] sm:max-w-[700px] md:max-w-[760px] lg:max-w-[800px] mx-auto px-4 sm:px-6 mt-0 sm:mt-1 md:mt-2 mb-4 sm:mb-6 md:mb-7">
        <div class="absolute -inset-1 sm:-inset-2 rounded-2xl md:rounded-3xl opacity-50 blur-xl pointer-events-none -z-10" style="background: radial-gradient(circle at 50% 50%, rgba(255, 255, 255, 0.08) 0%, rgba(120, 160, 200, 0.03) 50%, transparent 80%);"></div>

        <div id="heroPlayAction" onclick="playVideo('<?php echo addslashes($mainShowreel['title']); ?>', '<?php echo addslashes($mainShowreel['nepaliTitle']); ?>', '<?php echo addslashes($mainShowreel['videoUrl']); ?>', '<?php echo addslashes($mainShowreel['synopsis']); ?>')" class="group relative w-full aspect-[16/9] rounded-xl sm:rounded-2xl overflow-hidden bg-black border border-white/20 shadow-[0_12px_36px_rgba(0,0,0,0.8)] cursor-pointer transition-all duration-300 hover:border-white/40 hover:shadow-[0_16px_48px_rgba(0,0,0,0.9)]">
            <img id="heroPosterImage" src="<?php echo htmlspecialchars($mainShowreel['thumbnail']); ?>" alt="<?php echo htmlspecialchars($mainShowreel['title']); ?>" class="w-full h-full object-cover filter brightness-95 group-hover:scale-[1.02] transition-transform duration-700 ease-out">
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-black/30 pointer-events-none"></div>

            <!-- Center Play Button -->
            <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                <div class="w-13 h-13 sm:w-16 sm:h-16 md:w-[72px] md:h-[72px] rounded-full bg-black/60 backdrop-blur-md border border-white/30 flex items-center justify-center text-white shadow-[0_4px_24px_rgba(0,0,0,0.7)] group-hover:bg-black/80 group-hover:scale-110 group-hover:border-white/60 transition-all duration-300">
                    <svg class="w-6 h-6 sm:w-7 sm:h-7 md:w-8 md:h-8 fill-white text-white ml-1" viewBox="0 0 24 24"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
                </div>
            </div>

            <!-- Film Info Badge on bottom left -->
            <div class="absolute bottom-3 left-3 sm:bottom-4 sm:left-4 right-4 flex items-end justify-between pointer-events-none opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                <div class="bg-black/70 backdrop-blur-md px-3 py-1.5 rounded-lg border border-white/10 max-w-[80%]">
                    <p id="heroFilmTitle" class="text-[11px] sm:text-xs font-semibold text-white truncate font-montserrat">
                        <?php echo htmlspecialchars($mainShowreel['title']); ?>
                    </p>
                    <p class="text-[10px] text-slate-300 font-devanagari truncate">
                        <?php echo htmlspecialchars($mainShowreel['nepaliTitle']); ?>
                    </p>
                </div>
                <div class="bg-white/10 backdrop-blur-md px-2.5 py-1 rounded-md text-[10px] font-medium text-slate-200 uppercase tracking-widest font-montserrat border border-white/10">
                    <?php echo htmlspecialchars($mainShowreel['duration']); ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Category Cards (DOCUMENTARIES, COMMERCIALS, SHORT FILMS) -->
    <div class="w-full max-w-[820px] mx-auto px-4 sm:px-6 mt-1 mb-8 md:mb-12">
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 sm:gap-4 md:gap-6 items-start">
            <?php foreach ($categories as $catKey => $cat): ?>
            <div id="card-<?php echo $catKey; ?>" onclick="selectCategory('<?php echo $catKey; ?>')" class="cat-card flex flex-col items-center group cursor-pointer transition-transform duration-300 hover:-translate-y-1">
                <div class="relative w-full aspect-[16/10] sm:aspect-[16/10.5] rounded-xl sm:rounded-2xl overflow-hidden bg-black transition-all duration-300 shadow-lg group-hover:scale-[1.01]" style="border: 2px solid <?php echo $cat['borderHex']; ?>; box-shadow: 0 4px 16px rgba(0,0,0,0.6);">
                    <img src="<?php echo htmlspecialchars($cat['thumbnail']); ?>" alt="<?php echo htmlspecialchars($cat['title']); ?>" class="w-full h-full object-cover filter brightness-[0.98] group-hover:brightness-105 group-hover:scale-105 transition-all duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-60 group-hover:opacity-30 transition-opacity"></div>
                </div>
                <div class="flex flex-col items-center mt-2.5 sm:mt-3 text-center">
                    <h3 class="font-montserrat text-xs sm:text-[13px] md:text-sm font-extrabold tracking-[0.16em] text-white uppercase group-hover:text-slate-100 transition-colors">
                        <?php echo htmlspecialchars($cat['title']); ?>
                    </h3>
                    <p class="font-devanagari text-[11px] sm:text-xs text-slate-300/90 tracking-wider mt-0.5">
                        <?php echo htmlspecialchars($cat['devanagari']); ?>
                    </p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

</main>

<?php require_once __DIR__ . '/footer.php'; ?>
