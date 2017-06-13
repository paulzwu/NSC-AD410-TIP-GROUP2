<?php
$activePage = "<li class='active'>";
$nonActivePage = "<li>";
$index = $nonActivePage;
$tipAssessment = $nonActivePage;
$faq = $nonActivePage;
$support = $nonActivePage;
$whatPage = basename($_SERVER['PHP_SELF']);
switch ($whatPage) {
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
                <?php echo $index;?>
                <!-- <li class="active"> -->
                    <a href="index.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <?php echo $tipAssessment;?>
                <!-- <li> -->
                    <a href="tip.php">
                        <i class="pe-7s-note2"></i>
                        <p>TIP Assessment</p>
                    </a>
                </li>  
                <?php echo $faq;?>              
                <!-- <li> -->
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
