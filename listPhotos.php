<?php
    include_once "DAL/users.php";
    include_once "DAL/photos.php";
    include_once "accessCheck.php";
    include_once "utilities/htmlHelper.php";

    $_SESSION["selectedUserId"] = (isset($_SESSION["selectedUserId"]) ? $_SESSION["selectedUserId"] : 0);
    $_SESSION["keywords"] = (isset($_SESSION["keywords"]) ? $_SESSION["keywords"] : "");

    $_SESSION["selectedUserId"] = (isset($_GET["selectedUserId"]) ? $_GET["selectedUserId"] : $_SESSION["selectedUserId"]);
    $_SESSION["keywords"] = (isset($_GET["keywords"]) ? $_GET["keywords"] : $_SESSION["keywords"]);

    function thumbNail($photo){
        $url = TablePhotos()->getPhotoUrl($photo["GUID"]);
        $title = $photo["Title"];
        $id = $photo["Id"];
        $thumbnail = html_fittedImage($url, "thumbnail");
        $html = <<< HTML
        <div class='thumbnailContainer'>
            <div class='thumbnailHeader ellipsis'>
                $title
            </div>
            <div onclick='window.location="photoDetails.php?id=$id"'>
                $thumbnail
            </div>
            </div>
        HTML;
        return $html;
    }
    function listUser($selectedUserId) {
        $html = "<select name='selectedUserId' oninput='this.form.submit()'>";
        $html.= "<option value='0'>Tous les usagers</option>";
        $html.= "<option value='".$_SESSION["loggedUser"]["Id"]."'>Mes photos</option>";
        $users = TableUsers()->selectAll("ORDER BY Name");
        foreach($users as $user) {
            if ($user["Id"] == $selectedUserId)
                $html.= "<option value='".$user["Id"]."' selected>".$user["Name"]."</option>";
            else
                $html.= "<option value='".$user["Id"]."'>".$user["Name"]."</option>";
        }
        $html.= "</select>";
        return $html;
    }
    function MakeKeywords($keywords) {
        $html = "<input type='search' name='keywords' onchange='this.form.submit()' value='$keywords' placeholder='Mots-clés...'/>"; 
        return $html;
    }
    function containsKeywords($keywords, $text){
        $keywords = strtolower($keywords);
        $words = explode(" ", trim($keywords));
        $text = strtolower($text);
        foreach($words as $word) {
            if (strpos($text, $word) === false)
                return false;
        }
        return true;
    }
    
    /////////////////////////////////////////////////////////////////////////////////////////////
    /// Consruction de la barre de recherche
    $viewTitle = "Liste des photos";
    $addPhotoCmd = html_flashButtonLink('iconPlus','addPhoto.php', 'Ajouter une photo','right');
    $searchUser = "<div class='searchBarItem'>".listUser($_SESSION["selectedUserId"])."</div>";
    $searchKeywords = "<div class='searchBarItem'>".MakeKeywords($_SESSION["keywords"])."</div>";

    // Cette variable est utilisée dans header.php
    $searchBar = "<form class='searchBarContainer'>"
                    .$addPhotoCmd
                    .$searchUser
                    .$searchKeywords.
                "</form>";
    ///////////////////////////////////////////////////////////////////////////////////////////
    /// filter les photos
   
    $userFilter = "";

    if ($_SESSION["loggedUser"]["Admin"]) {
        if ($_SESSION["selectedUserId"] != 0)
            $userFilter = " WHERE UserId = ".$_SESSION["selectedUserId"];
    } else {
        if ($_SESSION["selectedUserId"] != 0) {
            if ($_SESSION["selectedUserId"] == $_SESSION["loggedUser"]["Id"])
                $userFilter = " WHERE UserId = ".$_SESSION["selectedUserId"];
            else
                $userFilter = " WHERE Shared = 1 AND UserId = ".$_SESSION["selectedUserId"];
        } else {
            $userFilter = " WHERE Shared = 1 OR UserId = ".$_SESSION["loggedUser"]["Id"];
        }
    }

    ////////////////////////////////////////////////////////////////////////////////////////////
    /// Bouble d'affichage des photos
    $photos = TablePhotos()->selectAll($userFilter);
    $viewContent = "<div class='thumbnailListContainer'>";
    foreach($photos as $photo) {
        if ($_SESSION["keywords"] == "") {
            $viewContent.= thumbNail($photo);
        }
        else {
            if (containsKeywords($_SESSION["keywords"], $photo["Title"]." ".$photo["Description"]." ".$photo["Keywords"])) {
                $viewContent.= thumbNail($photo);
            }
        }
    }
    $viewContent.= "</div>";
    include "view/master.php";
?>