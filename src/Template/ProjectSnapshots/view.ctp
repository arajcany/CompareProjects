<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectSnapshot $projectSnapshot
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
        <div class="projectSnapshots view large-9 medium-8 columns content">
            <h3><?= h($projectSnapshot->id) ?></h3>
            <table class="vertical-table">
                <tr>
                    <th scope="row"><?= __('Project') ?></th>
                    <td><?= $projectSnapshot->has('project') ? $this->Html->link($projectSnapshot->project->name,
                            [
                                'controller' => 'Projects',
                                'action' => 'view',
                                $projectSnapshot->project->id
                            ]) : '' ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Checksum') ?></th>
                    <td><?= h($projectSnapshot->checksum) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Id') ?></th>
                    <td><?= $this->Number->format($projectSnapshot->id) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Span') ?></th>
                    <td><?= $this->Number->format($projectSnapshot->span) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Created') ?></th>
                    <td><?= h($projectSnapshot->created) ?></td>
                </tr>
                <tr>
                    <th scope="row"><?= __('Modified') ?></th>
                    <td><?= h($projectSnapshot->modified) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related File Snapshots') ?></h4>
                <?php if (!empty($projectSnapshot->file_snapshots)): ?>
                    <table cellpadding="0" cellspacing="0">
                        <tr>
                            <th scope="col"><?= __('Id') ?></th>
                            <th scope="col"><?= __('Created') ?></th>
                            <th scope="col"><?= __('Modified') ?></th>
                            <th scope="col"><?= __('Project Snapshot Id') ?></th>
                            <th scope="col"><?= __('Filepath') ?></th>
                            <th scope="col"><?= __('Checksum') ?></th>
                            <th scope="col" class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($projectSnapshot->file_snapshots as $fileSnapshots): ?>
                            <tr>
                                <td><?= h($fileSnapshots->id) ?></td>
                                <td><?= h($fileSnapshots->created) ?></td>
                                <td><?= h($fileSnapshots->modified) ?></td>
                                <td><?= h($fileSnapshots->project_snapshot_id) ?></td>
                                <td><?= h($fileSnapshots->filepath) ?></td>
                                <td><?= h($fileSnapshots->checksum) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'),
                                        ['controller' => 'FileSnapshots', 'action' => 'view', $fileSnapshots->id]) ?>
                                    <?= $this->Html->link(__('Edit'),
                                        ['controller' => 'FileSnapshots', 'action' => 'edit', $fileSnapshots->id]) ?>
                                    <?= $this->Form->postLink(__('Delete'),
                                        ['controller' => 'FileSnapshots', 'action' => 'delete', $fileSnapshots->id],
                                        [
                                            'confirm' => __('Are you sure you want to delete # {0}?',
                                                $fileSnapshots->id)
                                        ]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
