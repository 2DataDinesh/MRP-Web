
<style>
/* Hide navigation corners and icons by default */
.nav-corner {
    visibility: hidden; /* Hide navigation corners without collapsing their space */
    position: fixed;
    top: 10px;
    z-index: 1000;
    text-align: center;
    padding: 10px;
}

@media (max-width: 768px) {
    .nav-corner {
        visibility: visible; /* Display navigation corners for screens up to 768px wide */
    }

    .nav-corner-left {
        left: 10px;
    }

    .nav-corner-right {
        right: 10px;
    }

    .nav-icon {
        display: block;
    }

    .nav-icon img {
        width: 40px;
        height: auto;
        display: block;
        margin: 0 auto;
    }
}


    </style>
<div class="nav-corner nav-corner-left">
    <a href="#" class="nav-icon" onclick="goBack()">
        <img src="assets/images/licon.png" alt="Go Back">
    </a>
</div>


<div class="nav-corner nav-corner-right">
    <a href="#" class="nav-icon" onclick="goForward()">
        <img src="assets/images/ricon.png" alt="Go Forward">
    </a>
</div>
