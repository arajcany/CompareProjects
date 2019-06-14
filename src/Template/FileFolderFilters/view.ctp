<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FileFolderFilter $fileFolderFilter
 */
?>

<div class="row">
    <div class="col-md-2">
        <nav class="large-3 medium-4 columns" id="actions-sidebar">
            <h3><?= __('Actions') ?></h3>
            <ul class="side-nav">
                <li><?= $this->Html->link(__('Edit File Folder Filter'),
                        ['action' => 'edit', $fileFolderFilter->id]) ?> </li>
                <li><?= $this->Form->postLink(__('Delete File Folder Filter'),
                        ['action' => 'delete', $fileFolderFilter->id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $fileFolderFilter->id)]) ?> </li>
                <li><?= $this->Html->link(__('List File Folder Filters'), ['action' => 'index']) ?> </li>
                <li><?= $this->Html->link(__('New File Folder Filter'), ['action' => 'add']) ?> </li>
            </ul>
        </nav>
    </div>
    <div class="col-md-10">
        <div class="fileFolderFilters view large-9 medium-8 columns content">
            <h3><?= h($fileFolderFilter->name) ?></h3>
            <table class="table vertical-table">
                <tr>
                    <th scope="row"><?= __('Name') ?></th>
                    <td><?= h($fileFolderFilter->name) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('File Folder Filter') ?></th>
                    <td><?= h($fileFolderFilter->file_folder_filter) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Type') ?></th>
                    <td><?= h($fileFolderFilter->type) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Id') ?></th>
                    <td><?= $this->Number->format($fileFolderFilter->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Created') ?></th>
                    <td><?= h($fileFolderFilter->created) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Modified') ?></th>
                    <td><?= h($fileFolderFilter->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

