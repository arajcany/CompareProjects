<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $leftProject
 * @var \App\Model\Entity\Project $rightProject
 * @var string $leftFile
 * @var string $rightFile
 */

use arajcany\ToolBox\Utility\Security\Security;

?>

<?php
echo $this->Html->css('diff-style');

// Include files for comparison
$leftFile = Security::decrypt64Url($leftFile);
$rightFile = Security::decrypt64Url($rightFile);

//convenience name of file
$relativePath = str_replace($leftProject->location, '', $leftFile);

$a = @explode("\n", file_get_contents($leftFile));
$b = @explode("\n", file_get_contents($rightFile));

// Options for generating the diff
$options = array(
    //'ignoreWhitespace' => true,
    //'ignoreCase' => true,
);

// Initialize the diff class
$diff = new Diff($a, $b, $options);
?>
<h2>Side by Side Diff of "<?= $relativePath ?>"</h2>

<?php
$opsLeft = [
    'data' => [
        'leftProjectId' => $leftProject->id,
        'rightProjectId' => $rightProject->id,
        'leftProjectName' => $leftProject->name,
        'rightProjectName' => $rightProject->name,
        'leftFile' => $leftFile,
        'rightFile' => $rightFile,
        'redirectLink' => [
            'controller' => 'compare',
            'action' => 'compare-projects',
            $leftProject->id,
            $rightProject->id,
            '#' => base64_encode($relativePath)
        ],
    ],
    'method' => 'post',
    'confirm' => __('Really Overwrite {0}?', $rightProject->name),
];
$leftToRightLink = $this->Form->postLink(__('Push {0} to {1}', "Below", $rightProject->name),
    ['action' => 'left-to-right'],
    $opsLeft);

$opsRight = [
    'data' => [
        'leftProjectId' => $leftProject->id,
        'rightProjectId' => $rightProject->id,
        'leftProjectName' => $leftProject->name,
        'rightProjectName' => $rightProject->name,
        'leftFile' => $leftFile,
        'rightFile' => $rightFile,
        'redirectLink' => [
            'controller' => 'compare',
            'action' => 'compare-projects',
            $leftProject->id,
            $rightProject->id,
            '#' => base64_encode($relativePath)
        ]
    ],
    'method' => 'post',
    'confirm' => __('Really Overwrite {0}?', $leftProject->name),
];
$rightToLeftLink = $this->Form->postLink(__('Push {0} to {1}', "Below", $leftProject->name),
    ['action' => 'right-to-left'],
    $opsRight); ?>

<div class="row">
    <div class="col-sm-12">
        <?php
        // Generate a side by side diff
        $renderer = new Diff_Renderer_Html_SideBySide;
        $tableHtml = $diff->Render($renderer);

        $newLeftHeading = $leftProject->name . " Version (" . $leftToRightLink . ")";
        $newRightHeading = $rightProject->name . " Version (" . $rightToLeftLink . ")";

        $tableHtml = str_replace("Old Version", $newLeftHeading, $tableHtml);
        $tableHtml = str_replace("New Version", $newRightHeading, $tableHtml);

        echo $tableHtml;
        ?>
    </div>
</div>

