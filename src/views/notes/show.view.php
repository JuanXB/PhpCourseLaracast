<?php require base_path('views/partials/head.php'); ?>

<?php require base_path('views/partials/nav.php'); ?>

<?php require base_path('views/partials/banner.php'); ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <p>
            <a class="text-blue-500 hover:underline" href="/notes">Go back notes...</a>
        </p>
        <p class="mt-4">
            <?= htmlspecialchars($note['body']) ?>
        </p>

        <div class="mt-6 flex items-center justify-start gap-x-6">
            <a href="/notes/edit?id=<?=$note['id']?>"
                class="rounded-md bg-gray-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Edit</a>
            <form class="" method="POST" action="/notes">
                <input type="hidden" name="__method" value="DELETE">
                <input type="hidden" name="id" value="<?= $note['id'] ?>">
                <button class="rounded-md bg-red-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-6000">Delete</button>
            </form>
        </div>

    </div>
</main>
<?php require base_path('views/partials/footer.php'); ?>