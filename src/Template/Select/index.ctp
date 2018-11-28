<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project[]|\Cake\Collection\CollectionInterface $projects
 */

?>

<div class="row">
    <div class="col-md-2">
        <nav class="large-3 medium-4 columns" id="actions-sidebar">
            <h3><?= __('Actions') ?></h3>
            <ul class="side-nav">
                <li><?= $this->Html->link(__('List Projects'), ['controller' => 'projects']) ?></li>
            </ul>
        </nav>
    </div>
    <div class="col-md-10">
        <div class="projects form large-9 medium-8 columns content">
            <?= $this->Form->create(null) ?>
            <fieldset>
                <legend><?= __('Compare Projects') ?></legend>
                <?php
                $opts = [
                    'label' => [
                        'class' => 'col-sm-2 col-form-label'
                    ],
                    'options' => $projects->toArray(),
                ];
                echo $this->Form->control('left-project', $opts);
                echo $this->Form->control('right-project', $opts);

                $opts = [
                    'label' => [
                        'class' => 'col-sm-2 col-form-label'
                    ],
                    'options' => $extensionLists->toArray(),
                    'empty' => [null => 'None'],
                ];
                echo $this->Form->control('extension-list', $opts);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Compare')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>


