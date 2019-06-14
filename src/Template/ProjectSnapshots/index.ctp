<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectSnapshot[]|\Cake\Collection\CollectionInterface $projectSnapshots
 */
?>
<div class="row">
    <div class="col-md-2">
        <nav class="large-3 medium-4 columns" id="actions-sidebar">
            <h3><?= __('Actions') ?></h3>
            <ul class="side-nav">
                <li class="heading"><?= __('Actions') ?></li>
                <li><?= $this->Html->link(__('List Projects'),
                        ['controller' => 'Projects', 'action' => 'index']) ?></li>
                <li><?= $this->Html->link(__('New Project'), ['controller' => 'Projects', 'action' => 'add']) ?></li>
                <li><?= $this->Html->link(__('List File Snapshots'),
                        ['controller' => 'FileSnapshots', 'action' => 'index']) ?></li>
            </ul>
        </nav>
    </div>

    <div class="col-md-10">
        <div class="projectSnapshots index large-9 medium-8 columns content">
            <h3><?= __('Project Snapshots') ?></h3>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('project_id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('checksum') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('span') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($projectSnapshots as $projectSnapshot): ?>
                    <tr>
                        <td><?= $this->Number->format($projectSnapshot->id) ?></td>
                        <td><?= h($projectSnapshot->created) ?></td>
                        <td><?= h($projectSnapshot->modified) ?></td>
                        <td><?= $projectSnapshot->has('project') ? $this->Html->link($projectSnapshot->project->name,
                                [
                                    'controller' => 'Projects',
                                    'action' => 'view',
                                    $projectSnapshot->project->id
                                ]) : '' ?></td>
                        <td><?= h($projectSnapshot->checksum) ?></td>
                        <td><?= $this->Number->format($projectSnapshot->span) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $projectSnapshot->id]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            <div class="paginator">
                <ul class="pagination">
                    <?= $this->Paginator->first('<< ' . __('first')) ?>
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                    <?= $this->Paginator->last(__('last') . ' >>') ?>
                </ul>
                <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
            </div>
        </div>
    </div>
</div>
