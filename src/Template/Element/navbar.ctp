<?php
/**
 * @var App\View\AppView $this
 */
?>
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <?php
    $title = 'Compare Projects';
    $url = ['controller' => 'Pages'];
    $options = [
        'class' => "navbar-brand"
    ];
    echo $this->Html->link($title, $url, $options)
    ?>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <?php
                $title = 'Projects';
                $url = ['controller' => 'projects'];
                $options = [
                    'class' => "nav-link"
                ];
                echo $this->Html->link($title, $url, $options)
                ?>
            </li>
            <li class="nav-item active">
                <?php
                $title = 'Extension Filters';
                $url = ['controller' => 'extension_filters'];
                $options = [
                    'class' => "nav-link"
                ];
                echo $this->Html->link($title, $url, $options)
                ?>
            </li>
            <li class="nav-item active">
                <?php
                $title = 'File/Folder Filters';
                $url = ['controller' => 'file_folder_filters'];
                $options = [
                    'class' => "nav-link"
                ];
                echo $this->Html->link($title, $url, $options)
                ?>
            </li>
            <li class="nav-item active">
                <?php
                $title = 'Compare';
                $url = ['controller' => 'select'];
                $options = [
                    'class' => "nav-link"
                ];
                echo $this->Html->link($title, $url, $options)
                ?>
            </li>

            <!--<li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>-->

        </ul>
    </div>
</nav>
