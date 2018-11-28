<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExtensionList $extensionList
 */
?>

<div class="row">
    <div class="col-md-2">
        <nav class="large-3 medium-4 columns" id="actions-sidebar">
            <h3><?= __('Actions') ?></h3>
            <ul class="side-nav">
                <li><?= $this->Html->link(__('Edit Extension List'), ['action' => 'edit', $extensionList->id]) ?> </li>
                <li><?= $this->Form->postLink(__('Delete Extension List'), ['action' => 'delete', $extensionList->id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $extensionList->id)]) ?> </li>
                <li><?= $this->Html->link(__('List Extension Lists'), ['action' => 'index']) ?> </li>
                <li><?= $this->Html->link(__('New Extension List'), ['action' => 'add']) ?> </li>
            </ul>
        </nav>
    </div>
    <div class="col-md-10">
        <div class="extensionLists view large-9 medium-8 columns content">
            <h3><?= h($extensionList->name) ?></h3>
            <table class="table vertical-table">
                <tr>
                    <th scope="row"><?= __('Name') ?></th>
                    <td><?= h($extensionList->name) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Extension List') ?></th>
                    <td><?= h($extensionList->extension_list) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Type') ?></th>
                    <td><?= h($extensionList->type) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Id') ?></th>
                    <td><?= $this->Number->format($extensionList->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Created') ?></th>
                    <td><?= h($extensionList->created) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Modified') ?></th>
                    <td><?= h($extensionList->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>

