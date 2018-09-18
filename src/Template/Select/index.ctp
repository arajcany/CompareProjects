<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project[]|\Cake\Collection\CollectionInterface $projects
 */

?>

<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Projects'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="projects form large-9 medium-8 columns content">
    <?= $this->Form->create(null) ?>
    <fieldset>
        <legend><?= __('Compare Projects') ?></legend>
        <?php
        $opts = [
            'options' => $projects->toArray(),
        ];
        echo $this->Form->control('left-project', $opts);
        echo $this->Form->control('right-project', $opts);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Compare')) ?>
    <?= $this->Form->end() ?>
</div>