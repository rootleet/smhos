<header class="bg-clight">
    <div class="w-100 ml-auto h-100 d-flex flex-wrap justify-content-between pr-2 align-content-center">

        <div class="d-flex w-25 flex-wrap align-content-center pl-2">
            <?php if (isset($_SESSION['info'])): ?>
                <i class="text-info"><?php echo $_SESSION['info'] ?></i>
            <?php endif; ?>
        </div>


        <!--TIME-->
        <div  class="d-flex text-info w-25 flex-wrap align-content-center justify-content-center pl-2">
            <strong id="time"></strong>
        </div>

        <!--USERNAME AND LOGOUT-->
        <div class="d-flex w-25 flex-wrap align-content-center justify-content-end">
            <!--Username-->
            <div style="height: 30px;" class="d-flex flex-wrap align-content-center">
                <span class="mr-1 ml-1"><?php echo $user_details['first_name'] . ' ' . $user_details['last_name'] ?></span>
            </div>
            <!--Logout-->
            <div onclick="location.href='../config/inc/logout.php'" data-toggle="tooltip" title="logout" class="ico-nm pointer bg-success rounded-circle ml-1 border border-success">
                <img src="../assets/icos/general/logout.png" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</header>

<script>

    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }

    function startTime() {
        const today = new Date();
        const h = today.getHours();
        let m = today.getMinutes();
        let s = today.getSeconds();
        // add a zero in front of numbers<10
        m = checkTime(m);
        s = checkTime(s);
        document.getElementById('time').innerHTML = h + ":" + m + ":" + s;
        t = setTimeout(function() {
            startTime()
        }, 500);
    }
    startTime();

    setInterval(
        function updateLiveIncome() {
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            }
            else {
                xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');
            }

            xmlhttp.onreadystatechange = function () {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                    console.log("SESSION CHECKED");
                }
            }

            xmlhttp.open('GET', '../config/proc/ajax.php?unset_sessions', true);
            xmlhttp.send();
        }, 1000)

</script>
