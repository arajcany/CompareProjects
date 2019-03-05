<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\FileFolderFilter $fileFolderFilter
 */
?>

<div class="row">
    <div class="col-md-2">
        <nav class="large-3 medium-4 columns" id="actions-sidebar">
            <h3><?= __('Actions') ?></h3>
            <ul class="side-nav">
                <li><?= $this->Html->link(__('List File Folder Filters'), ['action' => 'index']) ?></li>
            </ul>
        </nav>
    </div>
    <div class="col-md-10">
        <div class="fileFolderFilters form large-9 medium-8 columns content">
            <?= $this->Form->create($fileFolderFilter) ?>
            <fieldset>
                <legend><?= __('Add File Folder Filter') ?></legend>
                <?php
                $opts = [
                    'label' => [
                        'class' => 'col-form-label'
                    ],
                    'class' => 'form-control',
                ];

                echo $this->Form->control('name', $opts);
                echo $this->Form->control('file_folder_filter', $opts);
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