<nav class="navigation">
    <ul >
        <li><h1 style="font-size: 30px;font-family: Arial, Helvetica, sans-serif ;color: black;">Table Talk &copy;</h1></li>
        <li><a href="#headlines"><h1>Home</h1></a></li>
        <li class="dropdown"><a href=" "><h1>Reach Us</h1></a>
        <div class="dropdown-content">
        <h3>E-mail: tabletalk@gmail.com</h3>
        </div>
        </li>
        <li><a href="allrecipes.php"><h1>Recipes</h1></a></li>
        <li><a href=" "><h1>Newsletter</h1></a></li>
    </ul>
</nav>
<style>

.navigation {
    background-color: rgba(230, 227, 227, 0.8); /* Set the background color of the navigation bar */
    padding: 0;
    margin:0;

}

.navigation ul {
    list-style-type: none; /* Remove the list style */
    margin: 0;
    padding: 0;
}

.navigation ul li {
    display: inline-block; /* To make the contents of the navigation bar be arranged horizontally */
    margin-right: 90px;
    font-weight: bold;
}

.navigation ul li a {
    text-decoration: none;
    color: black;
}

.dropdown {
    position: relative; /* To make contents in the dropdown bar appear relative to its normal position */
}

.dropdown-content {
    display: none; /* This makes the dropdown-content not visible until toggled */
    position: absolute; /* To make the dropdown-content appear below the dropdown */
    background-color: white;
     z-index: 1;
}

.dropdown:hover .dropdown-content {
    display: block; /* To make contents in the dropdown bar appear when hovered */
}

.dropdown-content a { /* To make contents in the dropdown bar appear in a block format */
    display: block;
    padding: 10px;
    text-decoration: none;
}

.dropdown-content a:hover { /* Changes color of the content when hovered */
    background-color: rgb(95, 95, 95);
}
    </style>