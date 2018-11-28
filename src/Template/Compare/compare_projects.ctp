<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $leftProject
 * @var \App\Model\Entity\Project $rightProject
 * @var \App\Model\Entity\ExtensionList $extensionList
 * @var array $leftFileList
 * @var array $rightFileList
 */

use arajcany\ToolBox\Utility\Security\Security;

?>

<?php
$combinedRelativePaths = [];

$leftFileListMap = [];
foreach ($leftFileList as $leftFile) {
    $relativePath = str_replace($leftProject->location, '', $leftFile);
    $leftFileListMap[$relativePath] = [
        'path' => $leftFile,
        'sha1' => sha1_file($leftFile),
    ];
    $combinedRelativePaths[] = $relativePath;
}

$rightFileListMap = [];
foreach ($rightFileList as $rightFile) {
    $relativePath = str_replace($rightProject->location, '', $rightFile);
    $rightFileListMap[$relativePath] = [
        'path' => $rightFile,
        'sha1' => sha1_file($rightFile),
    ];
    $combinedRelativePaths[] = $relativePath;
}

$combinedRelativePaths = array_unique($combinedRelativePaths);
natsort($combinedRelativePaths);

$differenceList = [];
foreach ($combinedRelativePaths as $relativePath) {
    if (isset($leftFileListMap[$relativePath]) && isset($rightFileListMap[$relativePath])) {
        if ($leftFileListMap[$relativePath]['sha1'] == $rightFileListMap[$relativePath]['sha1']) {
            $differenceList[$relativePath] = [
                'left' => 'same',
                'right' => 'same'
            ];
        } else {
            $differenceList[$relativePath] = [
                'left' => 'modified',
                'right' => 'modified'
            ];
        }
    } else {
        if (isset($leftFileListMap[$relativePath]) && !isset($rightFileListMap[$relativePath])) {
            $differenceList[$relativePath] = [
                'left' => 'present',
                'right' => 'missing'
            ];
        } else {
            $differenceList[$relativePath] = [
                'left' => 'missing',
                'right' => 'present'
            ];
        }
    }

    //add the grouping
    $grouping = explode(DS, $relativePath);
    array_pop($grouping);
    $grouping = array_slice($grouping, 0, 3);
    $grouping = implode(DS, $grouping);
    $differenceList[$relativePath]['grouping'] = $grouping;
}

?>
<div class="row">
    <div class="col-sm-12">
        <?php
        $optsAll = [
            'class' => 'btn btn-secondary mb-3 mr-3',
            'id' => 'filter-by-all',
        ];
        $optsSame = [
            'class' => 'btn btn-secondary mb-3 mr-3',
            'id' => 'filter-by-same',
        ];
        $optsModified = [
            'class' => 'btn btn-secondary mb-3 mr-3',
            'id' => 'filter-by-modified',
        ];
        $optsMissing = [
            'class' => 'btn btn-secondary mb-3 mr-3',
            'id' => 'filter-by-missing',
        ];

        echo $this->Form->button('All', $optsAll);
        echo $this->Form->button('Same', $optsSame);
        echo $this->Form->button('Modified', $optsModified);
        echo $this->Form->button('Missing', $optsMissing);
        ?>
        <?php
        $this->append('viewCustomScripts');
        ?>
        <script>
            $(document).ready(function () {
                $("#filter-by-all").on("click", function () {
                    $('.file').removeClass('d-none');
                });

                $("#filter-by-same").on("click", function () {
                    $('.file').removeClass('d-none').addClass('d-none');
                    $('.file-same').removeClass('d-none');
                });

                $("#filter-by-modified").on("click", function () {
                    $('.file').removeClass('d-none').addClass('d-none');
                    $('.file-modified').removeClass('d-none');
                });

                $("#filter-by-missing").on("click", function () {
                    $('.file').removeClass('d-none').addClass('d-none');
                    $('.file-missing').removeClass('d-none');
                });
            });
        </script>
        <?php
        $this->end();
        ?>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <table class="table table-bordered table-sm table-hover">
            <thead>
            <tr>
                <th>Relative File Path</th>
                <th><?= $leftProject->name ?> Status</th>
                <th><?= $rightProject->name ?> Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $counter = 1;
            $previousGroup = '';
            $currentGroup = '';
            foreach ($differenceList as $path => $item) {
                $currentGroup = $item['grouping'];

                if ($item['left'] == 'same' || $item['right'] == 'same') {
                    $fileClass = 'file-same';
                } elseif ($item['left'] == 'modified' || $item['right'] == 'modified') {
                    $fileClass = 'file-modified';
                } elseif ($item['left'] == 'missing' || $item['right'] == 'missing') {
                    $fileClass = 'file-missing';
                } else {
                    $fileClass = 'file-same';
                }

                if ($item['left'] == 'same') {
                    $leftColour = 'green';
                    $leftClass = 'file-same';
                } elseif ($item['left'] == 'modified') {
                    $leftColour = 'orange';
                    $leftClass = 'file-modified';
                } elseif ($item['left'] == 'present') {
                    $leftColour = 'green';
                    $leftClass = 'file-present';
                } elseif ($item['left'] == 'missing') {
                    $leftColour = 'red';
                    $leftClass = 'file-missing';
                } else {
                    $leftColour = 'black';
                    $leftClass = '';
                }

                if ($item['right'] == 'same') {
                    $rightColour = 'green';
                    $rightClass = 'file-same';
                } elseif ($item['right'] == 'modified') {
                    $rightColour = 'orange';
                    $rightClass = 'file-modified';
                } elseif ($item['right'] == 'present') {
                    $rightColour = 'green';
                    $rightClass = 'file-present';
                } elseif ($item['right'] == 'missing') {
                    $rightColour = 'red';
                    $rightClass = 'file-missing';
                } else {
                    $rightColour = 'black';
                    $rightClass = '';
                }

                ?>
                <tr class="file <?= $fileClass ?>">
                    <td style="color:black">
                        <?php echo $path; ?>
                    </td>
                    <td style="color:<?= $leftColour; ?>" class="<?= $leftClass; ?>">
                        <?php echo $item['left']; ?>
                    </td>
                    <td style="color:<?= $rightColour; ?>" class="<?= $rightClass; ?>">
                        <?php echo $item['right']; ?>
                    </td>
                    <td style="color:black">
                        <?php
                        $url = [
                            'action' => 'compare-files',
                            $leftProject->id,
                            $rightProject->id,
                            Security::encrypt64Url($leftProject->location . $path),
                            Security::encrypt64Url($rightProject->location . $path)
                        ];

                        //diff viewer
                        if ($item['left'] == 'modified' || $item['right'] == 'modified') {
                            echo $this->Html->link('Diff', $url);
                        }

                        ?>
                        <a name="<?= base64_encode($path) ?>"></a>
                    </td>
                </tr>

                <?php
                if ($previousGroup != $currentGroup) {
                    ?>
                    <tr>
                        <th>Relative File Path</th>
                        <th><?= $leftProject->name ?> Status</th>
                        <th><?= $rightProject->name ?> Status</th>
                        <th>Actions</th>
                    </tr>
                    <?php
                }

                $previousGroup = $item['grouping'];
                $counter++;
                ?>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

