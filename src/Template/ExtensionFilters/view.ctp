<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExtensionFilter $extensionFilter
 */
?>

<div class="row">
    <div class="col-md-2">
        <nav class="large-3 medium-4 columns" id="actions-sidebar">
            <h3><?= __('Actions') ?></h3>
            <ul class="side-nav">
                <li><?= $this->Html->link(__('Edit Extension Filter'),
                        ['action' => 'edit', $extensionFilter->id]) ?> </li>
                <li><?= $this->Form->postLink(__('Delete Extension Filter'),
                        ['action' => 'delete', $extensionFilter->id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $extensionFilter->id)]) ?> </li>
                <li><?= $this->Html->link(__('List Extension Filters'), ['action' => 'index']) ?> </li>
                <li><?= $this->Html->link(__('New Extension Filter'), ['action' => 'add']) ?> </li>
            </ul>
        </nav>
    </div>
    <div class="col-md-10">
        <div class="extensionFilters view large-9 medium-8 columns content">
            <h3><?= h($extensionFilter->name) ?></h3>
            <table class="table vertical-table">
                <tr>
                    <th scope="row"><?= __('Name') ?></th>
                    <td><?= h($extensionFilter->name) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Extension Filter') ?></th>
                    <td><?= h($extensionFilter->extension_filter) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Type') ?></th>
                    <td><?= h($extensionFilter->type) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Id') ?></th>
                    <td><?= $this->Number->format($extensionFilter->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Created') ?></th>
                    <td><?= h($extensionFilter->created) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Modified') ?></th>
                    <td><?= h($extensionFilter->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

