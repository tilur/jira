<?php require('layout-head.php'); ?>

<div class="navbar navbar-inverse">
    <div class="navbar-inner">
        <div class="container">
            <div class="nav-collapse collapse" id="nav-collapse-01">
                <ul class="nav">
                    <li>
                        <a href="<?php echo $project->getProjectUrl(); ?>"><?php echo $projectKey; ?></a>
                        <?php $project->getVersionsHtml(); ?>
                        <?php $project->hasRefine(); ?>
                    </li>
                    <li class="active">
                        <a href="#fakelink">
                            Messages
                            <span class="navbar-unread">1</span>
                        </a>
                        <ul>
                            <li><a href="#fakelink">Element One</a></li>
                            <li>
                                <a href="#fakelink">Sub menu</a>
                                <ul>
                                    <li><a href="#fakelink">Element One</a></li>
                                    <li><a href="#fakelink">Element Two</a></li>
                                    <li><a href="#fakelink">Element Three</a></li>
                                </ul>
                            </li>
                            <li><a href="#fakelink">Element Three</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="#fakelink">
                            About Us
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!--
<div class="btn-toolbar">
    <div class="btn-group">
        <div class="btn no-pointer"><?php echo $projectKey; ?></div>
        <div class="btn-group select select-block span3">
            <i class="dropdown-arrow dropdown-arrow-inverse"></i>
            <button class="btn dropdown-toggle clearfix" data-toggle="dropdown">
                <span class="filter-option pull-left">X-Men</span>&nbsp;<span class="caret"></span>
            </button>
            <ul class="dropdown-menu dropdown-inverse" role="menu" style="overflow-y: auto; min-height: 108px; max-height: 365px;">
                <li rel="0"><a tabindex="-1" href="#" class=""><span class="pull-left">Choose hero</span></a></li>
                <li rel="1"><a tabindex="-1" href="#" class=""><span class="pull-left">Spider Man</span></a></li>
                <li rel="2"><a tabindex="-1" href="#" class=""><span class="pull-left">Wolverine</span></a></li>
                <li rel="3"><a tabindex="-1" href="#" class=""><span class="pull-left">Captain America</span></a></li>
                <li rel="4" class="selected"><a tabindex="-1" href="#" class=""><span class="pull-left">X-Men</span></a></li>
                <li rel="5"><a tabindex="-1" href="#" class=""><span class="pull-left">Crocodile</span></a></li>
            </ul>
        </div>
        <select name="herolist" value="X-Men" class="select-block span3" style="display: none;">
            <option value="0">Choose hero</option>
            <option value="1">Spider Man</option>
            <option value="2">Wolverine</option>
            <option value="3">Captain America</option>
            <option value="X-Men" selected="selected">X-Men</option>
            <option value="Crocodile">Crocodile</option>
        </select>


        <a class="btn btn-primary" href="#fakelink"><i class="fui-time"></i></a>
        <a class="btn btn-primary" href="#fakelink"><i class="fui-photo"></i></a>
        <a class="btn btn-primary active" href="#fakelink"><i class="fui-heart"></i></a>
        <a class="btn btn-primary" href="#fakelink"><i class="fui-eye"></i></a>
    </div>
</div>
-->

<?php
//echo '<pre>'.print_r($projectInfo,true);
?>

<?php require('layout-foot.php'); ?>