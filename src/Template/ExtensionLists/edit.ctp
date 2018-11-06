<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExtensionList $extensionList
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $extensionList->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $extensionList->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Extension Lists'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="extensionLists form large-9 medium-8 columns content">
    <?= $this->Form->create($extensionList) ?>
    <fieldset>
        <legend><?= __('Edit Extension List') ?></legend>
        <?php
            echo $this->Form->control('name');
            echo $this->Form->control('extension_list');
            echo $this->Form->control('type');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
