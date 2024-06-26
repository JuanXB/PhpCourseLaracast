<?php require base_path('views/partials/head.php'); ?>

<?php require base_path('views/partials/nav.php'); ?>

<?php require base_path('views/partials/banner.php'); ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <?php foreach ($notes as $note): ?>
            <li><a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">
                    <?= htmlspecialchars($note['body']) ?>
                </a></li>
        <?php endforeach; ?>
        <div class="mt-5">
            <a href="/note/create" class="text-blue-500 hover:underline">
                New note ...
            </a>
        </div>
    </div>

</main>
<?php require base_path('views/partials/footer.php'); ?>