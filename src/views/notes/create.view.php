<?php require base_path('views/partials/head.php'); ?>

<?php require base_path('views/partials/nav.php'); ?>

<?php require base_path('views/partials/banner.php'); ?>

<main>
    <div class="mx-auto max-w-4xl py-6 sm:px-6 lg:px-8">
        <div>
            <div class="mt-5 md:mt-0">
                <form action="/notes" method="POST">
                    <div class="space-y-6 bg-white px-4 py-5 sm:p-6">
                        <div>
                            <div class="col-span-full">
                                <label for="body" class="block text-sm font-medium leading-6 text-gray-900">Body</label>
                                <div class="mt-2">
                                    <textarea id="body" name="body" rows="3"
                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"><?= htmlspecialchars($_POST['body'] ?? '') ?></textarea>
                                    <?php if (isset($errors['body'])): ?>
                                        <p class="text-red-500 text-xs mt-2"><?= $errors['body'] ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <button type="submit"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php require base_path('views/partials/footer.php'); ?>