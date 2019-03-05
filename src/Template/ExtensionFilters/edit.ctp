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
                <li><?= $this->Form->postLink(
                        __('Delete'),
                        ['action' => 'delete', $extensionFilter->id],
                        ['confirm' => __('Are you sure you want to delete # {0}?', $extensionFilter->id)]
                    )
                    ?></li>
                <li><?= $this->Html->link(__('List Extension Filters'), ['action' => 'index']) ?></li>
            </ul>
        </nav>
    </div>
    <div class="col-md-10">
        <div class="extensionFilters form large-9 medium-8 columns content">
            <?= $this->Form->create($extensionFilter) ?>
            <fieldset>
                <legend><?= __('Edit Extension Filter') ?></legend>
                <?php
                $opts = [
                    'label' => [
                        'class' => 'col-form-label'
                    ],
                    'class' => 'form-control',
                ];

                echo $this->Form->control('name', $opts);
                echo $this->Form->control('extension_filter', $opts);

                $typeSelects = ['black' => 'Blacklist', 'white' => 'Whitelist'];
                $typeOpts = [
                    'label' => [
                        'class' => 'col-form-label'
                    ],
                    'type' => 'select',
                    'options' => $typeSelects,
                    'class' => 'form-control',
                ];
                echo $this->Form->control('type', $typeOpts);
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