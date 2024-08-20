
<style>
/* Hide navigation corners and icons by default */
.nav-corner {
    display: none;
}

@media (max-width: 768px) {
    /* Display navigation corners and icons for screens up to 768px wide (mobile view) */
    .nav-corner {
        position: fixed;
        top: 10px;
        z-index: 1000;
        display: block; /* Display navigation corners */
        text-align: center; /* Center align the navigation corners */
    }

    .nav-corner-left {
        left: 10px; /* Adjust left position for left corner */
    }

    .nav-corner-right {
        right: 10px; /* Adjust right position for right corner */
    }

    .nav-icon {
        display: block;
    }

    .nav-icon img {
        width: 40px; /* Set a specific width for the image */
        height: auto; /* Maintain aspect ratio */
        display: block;
        margin: 0 auto; /* Center the image horizontally */
    }
}

    </style>
    <div style="z-index:10;">
<div class="nav-corner nav-corner-left">
    <a href="#" class="nav-icon" onclick="goBack()">
        <img src="../admin/assets/images/licon.png" alt="Go Back">
    </a>
</div>


<div class="nav-corner nav-corner-right">
    <a href="#" class="nav-icon" onclick="goForward()">
        <img src="../admin/assets/images/ricon.png" alt="Go Forward">
    </a>
</div>
</div>
