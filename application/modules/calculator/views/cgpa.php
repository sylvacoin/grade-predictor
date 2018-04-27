<div class="text-center">
    <i class="md md-stars text-accent" style="font-size: 6em;"></i>
    <?php if ( $cgpa == 0 ): ?>
    <p class="fa-3x">Oops</p><p class="fa-2x"> you currently don't have any result to calculate a C.G.P.A</p>

    <?php else: ?>
    <p class="fa-3x">Congratulations</p><p class="fa-2x"> you currently have a C.G.P.A of </p>
    <p class="fa-4x"><?= $cgpa ?></p>
    <?php endif; ?>
</div>