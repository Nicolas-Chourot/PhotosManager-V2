<?php
    include_once "utilities/htmlHelper.php";
    include_once "DAL/users.php";

    if (!isset($viewTitle)) $viewTitle = "";
    $username = "";
    $profilLink = "";
    $logoutLink = "";
    $avatarImage = "";
    $listUsersLink = "";
    $searchBar = (!isset($searchBar)?"":$searchBar);
    if (isset($_SESSION["loggedUser"])) {
        $profilLink = '<a href="profil.php">'.$_SESSION["loggedUser"]["Name"].'</a>';
        $logoutLink = '<a href="logout.php"><img class="btn-icon" src="images/logout.png" title="Déconnexion" tooltip-position="bottom"></span></a>';
        $avatarImage = html_fittedImage(TableUsers()->getAvatarURL($_SESSION["loggedUser"]["AvatarGUID"]), "smallAvatar");
        if ($_SESSION["loggedUser"]["Admin"]) {
            $listUsersLink = '<a href="listUsers.php"><img src="images/users.png" style="width:40px" title="Gestion des usagers.."></a>';
        }
    }
    $viewHead = <<< HTML
    <div class='header'>
        <div class='headerContainer'>
            <img class='logo' src='images/camera.png' onclick="document.location = 'listPhotos.php'">
            <div>
                <h1>$viewTitle</h1>
                $searchBar
            </div>
            <div class="headerConnection" style="margin-top:16px;">
                $avatarImage
                $profilLink
                <div style="text-align:right">
                $listUsersLink 
                $logoutLink
                </div>
            </div>
        </div>
    </div>
    HTML;
?>