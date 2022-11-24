 <?php
     $max = 7;
     $delta = 2;
     $string = '...';
     if($max <= 2*$delta + 3) $delta--;
?>
<?php if($paginator->hasPages()): ?>
    <ul class="pagination d-flex align-items-center">
        
        <?php if($paginator->lastPage() <= $max): ?>
            <?php for($i = 1; $i <= $paginator->lastPage(); $i++): ?>
                <li class="pagination-page">
                    <a href="<?php echo e($paginator->url($i)); ?>"
                       wire:click.prevent="gotoPage('<?php echo e($i); ?>')"
                       class="pagination-page_link d-flex align-items-center justify-content-center"
                       data-current="<?php echo e($paginator->currentPage() == $i ? 'true' : 'false'); ?>"
                    ><?php echo e($i); ?></a>
                </li>
            <?php endfor; ?>
       
        <?php else: ?>
             
            <?php if($paginator->currentPage() <= $delta + 2): ?>
               <?php for($i = 1; $i <= $max - 2; $i++): ?>
                   <li class="pagination-page">
                       <a
                               href="<?php echo e($paginator->url($i)); ?>"
                          wire:click.prevent="setPage('<?php echo e($i); ?>')"
                          class="pagination-page_link d-flex align-items-center justify-content-center"
                          data-current="<?php echo e($paginator->currentPage() == $i ? 'true' : 'false'); ?>"
                       ><?php echo e($i); ?></a>
                   </li>
               <?php endfor; ?>
                   <span><?php echo e($string); ?></span>
                   <li class="pagination-page">
                       <a class="pagination-page_link d-flex align-items-center justify-content-center"
                          wire:click.prevent="gotoPage('<?php echo e($paginator->lastPage()); ?>')"
                          href="<?php echo e($paginator->url($paginator->lastPage())); ?>"
                          data-current="<?php echo e($paginator->currentPage() == $paginator->lastPage() ? 'true' : 'false'); ?>"
                       ><?php echo e($paginator->lastPage()); ?></a>
                   </li>
            
            
            <?php elseif($paginator->currentPage() > $paginator->lastPage() - $delta - 2): ?>
                <li class="pagination-page">
                    <a
                            class="pagination-page_link d-flex align-items-center justify-content-center"
                            wire:click.prevent="gotoPage('1')"
                            href="<?php echo e($paginator->url(1)); ?>"
                            data-current="false"
                    >1</a
                    >
                </li>
                <span><?php echo e($string); ?></span>
                <?php for($i = $paginator->lastPage() - $max + 3; $i <= $paginator->lastPage() ; $i++): ?>
                    <li class="pagination-page">
                        <a
                                href="<?php echo e($paginator->url($i)); ?>"
                           wire:click.prevent="gotoPage('<?php echo e($i); ?>')"
                           class="pagination-page_link d-flex align-items-center justify-content-center"
                           data-current="<?php echo e($paginator->currentPage() == $i ? 'true' : 'false'); ?>"
                        ><?php echo e($i); ?></a>
                    </li>
                <?php endfor; ?>
             
            <?php else: ?>
                <li class="pagination-page">
                    <a
                            class="pagination-page_link d-flex align-items-center justify-content-center"
                            wire:click.prevent="gotoPage('1')"
                            href="<?php echo e($paginator->url(1)); ?>"
                            data-current="false"
                    >1</a
                    >
                </li>
                <span><?php echo e($string); ?></span>
                <?php for($i = $paginator->currentPage() - $delta; $i <= $paginator->currentPage() + $delta; $i++): ?>
                    <li class="pagination-page">
                        <a
                                href="<?php echo e($paginator->url($i)); ?>"
                           wire:click.prevent="gotoPage('<?php echo e($i); ?>')"
                           class="pagination-page_link d-flex align-items-center justify-content-center"
                           data-current="<?php echo e($paginator->currentPage() == $i ? 'true' : 'false'); ?>"
                        ><?php echo e($i); ?></a>
                    </li>
                <?php endfor; ?>
                <span><?php echo e($string); ?></span>
                <li class="pagination-page">
                    <a class="pagination-page_link d-flex align-items-center justify-content-center"
                       wire:click.prevent="gotoPage('<?php echo e($paginator->lastPage()); ?>')"
                       href="<?php echo e($paginator->url($paginator->lastPage())); ?>"
                       data-current="<?php echo e($paginator->currentPage() == $paginator->lastPage() ? 'true' : 'false'); ?>"
                    ><?php echo e($paginator->lastPage()); ?></a>
                </li>
            <?php endif; ?>
        <?php endif; ?>
    </ul>
<?php endif; ?><?php /**PATH G:\OpenServer\domains\ShopLaravel\resources\views/front/partials/paginator.blade.php ENDPATH**/ ?>