<main class="profileMain">
    <?php foreach ($_SESSION["user"]["userInfo"] as $key => $item): ?>
        <div class="profileItem">
            <span class="profileKey"><?= $key ?></span>: <span class="profileParam"><?= $item ?></span>
        </div>
    <?php endforeach; ?>
</main>