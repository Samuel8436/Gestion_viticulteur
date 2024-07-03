<style>
    button{
        border-radius: 5px;
    }
    div.graph {
  float: right;
}
</style>
<div class="navbar navbar-inverse">
        <div class="navbar-inner">
            <div class="pull-right">
                <form name="clock">
                    <i id="clock" class="icon-time"></i>
                    <input  class="span2" id="trans" type="submit"  name="face" value="">
                </form>
            </div>
            <div class="date">
                <i class="icon-calendar " id="clock"></i>
                <?php
                $Today = date('y:m:d');
                $new = date('l, F d, Y', strtotime($Today));
                echo $new;
                ?>
            </div>
            <div class='graph'><a href="graphe.php"><button>Graphe</button></a></div>
            <a href="deconnection.php"><button>Se deconnecter</button></a>
            <div class="welcome">
            </div>
        </div>
    </div>