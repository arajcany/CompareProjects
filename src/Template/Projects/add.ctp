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
                <li><?= $this->Html->link(__('List Projects'), ['action' => 'index']) ?></li>
            </ul>
        </nav>
    </div>
    <div class="col-md-10">
        <div class="projects form large-9 medium-8 columns content">
            <?= $this->Form->create($project) ?>
            <fieldset>
                <legend><?= __('Add Project') ?></legend>
                <?php
                $opts = [
                    'label' => [
                        'class' => 'col-form-label'
                    ],
                    'class' => 'form-control',
                ];

                echo $this->Form->control('name', $opts);
                echo $this->Form->control('description', $opts);
                echo $this->Form->control('location', $opts);
                ?>
            </fieldset>
            <?php
            $btnOpts = [
                'class' => "btn btn-primary mt-4",
            ];
            ?>
            <?= $this->Form->button(__('Submit'), $btnOpts) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>