<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ExtensionList $extensionList
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Extension Lists'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="extensionLists form large-9 medium-8 columns content">
    <?= $this->Form->create($extensionList) ?>
    <fieldset>
        <legend><?= __('Add Extension List') ?></legend>
        <?php
        echo $this->Form->control('name');
        echo $this->Form->control('extension_list');

        $typeSelects = ['black' => 'Blacklist', 'white' => 'Whitelist'];
        $typeOpts = [
            'type' => 'select',
            'options' => $typeSelects,
        ];
        echo $this->Form->control('type', $typeOpts);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
