<?php if ($pager->getPageCount() > 1): // Periksa jika ada lebih dari satu halaman ?>
<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center">
        <!-- Tombol First -->
        <?php if ($pager->hasPrevious()): ?>
            <li class="page-item">
                <a class="page-link bg-primary text-white" href="<?= $pager->getFirst() ?>" aria-label="First">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
        <?php endif ?>

        <!-- Tombol Previous -->
        <?php if ($pager->hasPrevious()): ?>
            <li class="page-item">
                <a class="page-link bg-primary text-white" href="<?= $pager->getPreviousPage() ?>" aria-label="Previous">
                    <span aria-hidden="true">&lsaquo;</span>
                </a>
            </li>
        <?php endif ?>

        <!-- Tombol Pages -->
        <?php foreach ($pager->links() as $link): ?>
            <li class="page-item <?= $link['active'] ? 'active' : '' ?>">
                <a class="page-link <?= $link['active'] ? 'bg-dark text-white' : 'bg-primary text-white' ?>" href="<?= $link['uri'] ?>">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php endforeach ?>

        <!-- Tombol Next -->
        <?php if ($pager->hasNext()): ?>
            <li class="page-item">
                <a class="page-link bg-primary text-white" href="<?= $pager->getNextPage() ?>" aria-label="Next">
                    <span aria-hidden="true">&rsaquo;</span>
                </a>
            </li>
        <?php endif ?>

        <!-- Tombol Last -->
        <?php if ($pager->hasNext()): ?>
            <li class="page-item">
                <a class="page-link bg-primary text-white" href="<?= $pager->getLast() ?>" aria-label="Last">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        <?php endif ?>
    </ul>
</nav>
<?php endif ?>
