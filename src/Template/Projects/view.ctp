<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>

<div class="row">
    <div class="col-md-2">
        <nav class="large-3 medium-4 columns" id="actions-sidebar">
            <h3><?= __('Actions') ?></h3>
            <ul class="side-nav">
                <li><?= $this->Html->link(__('Edit Project'), ['action' => 'edit', $project->id]) ?> </li>
                <li><?= $this->Form->postLink(__('Delete Project'), ['action' => 'delete', $project->id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $project->id)]) ?> </li>
                <li><?= $this->Html->link(__('List Projects'), ['action' => 'index']) ?> </li>
                <li><?= $this->Html->link(__('New Project'), ['action' => 'add']) ?> </li>
            </ul>
        </nav>
    </div>
    <div class="col-md-10">
        <div class="projects view large-9 medium-8 columns content">
            <h3><?= h($project->name) ?></h3>
            <table class="table vertical-table">
                <tr>
                    <th scope="row"><?= __('Name') ?></th>
                    <td><?= h($project->name) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Location') ?></th>
                    <td><?= h($project->location) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Id') ?></th>
                    <td><?= $this->Number->format($project->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Created') ?></th>
                    <td><?= h($project->created) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Modified') ?></th>
                    <td><?= h($project->modified) ?></td>
                </tr>
            </table>
            <div class="row">
                <div class="col-md-2">
                    <h4><?= __('Description') ?></h4>
                </div>
                <div class="col-md-10">
                    <?= $this->Text->autoParagraph(h($project->description)); ?>
                </div>
            </div>
        </div>
    </div>
</div>