<?php
$activePage = "<li class='active'>";
$nonActivePage = "<li>";
$index = $nonActivePage;
$tipEditor = $nonActivePage;
$tipAssessment = $nonActivePage;
$faq = $nonActivePage;
$support = $nonActivePage;
$whatPage = basename($_SERVER['PHP_SELF']);
switch ($whatPage) {
    case 'tip_editor.php':
        $tipEditor = $activePage;
        break;
    case 'tip.php':
        $tipAssessment = $activePage;
        break;
    case 'faq.php':
        $faq = $activePage;
        break;
    case 'support.php':
        $support = $activePage;
        break; 
    default:
        $index = $activePage;
        break;
}

?>
<ul class="nav">
                <!-- <li class="active"> -->
                <?php echo $index;?>
                    <a href="index.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <!-- <li> -->
                <?php echo $tipEditor;?>
                    <a href="tip_editor.php">
                        <i class="pe-7s-note2"></i>
                        <p>TIP Editor</p>
                    </a>
                </li>

                <!-- <li> -->
                <?php echo $tipAssessment;?>
                    <a href="tip.php">
                        <i class="pe-7s-note2"></i>
                        <p>TIP Assessment</p>
                    </a>
                </li>                
                <!-- <li> -->
                <?php echo $faq;?>
                    <a href="faq.php">
                        <i class="pe-7s-news-paper"></i>
                        <p>FAQs</p>
                    </a>
                </li>
                <!-- <li> -->
                <?php echo $support;?>
                    <a href="support.php">
                        <i class="pe-7s-science"></i>
                        <p>Support</p>
                    </a>
                </li>
                <li>
            </ul>
</div>
</div>
