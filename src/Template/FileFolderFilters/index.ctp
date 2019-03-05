<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FileFolderFilter[]|\Cake\Collection\CollectionInterface $fileFolderFilters
 */
?>

<div class="row">
    <div class="col-md-2">
        <nav class="large-3 medium-4 columns" id="actions-sidebar">
            <h3><?= __('Actions') ?></h3>
            <ul class="side-nav">
                <li><?= $this->Html->link(__('New File Folder Filter'), ['action' => 'add']) ?></li>
            </ul>
        </nav>
    </div>

    <div class="col-md-10">
        <div class="fileFolderFilters index large-9 medium-8 columns content">
            <h3><?= __('File Folder Filters') ?></h3>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('file_folder_filter') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($fileFolderFilters as $fileFolderFilter): ?>
                    <tr>
                        <td><?= $this->Number->format($fileFolderFilter->id) ?></td>
                        <td><?= h($fileFolderFilter->name) ?></td>
                        <td><?= h($fileFolderFilter->file_folder_filter) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $fileFolderFilter->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $fileFolderFilter->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $fileFolderFilter->id],
                                ['confirm' => __('Are you sure you want to delete # {0}?', $fileFolderFilter->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <?php
                    $templatesOriginal = $this->Paginator->getTemplates();
                    $templates = [
                        'nextActive' => '<li class="page-item next"><a class="page-link" rel="next" href="{{url}}">{{text}}</a></li>',
                        'nextDisabled' => '<li class="page-item next disabled"><a class="page-link" href="" onclick="return false;">{{text}}</a></li>',
                        'prevActive' => '<li class="page-item prev"><a class="page-link" rel="prev" href="{{url}}">{{text}}</a></li>',
                        'prevDisabled' => '<li class="page-item prev disabled"><a class="page-link" href="" onclick="return false;">{{text}}</a></li>',
                        'counterRange' => '{{start}} - {{end}} of {{count}}',
                        'counterPages' => '{{page}} of {{pages}}',
                        'first' => '<li class="page-item first"><a href="{{url}}">{{text}}</a></li>',
                        'last' => '<li class="page-item last"><a href="{{url}}">{{text}}</a></li>',
                        'number' => '<li><a class="page-link" href="{{url}}">{{text}}</a></li>',
                        'current' => '<li class="page-item active"><a class="page-link" href="">{{text}}</a></li>',
                        'ellipsis' => '<li class="page-item ellipsis">&hellip;</li>',
                        'sort' => '<a href="{{url}}">{{text}}</a>',
                        'sortAsc' => '<a class="asc" href="{{url}}">{{text}}</a>',
                        'sortDesc' => '<a class="desc" href="{{url}}">{{text}}</a>',
                        'sortAscLocked' => '<a class="asc locked" href="{{url}}">{{text}}</a>',
                        'sortDescLocked' => '<a class="desc locked" href="{{url}}">{{text}}</a>',
                    ];
                    $this->Paginator->setTemplates($templates);
                    ?>
                    <?= $this->Paginator->first('<< ' . __('first')) ?>
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                    <?= $this->Paginator->last(__('last') . ' >>') ?>
                    <?php
                    $this->Paginator->setTemplates($templatesOriginal);
                    ?>
                </ul>
                <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
            </nav>
        </div>
    </div>
</div>