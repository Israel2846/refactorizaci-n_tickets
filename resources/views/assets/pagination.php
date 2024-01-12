<div class="ui pagination menu">
    <a href="<?= $$paginate['prev_page_url'] ?><?= isset($_GET['search']) ? "&search={$_GET['search']}" : '' ?>" class="item">Prev</a>

    <?php
    $currentPage = $$paginate['current_page'];
    $lastPage = $$paginate['last_page'];

    // Determinar el rango de páginas a mostrar
    $startPage = max(1, min($currentPage - 2, $lastPage - 4));
    $endPage = min($lastPage, $startPage + 4);

    if ($startPage > 1) : ?>
        <a href="/usuario?page=1<?= isset($_GET['search']) ? "&search={$_GET['search']}" : '' ?>" class="item">1</a>
        <?php if ($startPage > 2) : ?>
            <!-- Agregar puntos suspensivos si hay más de 2 páginas al inicio -->
            <span class="item">...</span>
        <?php endif ?>
    <?php endif ?>

    <?php
    // Mostrar las páginas dentro del rango
    for ($i = $startPage; $i <= $endPage; $i++) :
    ?>
        <a href="/usuario?page=<?= $i ?><?= isset($_GET['search']) ? "&search={$_GET['search']}" : '' ?>" class="<?= $currentPage == $i ? 'active' : '' ?> item"><?= $i ?></a>
    <?php endfor ?>

    <?php if ($endPage < $lastPage) : ?>
        <?php if ($endPage < $lastPage - 1) : ?>
            <!-- Agregar puntos suspensivos si hay más de 2 páginas al final -->
            <span class="item">...</span>
        <?php endif ?>
        <a href="/usuario?page=<?= $lastPage ?><?= isset($_GET['search']) ? "&search={$_GET['search']}" : '' ?>" class="item"><?= $lastPage ?></a>
    <?php endif ?>

    <a href="<?= $$paginate['next_page_url'] ?><?= isset($_GET['search']) ? "&search={$_GET['search']}" : '' ?>" class=" item">Next</a>
</div>
