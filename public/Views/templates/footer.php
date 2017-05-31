

    <!-- Footer-->
    <footer class="container-fluid" 
            style="min-height:200px; background-color:#18bc9c;color:#fff;text-align:center;padding-top:50px;">
        © 2017 ADBAS PROGRAM | NORTH SEATTLE COLLEGE
    </footer>

    <!--   Core JS Files   -->
    <script src="assets/js/lib/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="assets/js/light-bootstrap-dashboard.js"></script>
    <script src="assets/js/responsive_nav.js"></script>

    <!-- Response Rate Assets -->
   <script src="assets/js/lib/raphael-2.1.4.min.js"></script>
    <script src="assets/js/lib/justgage.js"></script>
    <script src="assets/js/tipprogress.js"></script>
    <?php 
    if (basename($_SERVER['PHP_SELF']) == 'tip.php'){
        echo '<!--if page is tip.php include survey_demo.js-->';
        echo '<script src="survey_demo.js"></script>';
    }?>
</body>


    

   
</html>